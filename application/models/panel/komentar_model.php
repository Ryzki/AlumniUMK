<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentar_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_seputar_all() {
		$this->db->select('k.*, u.user_username');
		$this->db->from('umk_komentar_seputar k');
		$this->db->join('umk_users u', 'k.user_id = u.user_id');
		$this->db->join('umk_seputar s', 'k.seputar_id = s.seputar_id');
		$this->db->where('s.seputar_trash', 0);
		$this->db->order_by('k.komentar_id','desc');
		
		return $this->db->get();
	}

	function select_agenda_all() {
		$this->db->select('k.*, u.user_username');
		$this->db->from('umk_komentar_agenda k');
		$this->db->join('umk_users u', 'k.user_id = u.user_id');
		$this->db->join('umk_agenda a', 'k.agenda_id = a.agenda_id');
		$this->db->where('a.agenda_trash', 0);
		$this->db->order_by('k.komentar_id','desc');
		
		return $this->db->get();
	}

	function select_by_id($seputar_id) {
		$this->db->select('*');
		$this->db->from('umk_seputar');
		$this->db->where('seputar_id', $seputar_id);
		
		return $this->db->get();
	}
	
	function delete_data_seputar($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('komentar_trash' => 1);
						
		$this->db->where('komentar_id', $kode);
		$this->db->update('umk_komentar_seputar', $data);
	}

	function delete_data_agenda($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('komentar_trash' => 1);
						
		$this->db->where('komentar_id', $kode);
		$this->db->update('umk_komentar_agenda', $data);
	}
}
/* Location: ./application/model/panel/komentar_model.php */
?>