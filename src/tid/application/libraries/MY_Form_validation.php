<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation{
	
	function __construct($config = array())
	{
		parent::__construct($config);
	}
	
	
	public function is_not_unique($str, $field)
	{
		list($table, $field)=explode('.', $field);
		$query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
		return $query->num_rows() > 0;
    }
    
    function valid_url($url) {
    	if(preg_match("/^http(|s):\/{2}(.*)\.([a-z]){2,}(|\/)(.*)$/i", $url)) {
    		if(filter_var($url, FILTER_VALIDATE_URL)) return TRUE;
    	}
    	return FALSE;
    }
}