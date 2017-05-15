<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi p');
		$this->db->join('umk_m_fakultas m', 'p.fakultas_id = m.fakultas_id');
		$this->db->order_by('p.progdi_id','asc');
		
		return $this->db->get();
	}

	function select_all() {		
		$Tahun1 = $this->input->post('tahun1');
		$Tahun2 = $this->input->post('tahun2');

		$this->db->select('*');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');	
		$this->db->join('umk_kegiatan k', 'a.kegiatan_id = k.kegiatan_id', 'left');
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.alumni_trash', 0);
		$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
		$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);	
		$this->db->order_by('a.alumni_nama', 'asc');
		
		return $this->db->get();
	}

	function select_by_nim($nim) {
		$this->db->select('*');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');	
		$this->db->join('umk_kegiatan k', 'a.kegiatan_id = k.kegiatan_id', 'left');
		$this->db->where('a.alumni_nim', $nim);		
		
		return $this->db->get();
	}

	function select_by_tahun() {
		$Progdi = $this->input->post('lstProgdi');
		$Tahun1 = $this->input->post('tahun1');
		$Tahun2 = $this->input->post('tahun2');

		$this->db->select('*');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');	
		$this->db->join('umk_kegiatan k', 'a.kegiatan_id = k.kegiatan_id', 'left');
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.alumni_trash', 0);
		$this->db->where('a.progdi_id', $Progdi);
		$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
		$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);	
		$this->db->order_by('a.alumni_nama', 'asc');
		
		return $this->db->get();
	}			
}
/* Location: ./application/model/database_model.php */
?>