<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_m_fakultas() {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');
		$this->db->where('fakultas_status', 0);
		$this->db->where('fakultas_trash', 0);
		$this->db->order_by('fakultas_id', 'asc');
		
		return $this->db->get();
	}

	function select_m_fakultas_2() {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');
		$this->db->where('fakultas_trash', 0);
		$this->db->where('fakultas_status', 0);
		$this->db->order_by('fakultas_id', 'asc');
		
		return $this->db->get();
	}

	function select_progdi($fakultas_id) {
		$this->db->select('*');
		$this->db->from('umk_progdi');
		$this->db->where('fakultas_id', $fakultas_id);
		$this->db->where('progdi_trash', 0);
		$this->db->order_by('progdi_id', 'asc');
		
		return $this->db->get();
	}

	function select_progdi2() {
		$this->db->select('*');
		$this->db->from('umk_progdi');		
		$this->db->where('progdi_trash', 0);
		$this->db->order_by('progdi_id', 'asc');
		
		return $this->db->get();
	}

	function select_seputar() {
		$this->db->select('*');
		$this->db->from('umk_seputar');				
		$this->db->where('seputar_trash', 0);
		$this->db->limit(5);
		$this->db->order_by('seputar_tgl_post', 'desc');
		
		return $this->db->get();
	}

	function select_agenda() {
		$this->db->select('*');
		$this->db->from('umk_agenda');		
		$this->db->where('agenda_trash', 0);
		$this->db->limit(5);
		$this->db->order_by('agenda_tgl_post', 'desc');
		
		return $this->db->get();
	}

	function select_lowongan() {
		$this->db->select('*');
		$this->db->from('umk_lowker');		
		$this->db->where('lowker_trash', 0);
		$this->db->limit(5);
		$this->db->order_by('lowker_tgl_post', 'desc');
		
		return $this->db->get();
	}

	function select_info() {
		$this->db->select('*');
		$this->db->from('umk_penting');
		$this->db->limit(5);		
		$this->db->order_by('penting_date_post', 'desc');
		
		return $this->db->get();
	}

	function select_info_penting() {
		$this->db->select('*');
		$this->db->from('umk_penting');
		$this->db->where('penting_sematkan', 1);
		$this->db->limit(1);		
		
		return $this->db->get();
	}

	function select_link() {
		$this->db->select('*');
		$this->db->from('umk_link');
		$this->db->where('link_trash', 0);
		$this->db->order_by('link_id', 'asc');
		
		return $this->db->get();
	}

	function select_social() {
		$this->db->select('*');
		$this->db->from('umk_social');
		$this->db->where('social_trash', 0);
		$this->db->order_by('social_id', 'asc');
		
		return $this->db->get();
	}

	function select_fakultas() {
		$this->db->select('*');
		$this->db->from('umk_fakultas');
		$this->db->where('fakultas_trash', 0);
		$this->db->order_by('fakultas_id', 'asc');
		
		return $this->db->get();
	}

	function select_fasilitas() {
		$this->db->select('*');
		$this->db->from('umk_fasilitas');
		$this->db->where('fasilitas_trash', 0);
		$this->db->order_by('fasilitas_id', 'asc');
		
		return $this->db->get();
	}

	function select_kontak() {
		$this->db->select('*');
		$this->db->from('umk_contact');
		$this->db->where('contact_id', 1);		
		
		return $this->db->get();
	}	
}
/* Location: ./application/model/menu_model.php */
?>