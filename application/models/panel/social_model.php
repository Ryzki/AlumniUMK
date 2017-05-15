<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_social');
		$this->db->where('social_trash', 0);
		$this->db->order_by('social_name','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'social_name' => trim($this->input->post('name')),
				'social_url' => trim($this->input->post('url')),
				'social_icon' => trim($this->input->post('icon'))
				);
		
		$this->db->insert('umk_social', $data);
	}
	
	function select_by_id($social_id) {
		$this->db->select('*');
		$this->db->from('umk_social');
		$this->db->where('social_id', $social_id);
		
		return $this->db->get();
	}

	function update_data() {
		$social_id     = $this->input->post('social_id');
		$data = array(
    			'social_name' => trim($this->input->post('name')),
				'social_url' => trim($this->input->post('url')),
				'social_icon' => trim($this->input->post('icon'))    			
				);

		$this->db->where('social_id', $social_id);
		$this->db->update('umk_social', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('social_trash' => 1);
						
		$this->db->where('social_id', $kode);
		$this->db->update('umk_social', $data);
	}
}
/* Location: ./application/model/panel/social_model.php */
?>