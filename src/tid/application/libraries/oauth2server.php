<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
include("oauth2.php");
class OAuth2Server extends OAuth2
{
	protected $CI;

	public function __construct() {
		parent::__construct();
		$this->CI =& get_instance();
	}

	public function addClient($client_id, $client_secret, $redirect_uri) {
		// 		try {
		// 			$sql = "INSERT INTO clients (client_id, client_secret, redirect_uri) VALUES (:client_id, :client_secret, :redirect_uri)";
		// 			$stmt = $this->CI->db->prepare($sql);
		// 			$stmt->bindParam(":client_id", $client_id, PDO::PARAM_STR);
		// 			$stmt->bindParam(":client_secret", $client_secret, PDO::PARAM_STR);
		// 			$stmt->bindParam(":redirect_uri", $redirect_uri, PDO::PARAM_STR);
		// 			$stmt->execute();
		// 		} catch (PDOException $e) {
		// 			$this->handleException($e);
		// 		}
	}
	
	public function verifyAccessToken($user_id = NULL, $scope = NULL, $exit_not_present = FALSE, $exit_invalid = FALSE, $exit_expired = FALSE, $exit_scope = FALSE, $exit_user = FALSE, $realm = NULL) {
		
		$token_param = $this->getAccessTokenParams();
		
		if ($token_param === FALSE)
			return $exit_not_present ? $this->errorWWWAuthenticateResponseHeader(OAUTH2_HTTP_BAD_REQUEST, $realm, OAUTH2_ERROR_INVALID_REQUEST, 'The request is missing a required parameter, includes an unsupported parameter or parameter value, repeats the same parameter, uses more than one method for including an access token, or is otherwise malformed.', NULL, $scope) : FALSE;

		$token = $this->getAccessToken($token_param);
		
		if ($token === NULL)
			return $exit_invalid ? $this->errorWWWAuthenticateResponseHeader(OAUTH2_HTTP_UNAUTHORIZED, $realm, OAUTH2_ERROR_INVALID_TOKEN, 'The access token provided is invalid.', NULL, $scope) : FALSE;

		if (isset($token["expires"]) && time() > $token["expires"])
			return $exit_expired ? $this->errorWWWAuthenticateResponseHeader(OAUTH2_HTTP_UNAUTHORIZED, $realm, OAUTH2_ERROR_EXPIRED_TOKEN, 'The access token provided has expired.', NULL, $scope) : FALSE;
		
		if ($scope && (!isset($token["scope"]) || !$token["scope"] || !$this->checkScope($scope, $token["scope"])))
			return $exit_scope ? $this->errorWWWAuthenticateResponseHeader(OAUTH2_HTTP_FORBIDDEN, $realm, OAUTH2_ERROR_INSUFFICIENT_SCOPE, 'The request requires higher privileges than provided by the access token.', NULL, $scope) : FALSE;
		
		if ($user_id && (!isset($token["user_id"]) || !$token["user_id"] || $user_id != $token['user_id']))
			return $exit_user ? $this->errorWWWAuthenticateResponseHeader(OAUTH2_HTTP_FORBIDDEN, $realm, OAUTH2_ERROR_INSUFFICIENT_SCOPE, 'The request requires user id.', NULL, $user_id) : FALSE;
		
		return $token;
	}

	public function getClient($client_id){
		$this->CI->db->from('clients');
		$this->CI->db->where('client_id',$client_id );

		$clients = $this->CI->db->get()->result_array();
		if ( is_array($clients) && count($clients) == 1 ) {
			$client = $clients[0];
			return $client;
		}
		return NULL;

	}

