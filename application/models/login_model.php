<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	// Cek data user
	function check_user_account($username, $password) {
		$this->db->select('u.*, a.progdi_id, a.alumni_active, a.alumni_email');
		$this->db->from('umk_users u');
		$this->db->join('umk_alumni a', 'u.alumni_nim = a.alumni_nim');		
		$this->db->where('u.user_username', $username);
		$this->db->where('u.user_password', $password);
		$this->db->where('u.user_level', 'Alumni');
		$this->db->where('a.alumni_active', 1);
		
		return $this->db->get();
	}
	
	// Ambil Data per Username
	function get_user($username) {
		$this->db->select('u.*');
		$this->db->from('umk_users u');
		$this->db->join('umk_alumni a', 'u.alumni_nim = a.alumni_nim');
		$this->db->where('u.user_username', $username);
		$this->db->where('u.user_level', 'Alumni');
		$this->db->where('a.alumni_active', 1);
		
		return $this->db->get();
	}

	function update_online() {
		$user_id = $this->session->userdata('user_id');
		$data = array(
				'user_online' => 1
				);

		$this->db->where('user_id', $user_id);
		$this->db->update('umk_users', $data);
	}

	function update_offline() {
		$user_id = $this->session->userdata('user_id');
		$data = array(
				'user_online' => 0
				);

		$this->db->where('user_id', $user_id);
		$this->db->update('umk_users', $data);
	}			
}
/* Location: ./application/model/login_model.php */
?>