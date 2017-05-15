<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organisasi_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	// Ambil Data Kendala dan Masalah
	function select_detail_organisasi($nim) {
		$this->db->select('*');
		$this->db->from('umk_akademik');	
		$this->db->where('alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Ambil Data Organisasi Alumni
	function select_organisasi($nim) {
		$this->db->select('*');
		$this->db->from('umk_organisasi');	
		$this->db->where('alumni_nim', $nim);
		$this->db->order_by('organisasi_tahun', 'asc');
		
		return $this->db->get();
	}

	// Add Data Transisi
	function insert_data_pengalaman() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'akademik_kendala' => trim($this->input->post('kendala', 'true')),
				'akademik_metode' => trim($this->input->post('metode', 'true')),    			
				'akademik_date_update' => date('Y-m-d'),
				'akademik_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_akademik', $data);
	}

	// Update Data Transisi
	function update_data_pengalaman() {		
		$akademik_id = $this->input->post('akademik_id', 'true');

		$data = array(				
				'akademik_kendala' => trim($this->input->post('kendala', 'true')),
				'akademik_metode' => trim($this->input->post('metode', 'true')),    			
				'akademik_date_update' => date('Y-m-d'),
				'akademik_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->where('akademik_id', $akademik_id);
		$this->db->update('umk_akademik', $data);
	}

	// Add Data Kursus
	function insert_data_organisasi() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'organisasi_nama' => trim($this->input->post('nama', 'true')),
				'organisasi_kota' => trim($this->input->post('kota', 'true')),
    			'organisasi_tahun' => trim($this->input->post('tahun', 'true')),
    			'organisasi_jabatan' => trim($this->input->post('jabatan', 'true')),    			
				'organisasi_date_update' => date('Y-m-d'),
				'organisasi_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_organisasi', $data);
	}

	// Update Data Kursus
	function update_data_organisasi() {
		$organisasi_id = $this->input->post('organisasi_id', 'true');

		$data = array(				
				'organisasi_nama' => trim($this->input->post('nama', 'true')),
				'organisasi_kota' => trim($this->input->post('kota', 'true')),
    			'organisasi_tahun' => trim($this->input->post('tahun', 'true')),
    			'organisasi_jabatan' => trim($this->input->post('jabatan', 'true')),    			
				'organisasi_date_update' => date('Y-m-d'),
				'organisasi_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->where('organisasi_id', $organisasi_id);
		$this->db->update('umk_organisasi', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));								
		$this->db->where('organisasi_id', $kode);
		$this->db->delete('umk_organisasi');
	}
}
/* Location: ./application/model/organisasi_model.php */
?>