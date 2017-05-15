<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_slider');
		$this->db->order_by('slider_id', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'slider_name' => trim($this->input->post('name')),
					'slider_image' => $this->upload->file_name,
					'slider_link' => trim($this->input->post('link'))
				);			
		} else {
			$data = array(
					'slider_name' => trim($this->input->post('name')),
					'slider_link' => trim($this->input->post('link'))
				);
		}
		
		$this->db->insert('umk_slider', $data);
	}
	
	function select_by_id($slider_id) {
		$this->db->select('*');
		$this->db->from('umk_slider');
		$this->db->where('slider_id', $slider_id);
		
		return $this->db->get();
	}

	function update_data() {
		$slider_id = $this->input->post('slider_id');
	
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'slider_name' => trim($this->input->post('name')),
					'slider_image' => $this->upload->file_name,
					'slider_link' => trim($this->input->post('link'))
				);			
		} else {
			$data = array(
					'slider_name' => trim($this->input->post('name')),
					'slider_link' => trim($this->input->post('link'))
				);
		}
		
		$this->db->where('slider_id', $slider_id);
		$this->db->update('umk_slider', $data);
	}
	
	function delete_data($kode) {
		$this->db->where('slider_id', $kode);
		$this->db->delete('umk_slider');
	}
}
/* Location: ./application/model/panel/slider_model.php */
?>