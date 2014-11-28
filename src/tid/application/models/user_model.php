<?php
class User_model extends CI_Model {
	public $id;
	public $email;
	public $firstname;
	public $lastname;
	public $avatar;
	
	public $password;
	public $birthday;
	public $gender;
	public $address;
	public $phone;
	public $cmnd;
	public $regdate;
	public $isadmin = 0;
	public $status = 1;
	public $forgotcode = '';
	public $forgotexpire = NULL;
	
	public function getCount(){
		return $this->db->count_all("users");
	}
	
	public function getAll($limit, $start){
		
		$this->db->limit($limit, $start);
		$this->db->from('users');
		$users = $this->db->get()->result();
	
		if ( is_array($users) && count($users) >= 1 ) {
			return $users;
		}
		return null;
	}
	
	public function set_avatar($email, $avatar){
		$data = array(
				'avatar' => $avatar
		);
		$this->db->where('email', $email);
		return $this->db->update('users', $data);
	}
	public function set_password($email, $password){
		$data = array(
				'password' => sha1($password)
		);
		$this->db->where('email', $email);
		return $this->db->update('users', $data);
	}
	
	public function set_forgot($email, $code, $expire){
		$data = array(
				'forgotcode' => $code,
				'forgotexpire' => $expire
		);
		$this->db->where('email', $email);
		return $this->db->update('users', $data);
	}
	
	public function get_forgot($email){
		$data = array('code' => '', 'expire' => '');
		$this->db->from('users');
		$this->db->where('email',$email );
		$name = $this->db->get()->result();
		if ( is_array($name) && count($name) == 1 ) {
			$user = $name[0];
			$data['code'] = $user->forgotcode;
			$data['expire'] = $user->forgotexpire;
		}
		
		return $data;
	}
	
	public function get_name($email){
		$this->db->from('users');
		$this->db->where('email',$email );
		$name = $this->db->get()->result();
		if ( is_array($name) && count($name) == 1 ) {
			$user = $name[0];
			
			if($user->lastname == '') return $user->firstname;
			if($user->firstname == '') return $user->lastname;
			return $user->lastname." ".$user->firstname;
		}
	
		return "";
	}
	
	public function get_status($email){
		$this->db->from('users');
		$this->db->where('email',$email );
		$status = $this->db->get()->result();
		if ( is_array($status) && count($status) == 1 ) {
			$user = $status[0];
			return $user->status;
		}
		
		return 0;
	}
	
	public function get_userinfo($email){
		$this->db->from('users');
		$this->db->where('email',$email );
		$status = $this->db->get()->result();
		if ( is_array($status) && count($status) == 1 ) {
			$user = $status[0];
			return $user;
		}
		return null;
	}
	public function get_userinfo_byid($id){
		$this->db->from('users');
		$this->db->where('id',$id );
		$status = $this->db->get()->result();
		if ( is_array($status) && count($status) == 1 ) {
			$user = $status[0];
			return $user;
		}
		return null;
	}
	
	public function checkPassword($email, $password){
		$this->db->from('users');
		$this->db->where('email',$email );
		$this->db->where('password', sha1($password) );
		$login = $this->db->get()->result();
		if ( is_array($login) && count($login) == 1 ) {
			return true;
		}
		
		return false;
	}
	
	public function validate($email, $password, $remember = false)
	{
		$this->db->from('users');
		$this->db->where('email',$email );
		$this->db->where('password', sha1($password) );
		$this->db->where('status !=', 0);

		$login = $this->db->get()->result();
		if ( is_array($login) && count($login) == 1 ) {
			$user = $login[0];
				
			$sessdata = array(
					'user' => array(
							'id' => $user->id,
							'email'     => $user->email,
							'name' => $user->lastname." ".$user->firstname,
							'firstname' => $user->firstname,
							'lastname' => $user->lastname,
							'avatar' => $user->avatar,
							'gender'	=> $user->gender,
							'birthday' => $user->birthday,
							'isadmin' => ($user->isadmin == 1)
					),
					'logged_in' => TRUE
			);
				
			if($remember){
				$this->session->sess_expiration = 60*60*24*31;
				$this->session->sess_expire_on_close = FALSE;
			}
			$this->session->set_userdata($sessdata);
			return true;
		}
		return false;
	}

	public function checkemailexists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));
		return $query->num_rows();
	}

	private function insert()
	{
		return $this->db->insert('users', $this);
	}

	public function updateInfo($user)
	{	
		$this->db->set('firstname', $user->firstname);
		$this->db->set('lastname', $user->lastname);
		$this->db->set('birthday', $user->birthday);
		$this->db->set('gender', $user->gender);
		$this->db->set('address', $user->address);
		$this->db->set('phone', $user->phone);
		$this->db->set('cmnd', $user->cmnd);
		
        $this->db->where('email', $user->email);
        return $this->db->update('users');;
	}
	
	private function update(){return true;}

	public function save()
	{
		if (isset($this->id)) {
			return $this->update();
		} else {
			return $this->insert();
		}
	}

}