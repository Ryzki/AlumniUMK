<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_alumni extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/user_alumni_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['progdi'] = $this->user_alumni_model->select_progdi()->result();							
			$this->template->display('panel/cariuseralumni_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function caridatauseralumni() {	
		$data['daftar_user'] = $this->user_alumni_model->select_all()->result();
		$this->template->display('panel/useralumni_v', $data);		
	}

	public function edituser($user_id) {
		$data['detail'] = $this->user_alumni_model->select_by_id($user_id)->row();
		$this->template->display('panel/edituseralumni_v', $data);
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();
			$kode = $this->input->post('username');
				
			$config['file_name']    = 'Avatar_'.$kode.'_'.$jam.'.jpg';
			$config['upload_path'] = './avatar/';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
										
			$config['width'] = 100;
			$config['height'] = 100;
			$this->load->library('image_lib',$config);
				 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->user_alumni_model->update_data();
 		redirect(site_url().'panel/user_alumni');
	}
	
	/*public function deletedata($kode = '', $nim = '') {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		$nim = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url().'panel/user_alumni');
		} else {
			$this->user_alumni_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/user_alumni\">";
		}
	} */	
}
/* Location: ./application/controllers/panel/user_alumni.php */
?>