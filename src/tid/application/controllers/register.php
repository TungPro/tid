<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user', TRUE);
		$this->load->helper('form');
		//$this->load->library('form_validation');
	}

	public function index(){
		if( $this->session->userdata('logged_in')) {
			if($this->session->flashdata('redirect_uri') !== FALSE)
				$this->session->keep_flashdata('redirect_uri');
			return redirect('/');
		}
		
		$this->layout->view('/user/register');
	}

	public function submit(){
		if( $this->session->userdata('logged_in')) {
			return redirect('/');
		}
		
		$this->load->library('form_validation' );
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]|xss_clean');
		$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[32]|matches[confirmpassword]|xss_clean' );
		$this->form_validation->set_rules('confirmpassword','Confirm Password','required' );

		$this->form_validation->set_rules('firstname','First Name','trim|required' );
		$this->form_validation->set_rules('lastname','Last Name','trim|required' );
		$this->form_validation->set_rules('gender','Gender','required' );

		$this->form_validation->set_rules('captcha','Captcha','trim|required|exact_length[6]');

		$this->form_validation->set_rules('day', 'day', 'required|xss_clean');
		$this->form_validation->set_rules('month', 'month', 'required|xss_clean');
		$this->form_validation->set_rules('year', 'year', 'required|xss_clean');
		if ( $this -> form_validation -> run() === FALSE
			|| !checkdate($this->input->post('month'), $this->input->post('day'), $this->input->post('year'))
			)
		{
			if($this->session->flashdata('redirect_uri') !== FALSE)
				$this->session->keep_flashdata('redirect_uri');
			$data['error'] = true;
			$this->layout->view('/user/register', $data);
		}elseif("" === trim($this->input->post('captchakey')) || $this->input->post('captchakey') != md5(strtolower($this->input->post('captcha')))
		){
			if($this->session->flashdata('redirect_uri') !== FALSE)
				$this->session->keep_flashdata('redirect_uri');
			$data['error'] = true;
			$data['errormsg'] = "Mã xác nhận không đúng.";
			$this->layout->view('/user/register', $data);
		}
		else
		{
			
			$userdata = new User_model();
			$userdata->email = $this->security->xss_clean($this->input->post('email'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$userdata->password = sha1($password);
			$userdata->firstname = $this->security->xss_clean($this->input->post('firstname'));
			$userdata->lastname = $this->security->xss_clean($this->input->post('lastname'));
			
			$userdata->gender = $this->input->post('gender');
			$userdata->birthday = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
			$userdata->regdate = date("Y-m-d H:i:s");
			$userdata->isadmin = 0;
			$userdata->status = 2;
			//echo "xxx".$userdata->save();
			if($userdata->save()){
				if($this->session->flashdata('redirect_uri') !== FALSE){
					redirect($this->session->flashdata('redirect_uri'), 'refresh');
				}else{
					//$this->session->set_userdata($newdata);
					$this->user->validate($userdata->email,$password,false);
					redirect('/', 'refresh');
				}
				return true;
			}
			
			$data['error'] = true;
			$data['errormsg'] = "Có lỗi xảy ra. Vui lòng thử lại.";
			$this->layout->view('/user/register', $data);
		}
	}


	public function checkemailexists(){
		$email = $this->input->post('email', TRUE);
		echo json_encode(array('exist' => $this->user->checkemailexists($email) > 0 ));
	}
}