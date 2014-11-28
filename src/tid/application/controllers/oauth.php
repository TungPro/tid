<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OAuth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user', TRUE);
		//$this->load->helper('form');
		$this->load->library('oauth2server');
	}
	
	public function login(){
		if($this->session->flashdata('redirect_uri') !== FALSE)
			$this->session->keep_flashdata('redirect_uri');
		return redirect('/dang-nhap');
	}
	
	
	public function authorize(){
		
		if($this->session->userdata('authorize') === FALSE ){
			$auth_params = $this->oauth2server->getAuthorizeParams();
			$this->session->set_userdata('authorize', $auth_params);
		}else{
			$auth_params = $this->session->userdata('authorize');
		}
		
		$user =  $this->session->userdata('user');
		if(!$this->session->userdata('logged_in') || $user === FALSE) {
			$this->session->set_flashdata('redirect_uri', base_url('/oauth/authorize'));
			return redirect('/oauth/login');
		}
		
		
		
		if($this->oauth2server->checkAuthorizationApprove($auth_params['client_id'],$user['id'],$auth_params['scope'])){
			$this->session->unset_userdata('authorize');
			return $this->oauth2server->finishClientAuthorization(TRUE, $auth_params);
		}else{
			
			if ($this->input->post('submit'))
			{
				$approve = $this->security->xss_clean($this->input->post('approve')) == "true";
				if($approve){
					$this->oauth2server->setAuthorizationApprove($auth_params['client_id'],$user['id'],$auth_params['scope']);
				}
				
				$this->session->unset_userdata('authorize');
				return $this->oauth2server->finishClientAuthorization($approve, $auth_params);
			}
			//print_r($auth_params);
			
			$client = $this->oauth2server->getClient($auth_params['client_id']);
			$this->layout->setLayout('/oauth/layout');
			return $this->layout->view('/oauth/authorize', array('auth_params' => $auth_params, 'client' => $client, 'user' => $this->session->userdata('user')));
		}
	}
	
	public function token(){
		return $this->oauth2server->grantAccessToken();
	}
}