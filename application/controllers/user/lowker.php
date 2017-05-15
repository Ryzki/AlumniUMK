<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lowker extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template_user');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('user/lowker_model');
		$this->load->model('user/menu_model');	
	}
	
	public function index(){
		redirect(base_url());
	}

	public function progdi($progdi_id) {
		if($this->session->userdata('logged_in_umk')) {
			$progdi_id = $this->uri->segment(4);
			$data['progdi'] = $this->lowker_model->select_progdi2($progdi_id)->row();		
			$data['daftar_lowker'] = $this->lowker_model->select_all($progdi_id)->result();
			$this->template_user->display('user/lowker_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addlowker($progdi_id) {
		$progdi_id = $this->uri->segment(4);
		$data['progdi'] = $this->lowker_model->select_progdi2($progdi_id)->row();
		$this->template_user->display('user/addlowker_v', $data); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Title</b>','trim|required|is_unique[umk_lowker.lowker_title]');		
		$this->form_validation->set_rules('tgl_deadline','<b>Deadline</b>','required');		
		
		if ($this->form_validation->run() == FALSE) {
			$progdi_id = $this->uri->segment(4);
			$data['progdi'] = $this->lowker_model->select_progdi2($progdi_id)->row();
			$this->template_user->display('user/addlowker_v', $data); 
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$jam = time();				
				
				$config['file_name']    = 'Lowker_'.'_'.$jam.'.jpg';
				$config['upload_path'] = './lowongan_pict/';
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

			$this->lowker_model->insert_data();
 			redirect(site_url().'user/lowker/progdi/'.$this->uri->segment(4));
 		}
	}
	
	public function editlowker($lowker_id) {
		$progdi_id = $this->uri->segment(4);
		$lowker_id = $this->uri->segment(5);			
		$data['progdi'] = $this->lowker_model->select_progdi2($progdi_id)->row();
		$data['lowker'] = $this->lowker_model->select_by_id($lowker_id)->row();
		$this->template_user->display('user/editlowker_v', $data);
	}
	
	public function updatedata() {	
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();			
				
			$config['file_name']    = 'Lowker_'.'_'.$jam.'.jpg';
			$config['upload_path'] = './lowongan_pict/';
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
		
		$this->lowker_model->update_data();
 		redirect(site_url().'user/lowker/progdi/'.$this->uri->segment(4)); 		
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url().'user/lowker/progdi/'.$this->uri->segment(4)); 
		} else {
			$this->lowker_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."user/lowker/progdi".'/'.$this->uri->segment(4)."\">";
		}
	}
}
/* Location: ./application/controllers/user/lowker.php */
?>