<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Struktur extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template_user');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('user/struktur_model');
		$this->load->model('user/menu_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_struktur'] = $this->struktur_model->select_all()->result();

			$this->template_user->display('user/struktur_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addstruktur() {
		$data['progdi'] = $this->struktur_model->select_progdi()->result();
		$this->template_user->display('user/addstruktur_v', $data); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('lstProgdi','<b>Progdi Name</b>','trim|required|is_unique[umk_struktur.progdi_id]');
		$this->form_validation->set_rules('title','<b>Title</b>','trim|required|is_unique[umk_struktur.struktur_title]');
		
		if ($this->form_validation->run() == FALSE) {
			$data['progdi'] = $this->struktur_model->select_progdi()->result();
			
			$this->template_user->display('user/addstruktur_v', $data); 
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$jam = time();
				$kode = $this->input->post('lstProgdi');
				
				$config['file_name']    = 'Struktur_'.$kode.'_'.$jam.'.jpg';
				$config['upload_path'] = './struktur/';
				$config['allowed_types'] = 'jpg|png';		
				$config['overwrite'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$config['image_library'] = 'gd2';
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config['maintain_ratio'] = TRUE;
										
				$config['width'] = 500;
				//$config['height'] = 400;
				$this->load->library('image_lib',$config);
				 
				$this->image_lib->resize();
			} elseif (empty($_FILES['userfile']['name'])){
				$config['file_name'] = '';
			}
						
			$this->struktur_model->insert_data();
 			redirect(site_url().'user/struktur');
 		}
	}
	
	public function editstruktur($struktur_id) {
		$data['progdi'] = $this->struktur_model->select_progdi()->result();
		$data['struktur'] = $this->struktur_model->select_by_id($struktur_id)->row();
		$this->template_user->display('user/editstruktur_v', $data);
	}
	
	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();
			$kode = $this->input->post('lstProgdi');
				
			$config['file_name']    = 'Struktur_'.$kode.'_'.$jam.'.jpg';
			$config['upload_path'] = './struktur/';
			$config['allowed_types'] = 'jpg|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
										
			$config['width'] = 500;
			//$config['height'] = 400;
			$this->load->library('image_lib',$config);
				 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}
						
		$this->struktur_model->update_data();
 		redirect(site_url().'user/struktur'); 		
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'user/struktur');
		} else {
			$this->struktur_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."user/struktur\">";
		}
	}
}
/* Location: ./application/controllers/user/struktur.php */
?>