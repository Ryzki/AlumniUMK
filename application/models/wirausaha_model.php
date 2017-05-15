<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wirausaha_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_all($limit = 12, $offset = 0) {
		$this->db->select('*');
		$this->db->from('umk_usaha');
		$this->db->where('usaha_iklan', 1);
		$this->db->where('usaha_transfer', 1);
		$this->db->where('usaha_iklan_expired >', date('Y-m-d'));
		$this->db->limit($limit);
        $this->db->offset($offset);		
		$this->db->order_by('usaha_id', 'asc');
		
		return $this->db->get();
	}

	function count_all() {
		return $this->db->count_all('umk_usaha');
	}

	function select_by_id($usaha_id) {
		$this->db->select('*');
		$this->db->from('umk_usaha');		
		$this->db->where('usaha_id', $usaha_id);       
		
		return $this->db->get();
	}

	function select_usaha($usaha_id) {
		$this->db->select('*');
		$this->db->from('umk_usaha');
		$this->db->where('usaha_iklan', 1);
		$this->db->where('usaha_transfer', 1);
		$this->db->where('usaha_id !=', $usaha_id);
		$this->db->order_by('usaha_id', 'asc');
		
		return $this->db->get();
	}			
}
/* Location: ./application/model/wirausaha_model.php */
?>