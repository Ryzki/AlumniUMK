<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penting extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/penting_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_penting'] = $this->penting_model->select_all()->result();
			$this->template->display('panel/penting_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addpenting() {		
		$this->template->display('panel/addpenting_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Title</b>','trim|required|min_length[5]|max_length[100]');		
		$this->form_validation->set_rules('short','<b>Short Description</b>','trim');
		$this->form_validation->set_rules('deskripsi','<b>Description</b>','trim');
		$this->form_validation->set_rules('semat','<b>Sematkan</b>','trim');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addpenting_v');   
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$jam = time();				
				
				$config['file_name']    = 'Info_'.'_'.$jam.'.jpg';
				$config['upload_path'] = './info/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';		
				$config['overwrite'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$config['image_library'] = 'gd2';
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config['maintain_ratio'] = TRUE;
										
				$config['width'] = 500;
				//$config['height'] = 250;
				$this->load->library('image_lib',$config);
				 
				$this->image_lib->resize();
			} elseif (empty($_FILES['userfile']['name'])){
				$config['file_name'] = '';
			}
									
			$this->penting_model->insert_data();
 			redirect(site_url().'panel/penting');
		}
	}
	
	public function editpenting($penting_id) {		
		$data['penting'] = $this->penting_model->select_by_id($penting_id)->row();
		$this->template->display('panel/editpenting_v', $data);
	}
	
	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();				
				
			$config['file_name']    = 'Info_'.'_'.$jam.'.jpg';
			$config['upload_path'] = './info/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
										
			$config['width'] = 500;
			//$config['height'] = 250;
			$this->load->library('image_lib',$config);
				 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}			
		$this->penting_model->update_data();
 		redirect(site_url().'panel/penting');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/penting');
		} else {
			$this->penting_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/penting\">";
		}
	}
}
/* Location: ./application/controllers/panel/penting.php */
?>