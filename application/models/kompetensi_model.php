<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kompetensi_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_kompetensi($nim) {
		$this->db->select('*');
		$this->db->from('umk_kompetensi');	
		$this->db->where('alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Add Data Transisi
	function insert_data_kompetensi() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'kompetensi_sesuai' => trim($this->input->post('sesuai', 'true')),
				'kompetensi_tambahan' => trim($this->input->post('tambahan', 'true')),    			
				'kompetensi_date_update' => date('Y-m-d'),
				'kompetensi_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_kompetensi', $data);
	}

	// Update Data Transisi
	function update_data_kompetensi() {		
		$kompetensi_id = $this->input->post('kompetensi_id', 'true');

		$data = array(				
				'kompetensi_sesuai' => trim($this->input->post('sesuai', 'true')),
				'kompetensi_tambahan' => trim($this->input->post('tambahan', 'true')),    			
				'kompetensi_date_update' => date('Y-m-d'),
				'kompetensi_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->where('kompetensi_id', $kompetensi_id);
		$this->db->update('umk_kompetensi', $data);
	}
}
/* Location: ./application/model/kompetensi_model.php */
?>