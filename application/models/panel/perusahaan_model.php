<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perusahaan_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('p.perusahaan_id, p.alumni_nim, p.perusahaan_name, p.perusahaan_posisi, a.alumni_nama, 
			f.fakultas_name, r.progdi_name');
		$this->db->from('umk_perusahaan p');
		$this->db->join('umk_alumni a', 'p.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi r', 'a.progdi_id = r.progdi_id');
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.kegiatan_id', 1);
		$this->db->where('a.kegiatan_id', 1);
		$this->db->where('p.perusahaan_status', 'Sekarang');
		$this->db->order_by('p.perusahaan_id','asc');
		
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

	function select_jenis() {
		$this->db->select('*');
		$this->db->from('umk_jenis_perusahaan');			
		$this->db->order_by('jenis_id','asc');
		
		return $this->db->get();
	}

	function select_gaji() {
		$this->db->select('*');
		$this->db->from('umk_gaji');			
		$this->db->order_by('gaji_id','asc');
		
		return $this->db->get();
	}

	function select_info() {
		$this->db->select('*');
		$this->db->from('umk_sumber_info');			
		$this->db->order_by('info_id','asc');
		
		return $this->db->get();
	}

	function select_skala() {
		$this->db->select('*');
		$this->db->from('umk_skala');			
		$this->db->order_by('skala_id','asc');
		
		return $this->db->get();
	}

	function select_by_id($perusahaan_id) {
		$this->db->select('*');
		$this->db->from('umk_perusahaan p');
		$this->db->join('umk_alumni a', 'p.alumni_nim = a.alumni_nim');
		$this->db->where('p.perusahaan_id', $perusahaan_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/panel/perusahaan_model.php */
?>