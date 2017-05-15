<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lowongan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('lowker_model');
		$this->load->model('menu_model'); 
	}
	
	public function index() {
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));		
		$data['daftar_lowker'] = $this->lowker_model->select_list()->result();
		$this->template_account->display('lowongan_v', $data);					
	}	
	
	public function addlowker() {		
		$this->template_account->display('addlowongan_v');
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Judul Lowongan</b>','trim|required|is_unique[umk_lowker.lowker_title]||xss_clean');
		$this->form_validation->set_rules('tgl_deadline','<b>Tgl.Deadline</b>','required|xss_clean');		
		
		if ($this->form_validation->run() == FALSE) {			
			$this->template_account->display('addlowongan_v'); 
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$jam = time();				
				
				$config['file_name']    = 'Lowker_'.'_'.$jam.'.jpg';
				$config['upload_path'] = './lowongan_pict/';
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

			// Insert Data Lowongan Kerja
			$this->lowker_model->insert_data();
 			redirect(site_url().'lowongan');
 		}
	}
	
	public function editlowker($lowker_id) {
		$data['progdi'] = $this->lowker_model->select_progdi2()->result();		
		$data['lowker'] = $this->lowker_model->select_by_id($lowker_id)->row();

		$this->template_account->display('editlowongan_v', $data);
	}
	
	public function updatedata() {	
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();			
				
			$config['file_name']    = 'Lowker_'.'_'.$jam.'.jpg';
			$config['upload_path'] = './lowongan_pict/';
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
		
		$this->lowker_model->update_data();
 		redirect(site_url().'lowongan'); 		
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));
		
		if ($kode == null) {
			redirect(site_url().'lowongan');
		} else {
			$this->lowker_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."lowongan\">";
		}
	}
}
/* Location: ./application/controllers/lowongan.php */
?>