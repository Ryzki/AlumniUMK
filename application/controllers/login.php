<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();				
		$this->load->library('template_fo');
		$this->load->model('login_model');
		$this->load->model('menu_model');       
	}
	
	public function index() {
		if($this->session->userdata('logged_in_alumni')) redirect(base_url());    	
    	$this->template_fo->display('login_v2');
	}

	public function validasi() {
		$username = trim($this->input->post('username', 'true'));
		$password = trim($this->input->post('password', 'true'));
		
		$this->form_validation->set_rules('username', '<b>Username</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', '<b>Password</b>', 'trim|required|xss_clean');
		
		$temp_user = $this->login_model->get_user($username)->row();
		$num_user = count($temp_user);						
		
		if ($this->form_validation->run() == FALSE) {
    		$this->template_fo->display('login_v2');
		} else {
			if ($num_user == 0) { // Username Tidak Terdaftar
				$this->session->set_flashdata('notification','Username Anda tidak Terdaftar atau Belum Aktif.');
				redirect(site_url('login'));				
			} elseif ($num_user > 0) { // Username Terdaftar tapi belum aktif				
				$temp_account = $this->login_model->check_user_account($username, sha1($password))->row();
				$num_account = count($temp_account);
				if ($num_account > 0) {	
					$array_item = array('user_id' => $temp_account->user_id,
										'nim' => $temp_account->alumni_nim,
										'username' => $temp_account->user_username, 
										'nama_lengkap' => $temp_account->user_name,
										'email' => $temp_account->alumni_email,										
										'avatar' => $temp_account->user_avatar,
										'progdi_id' => $temp_account->progdi_id,										
										'logged_in_alumni_tracer' => TRUE);
																			
					$this->session->set_userdata($array_item);							
					redirect(base_url());
				} else {					
					$this->session->set_flashdata('notification','LOGIN GAGAL !!, Username and Password Anda Tidak Cocok.');
					redirect(site_url('login'));					
				}				
			}								
		}		
	}

	public function daftar() {				
		if ($this->input->post('lstDaftar', 'true') == 1) {
			redirect(site_url('wisuda/daftar'));
		} else {
			redirect(site_url('daftar'));
		} 		
	}
	
	public function logout() {
		$this->login_model->update_offline();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-chace');
		$this->session->sess_destroy();
		redirect(base_url());
	}	
}
/* Location: ./application/controller/login.php */
?>