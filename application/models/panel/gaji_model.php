<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gaji_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_gaji');
		$this->db->where('gaji_trash', 0);
		$this->db->order_by('gaji_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'gaji_desc' => trim($this->input->post('desc')),
				'gaji_tgl_update' => date('Y-m-d'),				
    			'gaji_jam_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_gaji', $data);
	}
	
	function select_by_id($gaji_id) {
		$this->db->select('*');
		$this->db->from('umk_gaji');
		$this->db->where('gaji_id', $gaji_id);
		
		return $this->db->get();
	}

	function update_data() {
		$gaji_id     = $this->input->post('gaji_id');
		
		$data = array(
    			'gaji_desc' => trim($this->input->post('desc')),    			
				'gaji_tgl_update' => date('Y-m-d'),				
    			'gaji_jam_update' => date('Y-m-d H:i:s')
				);

		$this->db->where('gaji_id', $gaji_id);
		$this->db->update('umk_gaji', $data);
	}
	
	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('gaji_trash' => 1);
						
		$this->db->where('gaji_id', $kode);
		$this->db->update('umk_gaji', $data);
	}
}
/* Location: ./application/model/panel/gaji_model.php */
?>