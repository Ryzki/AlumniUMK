<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Controller{
	public function __construct(){
		parent::__construct();				   
	}

	public function create_image(){
		$md5_hash = md5(rand(0,999));
		$security_code = substr($md5_hash, 15, 5);		
		$array_item = array('security_code' => $security_code);	    
	    $this->session->set_userdata($array_item);

	    $width = 100; 
	    $height = 30;  
	    $image = ImageCreate($width, $height);  
	    $white = ImageColorAllocate($image, 255, 255, 255); 
	    $black = ImageColorAllocate($image, 0, 0, 0); 
	    $grey = ImageColorAllocate($image, 204, 204, 204); 
	    ImageFill($image, 0, 0, $black); 
	    ImageString($image, 40, 30, 6, $security_code, $white); 
	    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
	    imageline($image, 300, $height/2, $width, $height/2, $grey); 
	    imageline($image, $width/2, 300, $width/2, $height, $grey); 
	    header("Content-Type: image/jpeg"); 
	    ImageJpeg($image); 
	    ImageDestroy($image); 
	}				
}
/* Location: ./application/controller/captcha.php */
?>