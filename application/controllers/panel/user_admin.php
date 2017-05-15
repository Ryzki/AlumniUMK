<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/user_admin_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_admin'] = $this->user_admin_model->select_all()->result();
			$this->template->display('panel/admin_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	

	public function addadmin() {
		$this->template->display('panel/addadmin_v'); 
	}

	public function savedata() {								
		$this->form_validation->set_rules('username','<b>Username</b>','trim|required|min_length[5]|max_length[30]|is_unique[umk_users.user_username]');
		$this->form_validation->set_rules('password','<b>Password</b>','trim|required');
		$this->form_validation->set_rules('name','<b>Name</b>','trim|required|min_length[5]|max_length[50]');		
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addadmin_v');  
		} else {
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

			$this->user_admin_model->insert_data();
 			redirect(site_url().'panel/user_admin');
		}
	}
	
	public function editadmin($user_id) {
		$data['user'] = $this->user_admin_model->select_by_id($user_id)->row();
		$this->template->display('panel/editadmin_v', $data);
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

		$this->user_admin_model->update_data();
 		redirect(site_url().'panel/user_admin');
	}
	
	public function deletedata($kode = '') {
		$kode = $this->security->xss_clean($this->uri->segment(4));		
		
		if ($kode == null) {
			redirect(site_url().'panel/user_admin');
		} else {
			$this->user_admin_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/user_admin\">";
		}
	}
}
/* Location: ./application/controllers/panel/User_admin.php */
?>