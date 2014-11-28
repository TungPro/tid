<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user', TRUE);
		$this->load->helper('form');
		$this->load->library('email');
	}


	public function info(){
		if(!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('redirect_uri', base_url('/thong-tin-tai-khoan'));
			return redirect('/dang-nhap');
		}
		$user = $this->session->userdata('user');
		$data['session'] = $this->session->userdata;
		$data['user'] = $this->user->get_userinfo($user['email']);
		return $this->layout->view('user/info',$data);
	}


	public function login(){

		if( $this->session->userdata('logged_in')) {
			return redirect('/thong-tin-tai-khoan');
		}
		
		$this->load->library('form_validation' );
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|callback_checkUserLocked');
		$this->form_validation->set_rules('password','Mật khẩu','required|xss_clean|callback_checkUsernamePassword');
		if ( $this -> form_validation -> run() === FALSE){

			if($this->session->flashdata('redirect_uri') !== FALSE)
				$this->session->keep_flashdata('redirect_uri');
				
			return $this->layout->view('/user/login');
		}else{
			if($this->session->flashdata('redirect_uri') !== FALSE)
				redirect($this->session->flashdata('redirect_uri'), 'refresh');
			else
				redirect('/', 'refresh');
		}
	}
	
	public function checkUsernamePassword() {
		if($this->user->validate($this->security->xss_clean($this->input->post('email')),$this->security->xss_clean($this->input->post('password')),$this->input->post('remember'))){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	public function checkUserLocked() {
		if($this->user->get_status($this->security->xss_clean($this->input->post('email'))) == 1){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('checkUsernamePassword', '');
			return FALSE;
		}
	}


	public function logout(){
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		if($this->input->get('redirect_uri') === false){
			redirect('/', 'refresh');
		}else{
			redirect($this->input->get('redirect_uri'), 'refresh');
				
		}

	}


	public function forgotpassword(){
		if( $this->session->userdata('logged_in')) {
			return redirect('/');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|is_not_unique[users.email]');
		if ( $this->form_validation->run() === FALSE){
			return $this->layout->view('/user/forgotpassword');
		}else{
			//Send Mail
			$email = $this->security->xss_clean($this->input->post('email'));
			$code = random_string('unique');
			$date = date("Y-m-d H:i:s");
			$date = date( 'Y-m-d H:i:s',strtotime($date ." + 3 days"));
			$url = base_url('/xac-nhan-khoi-phuc-mat-khau')."?uid=".base64_encode($email)."&code=".$code;

			$maildata = array(
					'name'=> $this->user->get_name($email),
					'url' => $url,
					'expire' => $date,
					'code' => $code
			);
			//return $this->load->view('/email/forgotpassword_confirm',$maildata);

			//Insert to database
			if($this->user->set_forgot($email, $code, $date)){
				//return $this->load->view('/email/forgotpassword_confirm', $maildata);
				$this->email->send_with_view('/email/forgotpassword_confirm', $maildata, $email, "Yêu cầu khôi phục mật khẩu trên T-ID");
				return $this->layout->view('/user/forgotpasswordsuccess');
			}
			return $this->layout->view('/user/forgotpassword');
		}

	}

	public function confirmforgotpassword(){
		if( $this->session->userdata('logged_in')) {
			return redirect('/');
		}

		$code = $this->security->xss_clean($this->input->get('code',true));
		$email = base64_decode($this->security->xss_clean($this->input->get('uid',true)));

		$forgot = $this->user->get_forgot($email);
		if($code != $forgot["code"] || date("Y-m-d H:i:s") > $forgot["expire"]){
			return $this->layout->view('/user/forgotpasswordconfirm', array('error' => 1));
		}else{

			$this->load->library('form_validation' );
			//$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]|xss_clean');
			$this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]|max_length[32]|xss_clean' );
			$this->form_validation->set_rules('confirmpassword','Xác nhận mật khẩu','required|matches[password]' );

			if ( $this -> form_validation -> run() === FALSE)
			{
				return $this->layout->view('/user/forgotpasswordconfirm');
			}else{
				$password = $this->security->xss_clean($this->input->post('password'));
				$this->user->set_password($email, $password);
				$this->user->set_forgot($email, '',date("Y-m-d H:i:s"));
				return $this->layout->view('/user/forgotpasswordconfirm', array('success' => 1));
			}
		}
	}



	public function updateinfo(){
		if(!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('redirect_uri', base_url('/cap-nhat-thong-tin'));
			return redirect('/dang-nhap');
		}

		$user = $this->session->userdata('user');
		$userdata = $this->user->get_userinfo($user['email']);
		$data['user'] = $userdata;
		
		$data['success'] = false;

		$this->load->library('form_validation' );
		$this->form_validation->set_error_delimiters('', '<br />');
		$this->form_validation->set_rules('firstname','Tên','trim|required' );
		$this->form_validation->set_rules('lastname','Họ đệm','trim|required' );
		$this->form_validation->set_rules('gender','Giới tính','required' );

		$this->form_validation->set_rules('day', 'Ngày', 'required|xss_clean');
		$this->form_validation->set_rules('month', 'Tháng', 'required|xss_clean');
		$this->form_validation->set_rules('year', 'Năm', 'required|xss_clean|callback_checkValidDate');

		$this->form_validation->set_rules('phone', 'Số điện thoại', 'numeric');
		$this->form_validation->set_rules('cmnd', 'CMND', 'numeric');

		if ( $this -> form_validation -> run() === FALSE
		|| !checkdate($this->input->post('month'), $this->input->post('day'), $this->input->post('year'))
		)
		{
			//$data['success'] = true;
			//return $this->layout->view('/user/updateinfo',$data);
		}else{
			$userdata->firstname = $this->security->xss_clean($this->input->post('firstname'));
			$userdata->lastname = $this->security->xss_clean($this->input->post('lastname'));
			$userdata->gender = $this->input->post('gender');
			$userdata->birthday = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
			$userdata->address = $this->security->xss_clean($this->input->post('lastname'));
			$userdata->phone = $this->security->xss_clean($this->input->post('phone'));
			$userdata->cmnd = $this->security->xss_clean($this->input->post('cmnd'));

			if($this->user->updateInfo($userdata)){
				$data['success'] = true;
				$user['name'] =  $userdata->lastname." ". $userdata->firstname;
				$user['firstname'] = $userdata->firstname;
				$user['lastname'] = $userdata->lastname;
				$user['gender'] = $userdata->gender;
				$user['birthday'] = $userdata->birthday;
				$this->session->set_userdata('user',$user);
			}
		}
		$data['session'] = $this->session->userdata;

		return $this->layout->view('/user/updateinfo',$data);
	}

	public function checkValidDate(){
		if(checkdate($this->input->post('month'), $this->input->post('day'), $this->input->post('year'))){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function changepass(){
		if(!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('redirect_uri', base_url('/cap-nhat-mat-khau'));
			return redirect('/dang-nhap');
		}
		$user = $this->session->userdata('user');
		$data['session'] = $this->session->userdata;
		$data['success'] = false;

		$this->load->library('form_validation' );
		//$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]|xss_clean');
			
		$this->form_validation->set_rules('password','Mật khẩu','required|xss_clean|callback_checkPassword');
		$this->form_validation->set_rules('newpassword','Mật khẩu mới','required|min_length[6]|max_length[32]|xss_clean' );
		$this->form_validation->set_rules('confirmnewpassword','Xác nhận mật khẩu mới','required|matches[newpassword]' );

		if ( $this -> form_validation -> run() === FALSE){
			$data['success'] = false;
		}else{
			$email = $this->security->xss_clean($user['email']);
			//	die("x".$email);
			$password = $this->security->xss_clean($this->input->post('newpassword'));
			$this->user->set_password($email, $password);
			$data['success'] = true;
		}

		return $this->layout->view('/user/changepass',$data);
	}


	public function checkPassword() {
		$user = $this->session->userdata('user');
		if($this->user->checkPassword($this->security->xss_clean($user['email']),$this->security->xss_clean($this->input->post('password')))){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	
	
	public function avatar(){
		if(!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('redirect_uri', base_url('/cap-nhat-mat-khau'));
			return redirect('/dang-nhap');
		}
		$user = $this->session->userdata('user');
		
		$data['success'] = false;
		
		
		if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name']))
		{
			//die("xxxx");
			$config['upload_path'] = ".".assets_url('/avatars/', false);
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '10240';
			$config['max_width']  = '200';
			$config['max_height']  = '200';
				
			$this->load->library('upload', $config);
				
			if ( ! $this->upload->do_upload('avatar'))
			{
				$data['errorupload'] = $this->upload->display_errors();
				return $this->layout->view('/user/avatar',$data);
			}
			else
			{
				$dataupload =  $this->upload->data();
				@unlink(".".assets_url('/avatars/'.$user['avatar'], false));
				$user['avatar'] = $dataupload['file_name'];
				$email = $this->security->xss_clean($user['email']);
				$this->user->set_avatar($email, $dataupload['file_name']);
				$this->session->set_userdata('user',$user);
				$data['success'] = true;
			}
		}
		
		$data['user'] = $user;
		$data['session'] = $this->session->userdata;
		return $this->layout->view('/user/avatar',$data);
	}

}