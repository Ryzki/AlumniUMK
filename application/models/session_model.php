<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
	
	// Cek data user
	function check_user_account($username, $password) {
		$this->db->select('u.*, a.fakultas_id, a.progdi_id');
		$this->db->from('umk_users u');
		$this->db->join('umk_alumni a', 'u.alumni_nim = a.alumni_nim', 'left');
		$this->db->where('u.user_username', $username);
		$this->db->where('u.user_password', $password);
		$this->db->where('u.user_level <>', 'Alumni');
		
		return $this->db->get();
	}
	
	// Ambil Data per Username
	function get_user($username) {
		$this->db->select('*');
		$this->db->from('umk_users');
		$this->db->where('user_username', $username);
		
		return $this->db->get();
	}		
}
/* Location: ./application/model/session_model.php */
?>