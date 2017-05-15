<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seputar extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/seputar_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_seputar'] = $this->seputar_model->select_all()->result();
			$this->template->display('panel/seputar_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}		

	public function addseputar() {		
		$this->template->display('panel/addseputar_v'); 
	}
	
	public function savedata() { 								
		$this->form_validation->set_rules('title','<b>Title</b>','trim|required|min_length[5]|max_length[70]|is_unique[umk_seputar.seputar_title]');		
		$this->form_validation->set_rules('short','<b>Short Description</b>','trim');
		$this->form_validation->set_rules('deskripsi','<b>Description</b>','trim');
		
		if ($this->form_validation->run() == FALSE) {		
			$this->template->display('panel/addseputar_v'); 
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$jam = time();				
				
				$config['file_name']    = 'Seputar_'.$jam.'.jpg';
				$config['upload_path'] = './seputar_pict/';
				$config['allowed_types'] = 'jpg|png|gif|jpeg';		
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

			$this->seputar_model->insert_data();
 			redirect(site_url().'panel/seputar');
		}
	}
	
	public function editseputar($seputar_id) {
		$data['seputar'] = $this->seputar_model->select_by_id($seputar_id)->row();
		$data['progdi'] = $this->seputar_model->select_progdi()->result();
		
		$this->template->display('panel/editseputar_v', $data);
	}
	
	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();			
				
			$config['file_name']    = 'Seputar_'.$jam.'.jpg';
			$config['upload_path'] = './seputar_pict/';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';		
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

		$this->seputar_model->update_data();
 		redirect(site_url().'panel/seputar');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/seputar');
		} else {
			$this->seputar_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/seputar\">";
		}
	}
}
/* Location: ./application/controllers/panel/seputar.php */
?>