<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_jenis_perusahaan');
		$this->db->where('jenis_trash', 0);
		$this->db->order_by('jenis_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'jenis_desc' => trim($this->input->post('desc')),
				'jenis_tgl_update' => date('Y-m-d'),				
    			'jenis_jam_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_jenis_perusahaan', $data);
	}
	
	function select_by_id($jenis_id) {
		$this->db->select('*');
		$this->db->from('umk_jenis_perusahaan');
		$this->db->where('jenis_id', $jenis_id);
		
		return $this->db->get();
	}

	function update_data() {
		$jenis_id     = $this->input->post('jenis_id');
		$data = array(
    			'jenis_desc' => trim($this->input->post('desc')),
				'jenis_tgl_update' => date('Y-m-d'),				
    			'jenis_jam_update' => date('Y-m-d H:i:s')
				);

		$this->db->where('jenis_id', $jenis_id);
		$this->db->update('umk_jenis_perusahaan', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('jenis_trash' => 1);
						
		$this->db->where('jenis_id', $kode);
		$this->db->update('umk_jenis_perusahaan', $data);
	}
}
/* Location: ./application/model/panel/jenis_model.php */
?>