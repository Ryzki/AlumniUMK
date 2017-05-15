<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hubungi_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_hubungi');
		$this->db->where('hubungi_trash', 0);		
		$this->db->order_by('hubungi_id','desc');
		
		return $this->db->get();
	}

	function select_by_id($hubungi_id) {
		$this->db->select('*');
		$this->db->from('umk_hubungi');
		$this->db->where('hubungi_id', $hubungi_id);
		
		return $this->db->get();
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('hubungi_trash' => 1);
						
		$this->db->where('hubungi_id', $kode);
		$this->db->update('umk_hubungi', $data);
	}
}
/* Location: ./application/model/panel/hubungi_model.php */
?>