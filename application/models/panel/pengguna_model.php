<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_pengguna');		
		$this->db->order_by('pengguna_id','desc');
		
		return $this->db->get();
	}

	function select_by_id($pengguna_id) {
		$this->db->select('*');
		$this->db->from('umk_pengguna');
		$this->db->where('pengguna_id', $pengguna_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/panel/pengguna_model.php */
?>