<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sekolah_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('s.*, a.alumni_nama, f.fakultas_name, r.progdi_name');
		$this->db->from('umk_sekolah s');
		$this->db->join('umk_alumni a', 's.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi r', 'a.progdi_id = r.progdi_id');
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.kegiatan_id', 2);
		$this->db->order_by('s.sekolah_id','asc');
		
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

	function select_by_id($sekolah_id) {
		$this->db->select('*');
		$this->db->from('umk_sekolah s');
		$this->db->join('umk_alumni a', 's.alumni_nim = a.alumni_nim');
		$this->db->where('s.sekolah_id', $sekolah_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/panel/sekolah_model.php */
?>