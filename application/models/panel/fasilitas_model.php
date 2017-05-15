<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_fasilitas');
		$this->db->where('fasilitas_trash', 0);
		$this->db->order_by('fasilitas_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'fasilitas_title' => trim($this->input->post('title')),
				'fasilitas_url' => trim($this->input->post('url'))   		
				);
		
		$this->db->insert('umk_fasilitas', $data);
	}
	
	function select_by_id($fasilitas_id) {
		$this->db->select('*');
		$this->db->from('umk_fasilitas');
		$this->db->where('fasilitas_id', $fasilitas_id);
		
		return $this->db->get();
	}

	function update_data() {
		$fasilitas_id     = $this->input->post('fasilitas_id');
		$data = array(
    			'fasilitas_title' => trim($this->input->post('title')),
				'fasilitas_url' => trim($this->input->post('url'))
				);

		$this->db->where('fasilitas_id', $fasilitas_id);
		$this->db->update('umk_fasilitas', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('fasilitas_trash' => 1);
						
		$this->db->where('fasilitas_id', $kode);
		$this->db->update('umk_fasilitas', $data);
	}
}
/* Location: ./application/model/panel/fasilitas_model.php */
?>