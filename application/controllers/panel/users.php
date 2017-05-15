<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/user_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_user'] = $this->user_model->select_all()->result();
			$this->template->display('panel/users_v', $data);			
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	

	public function adduser() {
		$this->template->display('panel/adduser_v'); 
	}

	public function listakses($users_userid) {
		$data['daftar_akses'] = $this->user_model->select_list_akses($users_userid)->result();
		$this->template->display('panel/listaksesuser_v', $data); 
	}

	public function adduserakses() {
		$users_userid = $this->uri->segment(4);
		$data['progdi'] = $this->user_model->select_progdi()->result();
		$data['user'] = $this->user_model->select_by_id($users_userid)->row();
		$this->template->display('panel/adduserakses_v', $data); 
	}

	public function savedata() {								
		$this->form_validation->set_rules('username','<b>Username</b>','trim|required|min_length[5]|max_length[30]|is_unique[umk_users.user_username]');
		$this->form_validation->set_rules('password','<b>Password</b>','trim|required');
		$this->form_validation->set_rules('name','<b>Name</b>','trim|required|min_length[5]|max_length[50]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/adduser_v');  
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

			$this->user_model->insert_data();
 			redirect(site_url().'panel/users');
		}
	}
	
	public function edituser($user_id) {
		$data['user'] = $this->user_model->select_by_id($user_id)->row();
		$this->template->display('panel/edituser_v', $data);
	}

	public function edituserakses($akses_id) {
		$akses_id = $this->uri->segment(5);
		$data['progdi'] = $this->user_model->select_progdi()->result();
		$data['detail'] = $this->user_model->select_akses_by_id($akses_id)->row();
		$this->template->display('panel/edituserakses_v', $data);
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

		$this->user_model->update_data();
 		redirect(site_url().'panel/users');
	}
	
	public function deletedata($kode = '') {
		$kode = $this->security->xss_clean($this->uri->segment(4));		
		
		if ($kode == null) {
			redirect(site_url().'panel/users');
		} else {
			$this->user_model->delete_data($kode);
			$this->user_model->delete_akses($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/users\">";
		}
	}

	public function savedataakses() {								
		$this->form_validation->set_rules('lstProgdi','<b>Program Study</b>','required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['progdi'] = $this->user_model->select_progdi()->result();
			$this->template->display('panel/adduserakses_v', $data);  
		} else {			
			$this->user_model->insert_data_akses();
 			redirect(site_url().'panel/users/listakses'.'/'.$this->uri->segment(4));
		}
	}

	public function updatedataakses() {		
		$this->user_model->update_data_akses();
 		redirect(site_url().'panel/users/listakses'.'/'.$this->uri->segment(4));
	}

	public function deletedataakses($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url().'panel/users/listakses'.'/'.$this->uri->segment(4));
		} else {
			$this->user_model->delete_data_akses($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/users/listakses".'/'.$this->uri->segment(4)."\">";
		}
	}	
}
/* Location: ./application/controllers/panel/users.php */
?>