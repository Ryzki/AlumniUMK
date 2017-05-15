<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transisi_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	// Ambil Data Transisi
	function select_transisi($nim) {
		$this->db->select('*');
		$this->db->from('umk_transisi');	
		$this->db->where('alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Ambil Data Kursus Alumni
	function select_kursus($nim) {
		$this->db->select('*');
		$this->db->from('umk_kursus');	
		$this->db->where('alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Add Data Transisi
	function insert_data_transisi() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'transisi_instansi_lamar' => trim($this->input->post('jmllamar', 'true')),
				'transisi_instansi_respon' => trim($this->input->post('jmlrespon', 'true')),
    			'transisi_jenis_instansi' => trim($this->input->post('jenisinstansi', 'true')),
    			'transisi_aspek_pekerjaan' => trim($this->input->post('aspekkerja', 'true')),
    			'transisi_sesuai' => $this->input->post('lstSesuai', 'true'),    			
    			'transisi_hardskill' => trim($this->input->post('hardskill', 'true')),
				'transisi_softskill' => trim($this->input->post('softskill', 'true')),
				'transisi_masalah' => trim($this->input->post('masalah', 'true')),
				'transisi_date_update' => date('Y-m-d'),
				'transisi_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_transisi', $data);
	}

	// Update Data Transisi
	function update_data_transisi() {		
		$transisi_id = $this->input->post('transisi_id', 'true');

		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'transisi_instansi_lamar' => trim($this->input->post('jmllamar', 'true')),
				'transisi_instansi_respon' => trim($this->input->post('jmlrespon', 'true')),
    			'transisi_jenis_instansi' => trim($this->input->post('jenisinstansi', 'true')),
    			'transisi_aspek_pekerjaan' => trim($this->input->post('aspekkerja', 'true')),
    			'transisi_sesuai' => $this->input->post('lstSesuai', 'true'),    			
    			'transisi_hardskill' => trim($this->input->post('hardskill', 'true')),
				'transisi_softskill' => trim($this->input->post('softskill', 'true')),
				'transisi_masalah' => trim($this->input->post('masalah', 'true')),
				'transisi_date_update' => date('Y-m-d'),
				'transisi_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->where('transisi_id', $transisi_id);
		$this->db->update('umk_transisi', $data);
	}

	// Add Data Kursus
	function insert_data_kursus() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'kursus_nama' => trim($this->input->post('nama', 'true')),
				'kursus_alamat' => trim($this->input->post('alamat', 'true')),
    			'kursus_dari_tahun' => trim($this->input->post('tahun1', 'true')),
    			'kursus_sampai_tahun' => trim($this->input->post('tahun2', 'true')),
    			'kursus_donatur' => trim($this->input->post('donatur', 'true')),
    			'kursus_materi' => trim($this->input->post('materi', 'true')),
				'kursus_date_update' => date('Y-m-d'),
				'kursus_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_kursus', $data);
	}

	// Update Data Kursus
	function update_data_kursus() {
		$kursus_id = $this->input->post('kursus_id', 'true');

		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'kursus_nama' => trim($this->input->post('nama', 'true')),
				'kursus_alamat' => trim($this->input->post('alamat', 'true')),
    			'kursus_dari_tahun' => trim($this->input->post('tahun1', 'true')),
    			'kursus_sampai_tahun' => trim($this->input->post('tahun2', 'true')),
    			'kursus_donatur' => trim($this->input->post('donatur', 'true')),
    			'kursus_materi' => trim($this->input->post('materi', 'true')),
				'kursus_date_update' => date('Y-m-d'),
				'kursus_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->where('kursus_id', $kursus_id);
		$this->db->update('umk_kursus', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));								
		$this->db->where('kursus_id', $kode);
		$this->db->delete('umk_kursus');
	}
}
/* Location: ./application/model/transisi_model.php */
?>