<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Struktur_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_by_id($struktur_id) {
		$this->db->select('*');
		$this->db->from('umk_struktur s');
		$this->db->join('umk_progdi p', 's.progdi_id=p.progdi_id');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');
		$this->db->where('s.struktur_id', $struktur_id);
		
		return $this->db->get();
	}

	function select_fakultas_id($fakultas_id) {
		$this->db->select('*');
		$this->db->from('umk_struktur s');
		$this->db->join('umk_progdi p', 's.progdi_id = p.progdi_id');
		$this->db->where('p.fakultas_id', $fakultas_id);
		$this->db->order_by('p.progdi_id', 'asc');
		
		return $this->db->get();
	}

	function select_progdi_id($progdi_id) {
		$this->db->select('*');
		$this->db->from('umk_struktur s');
		$this->db->join('umk_progdi p', 's.progdi_id = p.progdi_id');
		$this->db->where('p.progdi_id', $progdi_id);
		
		return $this->db->get();
	}

	function select_fakultas($fakultas_id) {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');		
		$this->db->where('fakultas_id', $fakultas_id);
		
		return $this->db->get();
	}

	function select_progdi($progdi_id) {
		$this->db->select('*');
		$this->db->from('umk_progdi p');		
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');
		$this->db->where('p.progdi_id', $progdi_id);
		
		return $this->db->get();
	}	
}
/* Location: ./application/model/struktur_model.php */
?>