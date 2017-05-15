<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seputar_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_all($limit = 6, $offset = 0) {
		$this->db->select('*');
		$this->db->from('umk_seputar s');
		$this->db->join('umk_users u', 's.user_id=u.user_id');
		$this->db->where('s.seputar_trash', 0);
		$this->db->limit($limit);
        $this->db->offset($offset);
		$this->db->order_by('s.seputar_tgl_post', 'desc');
		
		return $this->db->get();
	}

	function count_all() {
		return $this->db->count_all('umk_seputar');
	}

	function select_by_id($seputar_id) {
		$this->db->select('*');
		$this->db->from('umk_seputar s');
		$this->db->join('umk_users u', 's.user_id=u.user_id');
		$this->db->where('s.seputar_id', $seputar_id);       
		
		return $this->db->get();
	}

	function select_komentar($seputar_id) {
		$this->db->select('*');
		$this->db->from('umk_komentar_seputar k');
		$this->db->join('umk_users u', 'k.user_id = u.user_id');			
		$this->db->where('k.seputar_id', $seputar_id);
		$this->db->where('k.komentar_trash', 0);       
		
		return $this->db->get();
	}

	function select_recent($seputar_id) {
		$this->db->select('*');
		$this->db->from('umk_seputar');
		$this->db->where('seputar_id <>', $seputar_id);
		$this->db->limit(10);
		$this->db->order_by('seputar_id', 'desc');       
		
		return $this->db->get();
	}

	function insert_data() {
		$data = array(
				'seputar_id' => $this->uri->segment(3),
				'user_id' => $this->session->userdata('user_id'),							
				'komentar_pesan' => $this->input->post('komentar', 'true'),
				'komentar_tgl_post' => date('Y-m-d'),				
    			'komentar_jam_post' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_komentar_seputar', $data);
	}		
}
/* Location: ./application/model/seputar_model.php */
?>