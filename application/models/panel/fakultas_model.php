<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fakultas_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_fakultas');
		$this->db->where('fakultas_trash', 0);
		$this->db->order_by('fakultas_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'fakultas_title' => $this->input->post('title'),    			
				'fakultas_url' => $this->input->post('url')    		
				);
		
		$this->db->insert('umk_fakultas', $data);
	}
	
	function select_by_id($fakultas_id) {
		$this->db->select('*');
		$this->db->from('umk_fakultas');
		$this->db->where('fakultas_id', $fakultas_id);
		
		return $this->db->get();
	}

	function update_data() {
		$fakultas_id     = $this->input->post('fakultas_id');
		$data = array(
    			'fakultas_title' => $this->input->post('title'),    			
				'fakultas_url' => $this->input->post('url')   			
				);

		$this->db->where('fakultas_id', $fakultas_id);
		$this->db->update('umk_fakultas', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('fakultas_trash' => 1);
						
		$this->db->where('fakultas_id', $kode);
		$this->db->update('umk_fakultas', $data);
	}
}
/* Location: ./application/model/panel/fakultas_model.php */
?>