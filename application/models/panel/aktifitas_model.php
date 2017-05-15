<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aktifitas_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_aktifitas');
		$this->db->where('aktifitas_trash', 0);
		$this->db->order_by('aktifitas_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'aktifitas_desc' => trim($this->input->post('desc')),
				'aktifitas_tgl_update' => date('Y-m-d'),				
    			'aktifitas_jam_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_aktifitas', $data);
	}
	
	function select_by_id($aktifitas_id) {
		$this->db->select('*');
		$this->db->from('umk_aktifitas');
		$this->db->where('aktifitas_id', $aktifitas_id);
		
		return $this->db->get();
	}

	function update_data() {
		$aktifitas_id     = $this->input->post('aktifitas_id');
		$data = array(
    			'aktifitas_desc' => trim($this->input->post('desc')),    			
				'aktifitas_tgl_update' => date('Y-m-d'),				
    			'aktifitas_jam_update' => date('Y-m-d H:i:s')
				);

		$this->db->where('aktifitas_id', $aktifitas_id);
		$this->db->update('umk_aktifitas', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('aktifitas_trash' => 1);
						
		$this->db->where('aktifitas_id', $kode);
		$this->db->update('umk_aktifitas', $data);
	}
}
/* Location: ./application/model/panel/aktifitas_model.php */
?>