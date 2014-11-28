<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Email extends CI_Email{
	protected $CI;
	function __construct($config = array())
	{
		parent::__construct($config);
		$this->CI =& get_instance();
	}
	
	public function send_with_view($view, $data = null, $toemail, $subject ="", $fromemail = "webmaster@tid.com", $fromtitle ="T-ID"){
		
		$config=array(
				'charset'=>'utf-8',
				'wordwrap'=> TRUE,
				'mailtype' => 'html'
		);
		$this->initialize($config);
		
		
		
		$content = $this->CI->load->view($view, $data, true);
		
		$this->to($toemail);
		$this->from($fromemail, $fromtitle);
		$this->subject($subject);
		$this->message($content);
		$mail = $this->send();
		return $mail;
	}
}