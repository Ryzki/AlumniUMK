<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_fo');
		$this->load->model('about_model');
		$this->load->model('progdi_model');
		$this->load->model('other_model');       
	}
	
	public function index($content_id = 2){
		$data['about'] = $this->about_model->select_about($content_id)->row();						
    	$this->template_fo->display('about_v', $data);
	}
}
/* Location: ./application/controller/about.php */
?>