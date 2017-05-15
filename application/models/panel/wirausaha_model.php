<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wirausaha_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('u.usaha_id, u.alumni_nim, u.usaha_name, u.usaha_web, u.usaha_bidang, 
			u.usaha_iklan, u.usaha_transfer, a.alumni_nama, f.fakultas_name, r.progdi_name');
		$this->db->from('umk_usaha u');
		$this->db->join('umk_alumni a', 'u.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi r', 'a.progdi_id = r.progdi_id');
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.kegiatan_id', 3);
		$this->db->order_by('u.usaha_id','asc');
		
		return $this->db->get();
	}

	function select_fakultas() {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');
		$this->db->where('fakultas_status', 0);		
		$this->db->order_by('fakultas_id','asc');
		
		return $this->db->get();
	}

	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi');		
		$this->db->order_by('progdi_id','asc');
		
		return $this->db->get();
	}

	function select_skala() {
		$this->db->select('*');
		$this->db->from('umk_skala');			
		$this->db->order_by('skala_id','asc');
		
		return $this->db->get();
	}

	function select_by_id($usaha_id) {
		$this->db->select('*');
		$this->db->from('umk_usaha u');
		$this->db->join('umk_alumni a', 'u.alumni_nim = a.alumni_nim');
		$this->db->where('u.usaha_id', $usaha_id);
		
		return $this->db->get();
	}

	function select_all_invoice($usaha_id) {
		$this->db->select('*');
		$this->db->from('umk_invoice i');
		$this->db->join('umk_usaha u', 'i.usaha_id = u.usaha_id');
		$this->db->where('i.usaha_id', $usaha_id);
		$this->db->order_by('i.invoice_id', 'desc');
		
		return $this->db->get();
	}

	function select_by_invoice($invoice_id) {
		$this->db->select('*');
		$this->db->from('umk_invoice');		
		$this->db->where('invoice_id', $invoice_id);
		
		return $this->db->get();
	}

	function update_data() {
		$usaha_id     = $this->input->post('usaha_id');

		$data = array(
				'usaha_iklan_expired' => $this->input->post('tgl_expired'),
    			'usaha_transfer' => 1
				);

		$this->db->where('usaha_id', $usaha_id);
		$this->db->update('umk_usaha', $data);
	}

	function update_data_invoice() {
		$invoice_id     = $this->input->post('invoice_id');

		$data = array(
    			'invoice_status' => $this->input->post('chkPaid'),
    			'invoice_tgl_bayar' => $this->input->post('tgl_transfer')
				);

		$this->db->where('invoice_id', $invoice_id);
		$this->db->update('umk_invoice', $data);
	}

	function delete_data_invoice($kode) {
		$this->db->where('invoice_id', $kode);
		$this->db->delete('umk_invoice');
	}

	function generateAutoid(){		
		$query = $this->db->query("SELECT invoice_id FROM umk_invoice");             
		$num   = $query->num_rows()+1;
		
		return $num;		
    }

	function insert_data_invoice() {		
		$data = array(
    			'usaha_id' => $this->uri->segment('4'),
    			'invoice_tanggal' => $this->input->post('tgl_invoice'),
    			'invoice_expired' => $this->input->post('tgl_expired'),
    			'invoice_total' => $this->input->post('total')
				);
		
		$this->db->insert('umk_invoice', $data);
	}    
}
/* Location: ./application/model/panel/wirausaha_model.php */
?>