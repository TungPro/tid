<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class API extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user', TRUE);
		$this->load->library('oauth2server');
	}
	
	public function info(){
		
		$token = $this->oauth2server->verifyAccessToken();
		if($token == TRUE){
			$userid= $token['user_id'];
			$userdata = $this->user->get_userinfo_byid($userid);
			$data = array(
					'id' => $userdata->id,
					'fullname' => $userdata->lastname." ".$userdata->firstname,
					'email' => $userdata->email,
					'phone' => $userdata->phone,
					'birthday' => $userdata->birthday,
					'gender' => $userdata->gender,
					'address' => $userdata->address,
					'status' => $userdata->status
			);
			echo json_encode($data);
		}else{
			echo json_encode(array('error'=> 'invalid_token'));
		}
	}
}