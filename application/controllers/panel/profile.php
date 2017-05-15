<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/profile_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$user_id   = $this->session->userdata('a_user_id');
			$data['profile'] = $this->profile_model->select_by_id($user_id)->row();
			$this->template->display('panel/profile_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();
			$kode = $this->input->post('username');
				
			$config['file_name']    = 'Avatar_'.$kode.'_'.$jam.'.jpg';
			$config['upload_path'] = './avatar/';
			$config['allowed_types'] = 'jpg|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
										
			$config['width'] = 50;
			$config['height'] = 50;
			$this->load->library('image_lib',$config);
				 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}
				
		$this->profile_model->update_data();
 		redirect(site_url().'panel/profile');
	}	
}
/* Location: ./application/controllers/panel/profile.php */
?>