<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_alumni() {
		$this->db->select('*');
		$this->db->from('umk_alumni');
		$this->db->where('alumni_active', 1);
		
		return $this->db->get();
	}

	function select_new() {
		$this->db->select('*');
		$this->db->from('umk_alumni');
		$this->db->where('alumni_active', 0);
		
		return $this->db->get();
	}

	function select_pengguna() {
		$this->db->select('*');
		$this->db->from('umk_pengguna');		
		
		return $this->db->get();
	}

	function select_hubungi() {
		$this->db->select('*');
		$this->db->from('umk_hubungi');		
		
		return $this->db->get();
	}			
}

/* Location: ./application/model/panel/home_model.php */
?>