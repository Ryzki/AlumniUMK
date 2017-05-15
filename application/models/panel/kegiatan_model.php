<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_kegiatan');
		$this->db->where('kegiatan_trash', 0);
		$this->db->order_by('kegiatan_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'kegiatan_desc' => trim($this->input->post('desc')),
    			'kegiatan_next_link' => trim($this->input->post('next')),
				'kegiatan_tgl_update' => date('Y-m-d'),				
    			'kegiatan_jam_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_kegiatan', $data);
	}
	
	function select_by_id($kegiatan_id) {
		$this->db->select('*');
		$this->db->from('umk_kegiatan');
		$this->db->where('kegiatan_id', $kegiatan_id);
		
		return $this->db->get();
	}

	function update_data() {
		$kegiatan_id     = $this->input->post('kegiatan_id');
		$data = array(
    			'kegiatan_desc' => trim($this->input->post('desc')),
    			'kegiatan_next_link' => trim($this->input->post('next')),    			
				'kegiatan_tgl_update' => date('Y-m-d'),				
    			'kegiatan_jam_update' => date('Y-m-d H:i:s')
				);

		$this->db->where('kegiatan_id', $kegiatan_id);
		$this->db->update('umk_kegiatan', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('kegiatan_trash' => 1);
						
		$this->db->where('kegiatan_id', $kode);
		$this->db->update('umk_kegiatan', $data);
	}
}
/* Location: ./application/model/panel/kegiatan_model.php */
?>