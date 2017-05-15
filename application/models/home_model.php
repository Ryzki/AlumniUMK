<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_home($content_id) {
		$this->db->select('*');
		$this->db->from('umk_content');
		$this->db->where('content_id', $content_id);
		
		return $this->db->get();
	}

	function select_slider() {
		$this->db->select('*');
		$this->db->from('umk_slider');
		$this->db->order_by('slider_id', 'asc');
		
		return $this->db->get();
	}

	function select_lowker() {		
		$this->db->select('*');
		$this->db->from('umk_lowker l');
		$this->db->join('umk_users u', 'l.user_id = u.user_id');
		$this->db->join('umk_progdi p', 'l.progdi_id = p.progdi_id');	
		$this->db->where('l.lowker_trash', 0);					      
        $this->db->order_by('l.lowker_tgl_post', 'desc');
		
		return $this->db->get();
	}		
}
/* Location: ./application/model/home_model.php */
?>