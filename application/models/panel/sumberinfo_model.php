<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sumberinfo_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_sumber_info');
		$this->db->where('info_trash', 0);
		$this->db->order_by('info_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'info_desc' => trim($this->input->post('desc')),    			
				'info_tgl_update' => date('Y-m-d'),				
    			'info_jam_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_sumber_info', $data);
	}
	
	function select_by_id($info_id) {
		$this->db->select('*');
		$this->db->from('umk_sumber_info');
		$this->db->where('info_id', $info_id);
		
		return $this->db->get();
	}

	function update_data() {
		$info_id     = $this->input->post('info_id');
		$data = array(
    			'info_desc' => trim($this->input->post('desc')),
				'info_tgl_update' => date('Y-m-d'),				
    			'info_jam_update' => date('Y-m-d H:i:s')
				);

		$this->db->where('info_id', $info_id);
		$this->db->update('umk_sumber_info', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('info_trash' => 1);
						
		$this->db->where('info_id', $kode);
		$this->db->update('umk_sumber_info', $data);
	}
}
/* Location: ./application/model/panel/sumberinfo_model.php */
?>