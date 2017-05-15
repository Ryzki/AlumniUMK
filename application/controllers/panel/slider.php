<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/slider_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {	
			$data['daftar_slider'] = $this->slider_model->select_all()->result();
			$this->template->display('panel/slider_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addslider() {
		$this->template->display('panel/addslider_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('name','<b>Slider Name</b>','trim|required|is_unique[umk_slider.slider_name]');
		$this->form_validation->set_rules('link','<b>Slider Link</b>','trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addslider_v'); 
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$jam = time();				
				
				$config['file_name']    = 'Slider_'.$jam.'.jpg';
				$config['upload_path'] = './slider/';
				$config['allowed_types'] = 'jpg|png|gif';		
				$config['overwrite'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$config['image_library'] = 'gd2';
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config['maintain_ratio'] = TRUE;
										
				$config['width'] = 555;
				$config['height'] = 320;
				$this->load->library('image_lib',$config);
				 
				$this->image_lib->resize();
			} elseif (empty($_FILES['userfile']['name'])){
				$config['file_name'] = '';
			}
			
			$this->slider_model->insert_data();
 			redirect(site_url().'panel/slider');
		}
	}
	
	public function editslider($slider_id) {
		$data['slider'] = $this->slider_model->select_by_id($slider_id)->row();
		$this->template->display('panel/editslider_v', $data);
	}
	
	public function updatedata() {
			if (!empty($_FILES['userfile']['name'])) {
				$jam = time();
				
				$config['file_name']    = 'Slider_'.$jam.'.jpg';
				$config['upload_path'] = './slider/';
				$config['allowed_types'] = 'jpg|png|gif';		
				$config['overwrite'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$config['image_library'] = 'gd2';
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config['maintain_ratio'] = TRUE;
										
				$config['width'] = 555;
				$config['height'] = 320;
				$this->load->library('image_lib',$config);
				 
				$this->image_lib->resize();
			} elseif (empty($_FILES['userfile']['name'])){
				$config['file_name'] = '';
			}		
		$this->slider_model->update_data();
 		redirect(site_url().'panel/slider');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/slider');
		} else {
			$this->slider_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/slider\">";
		}
	}
}
/* Location: ./application/controllers/panel/slider.php */
?>