<?php
class Client_model extends CI_Model {
	public $client_id;
	public $client_secret;
	public $name;
	public $redirect_uri;
	public $description;
	public $status;
	public $logo_url;
	
	public function insert()
	{
		return $this->db->insert('clients', $this);
	}
	
	public function setStatus($client_id, $status){
		$data = array(
				'status' => $status
		);
		$this->db->where('client_id', $client_id);
		return $this->db->update('clients', $data);
	}
	
	public function delete($client_id){
		
		//@unlink("./upload/image/".$_POST['prev_image']);
		//".".assets_url('/clients/', false);
		
		$tables = array('authorization', 'auth_codes', 'tokens', 'clients');
		$this->db->where('client_id', $client_id);
		return $this->db->delete($tables);
		
	}
	
	public function update(){
		if (isset($this->client_id)) {
			$this->db->update('clients',$this, array('client_id' => $this->client_id));
			
		}
		return false;
	
	}
	
	
	public function getAll(){
		
			$this->db->from('clients');
			$clients = $this->db->get()->result_array();
				
			if ( is_array($clients) && count($clients) >= 1 ) {
				return $clients;
			}
			return null;
	}
	
	public function getByCLientID($client_id){
		
			$this->db->from('clients');
			$this->db->where_in('client_id',$client_id);
			$clients = $this->db->get()->result();
				
			if ( is_array($clients) && count($clients) == 1 ) {
				return $clients[0];
			}
			return null;
			
	}
	
	public function getAllByUserID($user_id){
		$this->db->from('authorization');
		$this->db->where('user_id',$user_id );
		$this->db->select('client_id');
		$client_auth = $this->db->get()->result_array();

		if ( is_array($client_auth) && count($client_auth) >= 1) {
			
			foreach($client_auth as $a) {
				$clientlist[] = strval($a['client_id']);
			}
			
			$this->db->from('clients');
			$this->db->where_in('client_id',$clientlist);
			$clients = $this->db->get()->result_array();
			
			if ( is_array($clients) && count($clients) >= 1 ) {
				return $clients;
			}
			return null;
			
		}
		return null;
	}
	
	
	public function getAllByEmail($email){
		$this->db->from('users');
		$this->db->where('email',$email );
		$this->db->select('id');
		$users = $this->db->get()->result_array();
		if ( is_array($users) && count($users) == 1) {
			$userid = $users[0]['id'];
			return $this->getAllByUserID($userid);
		}
		return NULL;
	}
	
	
	public function remove($user_id, $client_id){
		return $this->db->delete('authorization', array('user_id' => $user_id, 'client_id' => $client_id));
	}
	
	
}