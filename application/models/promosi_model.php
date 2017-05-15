<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promosi_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	// Ambil Data Usaha Akun Login
	function select_usaha($nim) {
		$this->db->select('*');
		$this->db->from('umk_usaha u');
		$this->db->join('umk_alumni a', 'u.alumni_nim = a.alumni_nim');		
		$this->db->where('u.alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Insert Data Usaha
	function insert_data_usaha() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'alumni_nim' => trim($this->session->userdata('nim')),				 			   					
					'usaha_name' => ucwords(trim($this->input->post('nama', 'true'))),
					'usaha_seo' => seo_title(trim($this->input->post('nama', 'true'))),
					'usaha_alamat' => trim($this->input->post('alamat', 'true')),
	    			'usaha_web' => trim($this->input->post('web', 'true')),
	    			'usaha_desc' => trim($this->input->post('desc', 'true')),
	    			'usaha_bidang' => trim($this->input->post('bidang', 'true')),
	    			'usaha_jml_karyawan' => $this->input->post('jumlah', 'true'),
	    			'usaha_omzet' => $this->input->post('omzet', 'true'),
	    			'usaha_pengeluaran' => $this->input->post('pengeluaran', 'true'),
	    			'usaha_logo' => $this->upload->file_name,
	    			'usaha_iklan' => 1
			);
		} else {			
			$data = array(
					'alumni_nim' => trim($this->session->userdata('nim')),				 			   					
					'usaha_name' => ucwords(trim($this->input->post('nama', 'true'))),
					'usaha_seo' => seo_title(trim($this->input->post('nama', 'true'))),
					'usaha_alamat' => trim($this->input->post('alamat', 'true')),
	    			'usaha_web' => trim($this->input->post('web', 'true')),
	    			'usaha_desc' => trim($this->input->post('desc', 'true')),
	    			'usaha_bidang' => trim($this->input->post('bidang', 'true')),
	    			'usaha_jml_karyawan' => $this->input->post('jumlah', 'true'),
	    			'usaha_omzet' => $this->input->post('omzet', 'true'),
	    			'usaha_pengeluaran' => $this->input->post('pengeluaran', 'true'),
	    			'usaha_iklan' => 1
			);
		}
				
		$this->db->insert('umk_usaha', $data);
	}

	function insert_invoice() {
		$usaha_id = $this->db->insert_id();
		$StartingDate = date('Y-m-d');
		$newEndingDate = date('Y-m-d', strtotime(date('Y-m-d', strtotime($StartingDate)).'+ 365 days'));

		$data = array(
				'usaha_id' => $usaha_id,		
    			'invoice_tanggal' => date('Y-m-d'),
    			'invoice_expired' => $newEndingDate,
    			'invoice_total' => 50000
				);
		
		$this->db->insert('umk_invoice', $data);
	}

	// Update Data Usaha
	function update_data_usaha() {		
		$usaha_id = $this->input->post('usaha_id', 'true');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(							 			   				
					'usaha_name' => ucwords(trim($this->input->post('nama', 'true'))),
					'usaha_seo' => seo_title(trim($this->input->post('nama', 'true'))),
					'usaha_alamat' => trim($this->input->post('alamat', 'true')),
	    			'usaha_web' => trim($this->input->post('web', 'true')),
	    			'usaha_desc' => trim($this->input->post('desc', 'true')),
	    			'usaha_bidang' => trim($this->input->post('bidang', 'true')),
	    			'usaha_jml_karyawan' => $this->input->post('jumlah', 'true'),
	    			'usaha_omzet' => $this->input->post('omzet', 'true'),
	    			'usaha_pengeluaran' => $this->input->post('pengeluaran', 'true'),
	    			'usaha_logo' => $this->upload->file_name	    			  		
			);
		} else {			
			$data = array(								 			   				
					'usaha_name' => ucwords(trim($this->input->post('nama', 'true'))),
					'usaha_seo' => seo_title(trim($this->input->post('nama', 'true'))),
					'usaha_alamat' => trim($this->input->post('alamat', 'true')),
	    			'usaha_web' => trim($this->input->post('web', 'true')),
	    			'usaha_desc' => trim($this->input->post('desc', 'true')),
	    			'usaha_bidang' => trim($this->input->post('bidang', 'true')),
	    			'usaha_jml_karyawan' => $this->input->post('jumlah', 'true'),
	    			'usaha_omzet' => $this->input->post('omzet', 'true'),
	    			'usaha_pengeluaran' => $this->input->post('pengeluaran', 'true')	    					
			);
		}
		
		$this->db->where('usaha_id', $usaha_id);
		$this->db->update('umk_usaha', $data);
	}

	function select_invoice($usaha_id) {
		$this->db->select('*');
		$this->db->from('umk_invoice');
		$this->db->where('usaha_id', $usaha_id);
		$this->db->order_by('invoice_tanggal', 'desc');
		
		return $this->db->get();
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));						
		$this->db->where('usaha_id', $kode);
		$this->db->delete('umk_usaha');
	}
	
	function delete_invoice($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));						
		$this->db->where('usaha_id', $kode);
		$this->db->delete('umk_invoice');
	}

}
/* Location: ./application/model/promosi_model.php */
?>