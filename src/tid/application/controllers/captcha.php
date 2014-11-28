<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Controller {
	private $captcha_path = 'assets/captcha/';
	private $width = 91;
	private $height = 25;
	
	public function __construct()
	{
		parent::__construct();
		$this->captcha_path = ".".assets_url('/captcha/', FALSE);
	}
	
	public function show()
	{
		$this->load->helper(array('captcha'));
		
		$word = random_string('alnum',6);
		$vals = array(
				'word' => $word,
				'img_path'    => $this->captcha_path,
				'img_url'    => $this->captcha_path,
				'img_width'     => $this->width,
				'img_height' => $this->height,
				'border' => 0,
				'expiration' => 7200
		);
		
		$cap = create_captcha($vals);
		
		//$this->session->set_userdata('captcha', $cap['word']);
		
		$filename = base_url($this->captcha_path . $cap['time'] . '.jpg');
	
		$captcha = '<img width="'.$this->width.'" height="'.$this->height.'" alt="" src="'.$filename.'">
		<input type="hidden" name="captchakey" id="captchakey" value="'.md5(strtolower($cap['word'])).'">';
		echo $captcha;
		//return $captcha;		
	}
	
	public function image()
	{
		//die($this->captcha_path);
		$this->load->helper(array('captcha', 'file'));
		
		//if(isset($this->input->post('title', TRUE);))
			
		$vals = array(
				'img_path'    => $this->captcha_path,
				'img_url'    => $this->captcha_path,
				'img_width'     => $this->width,
				'img_height' => $this->height,
				'border' => 0,
				'expiration' => 7200
		);
		
		$cap = create_captcha($vals);
		
		$this->session->set_userdata('captcha', $cap['word']);
		
		$filename = $this->captcha_path . $cap['time'] . '.jpg';
		$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		$this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header('Content-Type: image/jpeg');
		$this->output->set_header('Content-Length: ' . filesize($filename));
		echo read_file($filename);
		
	}
}
	