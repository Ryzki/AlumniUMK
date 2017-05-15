<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_all($limit = 5, $offset = 0) {
		$this->db->select('*');
		$this->db->from('umk_penting');		
		$this->db->limit($limit);
        $this->db->offset($offset);
		$this->db->order_by('penting_date_post', 'desc');
		
		return $this->db->get();
	}

	function count_all() {
		return $this->db->count_all('umk_penting');
	}

	function select_by_id($penting_id) {
		$this->db->select('*');
		$this->db->from('umk_penting');		
		$this->db->where('penting_id', $penting_id);       
		
		return $this->db->get();
	}
}
/* Location: ./application/model/info_model.php */
?>