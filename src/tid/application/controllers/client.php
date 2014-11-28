<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('User_model', 'user', TRUE);
		$this->load->model('Client_model', 'client', TRUE);
	}
	public function index(){
		redirect("/");
	}
	
	public function listservices(){
		if(!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('redirect_uri', base_url('/quan-ly-ket-noi'));
			return redirect('/dang-nhap');
		}
		
		$data['session'] = $this->session->userdata;
		$data['listclients'] = $this->client->getAllByUserID(5);
		return $this->layout->view('user/client', $data);
	}
	
	public function remove(){
		if(!$this->session->userdata('logged_in')) {
			echo json_encode(array('error' => 1));
			return false;
		}
		if($this->input->post('client_id') === FALSE){
			echo json_encode(array('error' => 2));
			return false;
		}
		
		$client_id = $this->security->xss_clean($this->input->post('client_id'));
		$user = $this->session->userdata('user');
		
		if($this->client->remove($user['id'], $client_id)){
			echo json_encode(array('error' => 0));
			return true;
		}
		
		echo json_encode(array('error' => 3));
		return false;
	}
	
}