	public function setAuthorizationApprove($client_id, $user_id, $scope){
		$this->CI->db->from('authorization');
		$this->CI->db->where('client_id',$client_id );
		$this->CI->db->where('user_id',$user_id );

		$authorizations = $this->CI->db->get()->result();
		if ( is_array($authorizations) && count($authorizations) == 1 ) {
			$authorization = $authorizations[0];
			$scope_old = $authorization['scope'];
			if (!is_array($scope_old))
				$scope_old = explode(",", $scope_old);
				
			if (!is_array($scope))
				$scope = explode(",", $scope);
			$scope_new = array_unique(array_merge($scope_old, $scope));
			$scope_new = implode(",", $scope_new);
				
			$data = array(
					'scope' => $scope_new
			);
			$this->CI->db->where('client_id',$client_id );
			$this->CI->db->where('user_id',$user_id );
			return $this->CI->db->update('users', $data);
				
			return TRUE;
		}

		if (is_array($scope))
			$scope = implode(",", $required_scope);
		$data = array(
				'client_id' => $client_id,
				'user_id' => $user_id,
				'scope' => $scope,
				'time' => date("Y-m-d H:i:s")
		);
		return $this->CI->db->insert('authorization', $data);

	}
	public function checkAuthorizationApprove($client_id, $user_id, $scope){
		$this->CI->db->from('authorization');
		$this->CI->db->where('client_id',$client_id );
		$this->CI->db->where('user_id',$user_id );

		$authorizations = $this->CI->db->get()->result();
		if ( is_array($authorizations) && count($authorizations) == 1 ) {
			$authorization = $authorizations[0];
				
			return $this->checkScope($scope, $authorization->scope);
		}
		return FALSE;

	}

	protected function checkClientCredentials($client_id, $client_secret = NULL) {

		$this->CI->db->from('clients');
		$this->CI->db->where('client_id',$client_id );
		$this->CI->db->where('status', 1);

		$clients = $this->CI->db->get()->result();
		if ( is_array($clients) && count($clients) == 1 ) {
			$client = $clients[0];
			if ($client_secret === NULL)
				return $client !== FALSE;
				
			return $client->client_secret == $client_secret;
				
		}
		return FALSE;
	}

	protected function getRedirectUri($client_id) {

		$this->CI->db->from('clients');
		$this->CI->db->where('client_id',$client_id );
		$this->CI->db->where('status', 1);

		$clients = $this->CI->db->get()->result();
		if ( is_array($clients) && count($clients) == 1 ) {
			$client = $clients[0];
			return isset($client->redirect_uri) && $client->redirect_uri ? $client->redirect_uri : NULL;

		}
		return FALSE;
	}

	protected function getAccessToken($oauth_token) {
		$this->CI->db->from('tokens');
		$this->CI->db->where('oauth_token',$oauth_token );

		$clients = $this->CI->db->get()->result_array();
		if ( is_array($clients) && count($clients) == 1 ) {
			$client = $clients[0];
			return $client !== FALSE ? $client : NULL;
		}
		return NULL;
	}
	
	
	protected function setAccessToken($oauth_token, $client_id, $expires, $scope = NULL, $user_id = NULL){
		
		$data = array(
				'oauth_token' => $oauth_token,
				'client_id' => $client_id,
				//'user_id' => $user['id'],
				'expires' => $expires,
				'scope' => $scope
		);
		
		if($user_id !== NULL) $data['user_id'] = $user_id;
		
		return $this->CI->db->insert('tokens', $data);
	}

	protected function getSupportedGrantTypes() {
		return array(
				OAUTH2_GRANT_TYPE_AUTH_CODE,
		);
	}
	protected function getSupportedAuthResponseTypes() {
		return array(
				OAUTH2_AUTH_RESPONSE_TYPE_AUTH_CODE,
// 				OAUTH2_AUTH_RESPONSE_TYPE_ACCESS_TOKEN,
// 				OAUTH2_AUTH_RESPONSE_TYPE_CODE_AND_TOKEN
		);
	}

	protected function getSupportedScopes(){
		return array('userinfo');
	}
	protected function getAuthCode($code) {
		//print_r($this->CI->session->userdata);
		//die("x");
		///$user = $this->CI->session->userdata('user');
	//	if($user === FALSE) return NULL;
		
		$this->CI->db->from('auth_codes');
		$this->CI->db->where('code',$code );
	///	$this->CI->db->where('user_id',$user['id']);
		
		$clients = $this->CI->db->get()->result_array();
		if ( is_array($clients) && count($clients) == 1 ) {
			$client = $clients[0];
			return $client !== FALSE ? $client : NULL;
		}
		return NULL;
	}

	protected function setAuthCode($code, $client_id, $redirect_uri, $expires, $scope = NULL) {
		$user = $this->CI->session->userdata('user');
		if($user === FALSE) return FALSE;
		
		$data = array(
				'code' => $code,
				'client_id' => $client_id,
				'redirect_uri' => $redirect_uri,
				'user_id' => $user['id'],
				'expires' => $expires,
				'scope' => $scope
		);
		return $this->CI->db->insert('auth_codes', $data);
	}
}