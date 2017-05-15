<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layanan_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_layanan($nim) {
		$this->db->select('*');
		$this->db->from('umk_layanan');	
		$this->db->where('alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Add Data Transisi
	function insert_data_layanan() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'layanan_kembang' => trim($this->input->post('kembang', 'true')),
				'layanan_masukan' => trim($this->input->post('masukan', 'true')),				   		
				'layanan_date_update' => date('Y-m-d'),
				'layanan_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_layanan', $data);
	}

	// Update Data Transisi
	function update_data_layanan() {		
		$layanan_id = $this->input->post('layanan_id', 'true');

		$data = array(				
				'layanan_kembang' => trim($this->input->post('kembang', 'true')),
				'layanan_masukan' => trim($this->input->post('masukan', 'true')),				   		
				'layanan_date_update' => date('Y-m-d'),
				'layanan_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->where('layanan_id', $layanan_id);
		$this->db->update('umk_layanan', $data);
	}
}
/* Location: ./application/model/layanan_model.php */
?>