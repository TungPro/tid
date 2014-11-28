<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user', TRUE);
		$this->load->model('client_model', 'client', TRUE);
		$this->load->helper('form');
		$this->load->library("pagination");
	}
	
	protected function checkPermission(){
		if(!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('redirect_uri', base_url('/thong-tin-tai-khoan'));
			return redirect('/dang-nhap');
		}
		
		$user = $this->session->userdata('user');
		if(!$user['isadmin']) return redirect('/');
		return true;
		
	}
	
	public function users(){
		$this->checkPermission();
		
		
		$user = $this->session->userdata('user');
		$data['session'] = $this->session->userdata;
		$data['user'] = $this->user->get_userinfo($user['email']);
		
		$config = array();
		$config["base_url"] = base_url('/quan-ly-thanh-vien');
		$config["total_rows"] = $this->user->getCount();
		$config["per_page"] = 10;
		$config["uri_segment"] = 2;
		
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		
		$data["users"] = $this->user->getAll($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		
		return $this->layout->view('admin/users',$data);
		
	}
	
	public function clients(){
		$this->checkPermission();
		
		
		$user = $this->session->userdata('user');
		$data['session'] = $this->session->userdata;
		$data['user'] = $this->user->get_userinfo($user['email']);
		
		$clients = $this->client->getAll();
		$data['clients'] = $clients;
		
		return $this->layout->view('admin/clients',$data);
	}
	
	
	public function addclient(){
		$this->checkPermission();
		
		$user = $this->session->userdata('user');
		$data['session'] = $this->session->userdata;
		$data['user'] = $this->user->get_userinfo($user['email']);
		
		
		$this->load->library('form_validation' );
		$this->form_validation->set_rules('client_id','Mã dịch vụ','trim|required|is_unique[clients.client_id]|xss_clean|alpha_numeric');
		$this->form_validation->set_rules('client_secret','Mã bí mật','required|xss_clean' );
		$this->form_validation->set_rules('name','Tên dịch vụ','required|xss_clean' );
		//$this->form_validation->set_rules('logo','Logo','required' );
		
		$this->form_validation->set_rules('description','Chú thích','trim' );
		$this->form_validation->set_rules('redirect_uri','Đường dẫn','trim|required|valid_url' );
		$this->form_validation->set_rules('status','Trạng thái','required' );
		
		if ( $this -> form_validation -> run() === FALSE)
		{
			return $this->layout->view('admin/addclient',$data);
		}else{
			
			$config['upload_path'] = ".".assets_url('/clients/', false);
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1024';
			$config['max_width']  = '50';
			$config['max_height']  = '50';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('logo'))
			{
				$data['errorupload'] = $this->upload->display_errors();
				return $this->layout->view('admin/addclient',$data);
			}
			else
			{
				$data =  $this->upload->data();
			//print_r($data);
			//die('x');
			
				$clientdata = new Client_model();
				$clientdata->client_id = $this->security->xss_clean($this->input->post('client_id'));
				$clientdata->client_secret = $this->security->xss_clean($this->input->post('client_secret'));
				$clientdata->name = $this->security->xss_clean($this->input->post('name'));
				$clientdata->description = $this->security->xss_clean($this->input->post('description'));
				$clientdata->redirect_uri = $this->security->xss_clean($this->input->post('redirect_uri'));
				$clientdata->status = $this->input->post('status');
				$clientdata->logo_url=$data['file_name'];
				$clientdata->insert();
				return redirect('/quan-ly-dich-vu');
			}
			
			
		
			
		}
		
	}
	
	
	public function editclient($client_id){
		$this->checkPermission();
		
		$user = $this->session->userdata('user');
		$data['session'] = $this->session->userdata;
		$data['user'] = $this->user->get_userinfo($user['email']);
		
		$client_data = $this->client->getByClientID($client_id);
		if($client_data == null) return redirect('/quan-ly-dich-vu');
		
		
		$data['client'] = $client_data;
		
		
		$this->load->library('form_validation' );
		$this->form_validation->set_rules('client_secret','Mã bí mật','required|xss_clean|alpha_numeric' );
		$this->form_validation->set_rules('name','Tên dịch vụ','required|xss_clean' );
		
		$this->form_validation->set_rules('description','Chú thích','trim' );
		$this->form_validation->set_rules('redirect_uri','Đường dẫn','trim|required|valid_url' );
		$this->form_validation->set_rules('status','Trạng thái','required' );
		
		if ( $this -> form_validation -> run() === FALSE)
		{
			return $this->layout->view('admin/editclient',$data);
		}else{
				
			$clientdata = new Client_model();
			$clientdata->client_id = $client_id;
			$clientdata->client_secret = $this->security->xss_clean($this->input->post('client_secret'));
			$clientdata->name = $this->security->xss_clean($this->input->post('name'));
			$clientdata->description = $this->security->xss_clean($this->input->post('description'));
			$clientdata->redirect_uri = $this->security->xss_clean($this->input->post('redirect_uri'));
			$clientdata->status = $this->input->post('status');
			$clientdata->logo_url = $client_data->logo_url;
			if (isset($_FILES['logo']) && !empty($_FILES['logo']['name']))
      		{
				//die("xxxx");
				$config['upload_path'] = ".".assets_url('/clients/', false);
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1024';
				$config['max_width']  = '50';
				$config['max_height']  = '50';
					
				$this->load->library('upload', $config);
					
				if ( ! $this->upload->do_upload('logo'))
				{
					$data['errorupload'] = $this->upload->display_errors();
					return $this->layout->view('admin/editclient',$data);
				}
				else
				{
					$dataupload =  $this->upload->data();
					@unlink(".".assets_url('/clients/'.$client_data->logo_url, false));
					$clientdata->logo_url = $dataupload['file_name'];
					$data['client']->logo_url = $dataupload['file_name'];
				}
			}
			
			$clientdata->update();
			//print_r($data);
			
			
			$data['success'] = true;
			return $this->layout->view('admin/editclient',$data);
		
				
		}
		
	}
	
	public function lockclient($client_id){
		$this->checkPermission();
		$this->client->setStatus($client_id,'0');
		return redirect('/quan-ly-dich-vu');
	}
	
	public function unlockclient($client_id){
		$this->checkPermission();
		$this->client->setStatus($client_id,'1');
		return redirect('/quan-ly-dich-vu');
	}
	
	public function deleteclient($client_id){
		$this->checkPermission();
		$client_data = $this->client->getByClientID($client_id);
		if($client_data == null) return redirect('/quan-ly-dich-vu');
		
		$this->client->delete($client_id);
		
		@unlink(".".assets_url('/clients/'.$client_data->logo_url, false));
		
		return redirect('/quan-ly-dich-vu');
	}
	
	
	
}