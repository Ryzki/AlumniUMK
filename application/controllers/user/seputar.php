<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seputar extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template_user');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('user/seputar_model');
		$this->load->model('user/menu_model');	
	}
	
	public function index(){
		redirect(base_url());
	}

	public function progdi(){
		if($this->session->userdata('logged_in_umk')) {
			$progdi_id = $this->uri->segment(4);
			$data['progdi'] = $this->seputar_model->select_progdi2($progdi_id)->row();
			$data['daftar_seputar'] = $this->seputar_model->select_all($progdi_id)->result();
			$this->template_user->display('user/seputar_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addseputar() {
		$progdi_id = $this->uri->segment(4);
		$data['progdi'] = $this->seputar_model->select_progdi2($progdi_id)->row();
		$this->template_user->display('user/addseputar_v', $data); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Title</b>','trim|required|min_length[5]|max_length[70]|is_unique[umk_seputar.seputar_title]');
		
		if ($this->form_validation->run() == FALSE) {
			$progdi_id = $this->uri->segment(4);
			$data['progdi'] = $this->seputar_model->select_progdi2($progdi_id)->row();
			$this->template_user->display('user/addseputar_v', $data);  
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
				//$config['height'] = 200;
				$this->load->library('image_lib',$config);
				 
				$this->image_lib->resize();
			} elseif (empty($_FILES['userfile']['name'])){
				$config['file_name'] = '';
			}

			$this->seputar_model->insert_data();
 			redirect(site_url().'user/seputar/progdi/'.$this->uri->segment(4));
		}
	}
	
	public function editseputar($seputar_id) {
		$progdi_id = $this->uri->segment(4);
		$seputar_id = $this->uri->segment(5);
		$data['progdi'] = $this->seputar_model->select_progdi2($progdi_id)->row();
		$data['seputar'] = $this->seputar_model->select_by_id($seputar_id)->row();
		$this->template_user->display('user/editseputar_v', $data);
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
			//$config['height'] = 200;
			$this->load->library('image_lib',$config);
				
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->seputar_model->update_data();
 		redirect(site_url().'user/seputar/progdi/'.$this->uri->segment(4));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url().'user/seputar/progdi/'.$this->uri->segment(4));
		} else {
			$this->seputar_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."user/seputar/progdi".'/'.$this->uri->segment(4)."\">";
		}
	}
}
/* Location: ./application/controllers/user/seputar.php */
?>