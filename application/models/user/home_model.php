<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_hak_akses() {
		$user_id = $this->session->userdata('a_user_id');

		$this->db->select('*');
		$this->db->from('umk_user_akses a');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->where('a.user_id', $user_id);
		$this->db->order_by('a.progdi_id', 'asc');
		
		return $this->db->get();
	}
	
	function select_alumni($progdi_id) {
		$this->db->select('w.*');
		$this->db->from('umk_wisuda w');
		$this->db->join('umk_alumni a', 'w.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');		
		$this->db->where('a.alumni_trash', 0);
		$this->db->where('a.alumni_status', 2);
		$this->db->where('w.wisuda_status', 'Baru');
		$this->db->where('a.progdi_id', $progdi_id);		
		
		return $this->db->get();
	}	
}
/* Location: ./application/model/user/home_model.php */
?>