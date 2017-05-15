<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skala_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_skala');
		$this->db->where('skala_trash', 0);
		$this->db->order_by('skala_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'skala_desc' => trim($this->input->post('desc')),
				'skala_tgl_update' => date('Y-m-d'),				
    			'skala_jam_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_skala', $data);
	}
	
	function select_by_id($skala_id) {
		$this->db->select('*');
		$this->db->from('umk_skala');
		$this->db->where('skala_id', $skala_id);
		
		return $this->db->get();
	}

	function update_data() {
		$skala_id     = $this->input->post('skala_id');
		
		$data = array(
    			'skala_desc' => trim($this->input->post('desc')),    			
				'skala_tgl_update' => date('Y-m-d'),				
    			'skala_jam_update' => date('Y-m-d H:i:s')
				);

		$this->db->where('skala_id', $skala_id);
		$this->db->update('umk_skala', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('skala_trash' => 1);
						
		$this->db->where('skala_id', $kode);
		$this->db->update('umk_skala', $data);
	}
}
/* Location: ./application/model/panel/skala_model.php */
?>