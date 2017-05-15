<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/about_model');	
	}
	
	public function index($content_id = 2){
		if($this->session->userdata('logged_in_umk')) {
			$data['menu'] = $this->about_model->select_menu($content_id)->row();
			$this->template->display('panel/about_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}
	
	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();			
				
			$config['file_name']    = 'About_'.$jam.'.jpg';
			$config['upload_path'] = './content/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
										
			$config['width'] = 300;
			$config['height'] = 350;
			$this->load->library('image_lib',$config);
				 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}
		
		$this->about_model->update_data();
 		redirect(site_url().'panel/about');
	}	
}
/* Location: ./application/controllers/panel/about.php */
?>