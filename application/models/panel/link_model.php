<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_link');
		$this->db->where('link_trash', 0);
		$this->db->order_by('link_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'link_title' => trim($this->input->post('title')),
				'link_url' => trim($this->input->post('url'))
				);
		
		$this->db->insert('umk_link', $data);
	}
	
	function select_by_id($link_id) {
		$this->db->select('*');
		$this->db->from('umk_link');
		$this->db->where('link_id', $link_id);
		
		return $this->db->get();
	}

	function update_data() {
		$link_id     = $this->input->post('link_id');
		$data = array(
    			'link_title' => trim($this->input->post('title')),
				'link_url' => trim($this->input->post('url'))    			
				);

		$this->db->where('link_id', $link_id);
		$this->db->update('umk_link', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('link_trash' => 1);
						
		$this->db->where('link_id', $kode);
		$this->db->update('umk_link', $data);
	}
}
/* Location: ./application/model/panel/link_model.php */
?>