<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Controller {
	function __construct() {
		parent::__construct();	
		$this->load->model('session_model');	
	}
	
	public function login() {
		$session = $this->session->userdata('logged_in_umk');
		
		if ($session == FALSE) {
			$this->load->view('login_v');
		} else {
			if ($this->session->userdata('a_level') == 'User') {
				redirect(site_url('user/home'));
			} elseif ($this->session->userdata('a_level') == 'Admin') {
				redirect(site_url('panel/home'));									 				
			}			
		}
	}
	
	public function validasi() {
		$username = $this->input->post('username', 'true');
		$password = $this->input->post('password', 'true');			
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[15]|xss_clean');
		
		$temp_user = $this->session_model->get_user($username)->row();
		$num_user = count($temp_user);						
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_v');
		} else {
			if ($num_user == 0) { // Username Tidak Terdaftar
				$this->session->set_flashdata('notification','Username Anda tidak Terdaftar, Hubungi Administrator !');
				redirect(site_url('session/login'));
			} elseif ($num_user > 0) { // Username Terdaftar				
				$temp_account = $this->session_model->check_user_account($username, sha1($password))->row();
				$num_account = count($temp_account);
		
				if ($num_account > 0) {	
					$array_item = array('a_user_id' => $temp_account->user_id,
										'a_username' => $temp_account->user_username, 
										'a_nama_lengkap' => $temp_account->user_name,
										'a_level' => $temp_account->user_level,
										'a_avatar' => $temp_account->user_avatar,										
										'logged_in_umk' => TRUE);
																			
					$this->session->set_userdata($array_item);
					
					if ($this->session->userdata('a_level') == 'User') {
						redirect(site_url('user/home'));
					} elseif ($this->session->userdata('a_level') == 'Admin') {
						redirect(site_url('panel/home'));									 				
					}
				} else {					
					$this->session->set_flashdata('notification','LOGIN GAGAL !!, Username and Password Anda Tidak Cocok.');
					redirect(site_url('session/login'));					
				}				
			}								
		}		
	}	
}
/* Location: ./application/controllers/session.php */