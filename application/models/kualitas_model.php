<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kualitas_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_kualitas($nim) {
		$this->db->select('*');
		$this->db->from('umk_kualitas');	
		$this->db->where('alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Add Data Transisi
	function insert_data_kualitas() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'kualitas_nilai' => trim($this->input->post('lstKualitas', 'true')),
				'kualitas_makul' => trim($this->input->post('makul', 'true')),
				'kualitas_hardsoft' => trim($this->input->post('kemampuan', 'true')),
				'kualitas_ahli_ilmu' => trim($this->input->post('ilmu', 'true')),
				'kualitas_ahli_progdi' => trim($this->input->post('program', 'true')),
				'kualitas_ahli_profesional' => trim($this->input->post('profesional', 'true')),    			
				'kualitas_date_update' => date('Y-m-d'),
				'kualitas_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_kualitas', $data);
	}

	// Update Data Transisi
	function update_data_kualitas() {		
		$kualitas_id = $this->input->post('kualitas_id', 'true');

		$data = array(				
				'kualitas_nilai' => trim($this->input->post('lstKualitas', 'true')),
				'kualitas_makul' => trim($this->input->post('makul', 'true')),
				'kualitas_hardsoft' => trim($this->input->post('kemampuan', 'true')),
				'kualitas_ahli_ilmu' => trim($this->input->post('ilmu', 'true')),
				'kualitas_ahli_progdi' => trim($this->input->post('program', 'true')),
				'kualitas_ahli_profesional' => trim($this->input->post('profesional', 'true')),    			
				'kualitas_date_update' => date('Y-m-d'),
				'kualitas_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->where('kualitas_id', $kualitas_id);
		$this->db->update('umk_kualitas', $data);
	}
}
/* Location: ./application/model/kualitas_model.php */
?>