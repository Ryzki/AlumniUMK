<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Belumkerja_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_belumkerja b', 'b.alumni_nim = a.alumni_nim');
		$this->db->join('umk_aktifitas x', 'b.aktifitas_id = x.aktifitas_id');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.kegiatan_id', 4);
		$this->db->order_by('a.alumni_tgl_daftar','desc');
		
		return $this->db->get();
	}

	function select_by_id($kerja_id) {
		$this->db->select('*');
		$this->db->from('umk_belumkerja b');
		$this->db->join('umk_alumni a', 'b.alumni_nim = a.alumni_nim');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->where('kerja_id', $kerja_id);
		
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

	function select_aktifitas() {
		$this->db->select('*');
		$this->db->from('umk_aktifitas');		
		$this->db->order_by('aktifitas_id','asc');
		
		return $this->db->get();
	}

	function delete_data($kode) {
		$this->db->where('alumni_nim', $kode);
		$this->db->delete('umk_alumni');

		$this->db->where('alumni_nim', $kode);
		$this->db->delete('umk_users');
	}
}
/* Location: ./application/model/panel/belumkerja_model.php */
?>