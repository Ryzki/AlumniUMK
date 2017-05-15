<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penting_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_penting');	
		$this->db->order_by('penting_id','desc');
		
		return $this->db->get();
	}	

	function insert_data() {		
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(				
				'penting_title' => trim($this->input->post('title')),
				'penting_seo' => seo_title(trim($this->input->post('title'))),
				'penting_short' => $this->input->post('short'),
				'penting_desc' => $this->input->post('deskripsi'),
				'penting_image' => $this->upload->file_name,					
				'penting_sematkan' => $this->input->post('semat'),
				'penting_date_post' => date('Y-m-d'),
				'penting_time_post' => date('Y-m-d H:i:s')				
			);
		} else {
			$data = array(
				'penting_title' => trim($this->input->post('title')),
				'penting_seo' => seo_title(trim($this->input->post('title'))),
				'penting_short' => $this->input->post('short'),
				'penting_desc' => $this->input->post('deskripsi'),				
				'penting_sematkan' => $this->input->post('semat'),
				'penting_date_post' => date('Y-m-d'),
				'penting_time_post' => date('Y-m-d H:i:s')	
			);
		}	

		$this->db->insert('umk_penting', $data);
	}
	
	function select_by_id($penting_id) {
		$this->db->select('*');
		$this->db->from('umk_penting');
		$this->db->where('penting_id', $penting_id);
		
		return $this->db->get();
	}

	function update_data() {
		$penting_id     = $this->input->post('penting_id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(				
				'penting_title' => trim($this->input->post('title')),
				'penting_seo' => seo_title(trim($this->input->post('title'))),
				'penting_short' => $this->input->post('short'),
				'penting_desc' => $this->input->post('deskripsi'),
				'penting_image' => $this->upload->file_name,
				'penting_sematkan' => $this->input->post('semat'),					
				'penting_date_post' => date('Y-m-d'),
				'penting_time_post' => date('Y-m-d H:i:s')				
			);
		} else {
			$data = array(
				'penting_title' => trim($this->input->post('title')),
				'penting_seo' => seo_title(trim($this->input->post('title'))),
				'penting_short' => $this->input->post('short'),
				'penting_desc' => $this->input->post('deskripsi'),
				'penting_sematkan' => $this->input->post('semat'),				
				'penting_date_post' => date('Y-m-d'),
				'penting_time_post' => date('Y-m-d H:i:s')	
			);
		}
	
		$this->db->where('penting_id', $penting_id);
		$this->db->update('umk_penting', $data);
	}

	function delete_data($kode) {
		$this->db->where('penting_id', $kode);
		$this->db->delete('umk_penting');
	}
}
/* Location: ./application/model/panel/penting_model.php */
?>