<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seputar_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_seputar');
		$this->db->where('seputar_trash', 0);
		$this->db->order_by('seputar_id','desc');
		
		return $this->db->get();
	}
	
	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi p');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');		
		$this->db->order_by('p.progdi_id','asc');
		
		return $this->db->get();
	}

	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(					
					'seputar_title' => trim($this->input->post('title')),
					'seputar_seo' => seo_title(trim($this->input->post('title'))),
					'seputar_short' => $this->input->post('short'), 
					'seputar_desc' => $this->input->post('deskripsi'), 
					'seputar_image' => $this->upload->file_name,   			   		
					'seputar_tgl_post' => date('Y-m-d'),				
	    			'seputar_jam_post' => date('Y-m-d H:i:s'),
	    			'user_id' => $this->session->userdata('a_user_id')	    			
					);
		} else {			
			$data = array(					
					'seputar_title' => trim($this->input->post('title')),
					'seputar_seo' => seo_title(trim($this->input->post('title'))),
					'seputar_short' => $this->input->post('short'), 
					'seputar_desc' => $this->input->post('deskripsi'), 
					'seputar_tgl_post' => date('Y-m-d'),				
	    			'seputar_jam_post' => date('Y-m-d H:i:s'),
	    			'user_id' => $this->session->userdata('a_user_id')	    			
					);
		}

		$this->db->insert('umk_seputar', $data);
	}
	
	function select_by_id($seputar_id) {
		$this->db->select('*');
		$this->db->from('umk_seputar');
		$this->db->where('seputar_id', $seputar_id);
		
		return $this->db->get();
	}

	function update_data() {
		$seputar_id     = $this->input->post('seputar_id');
		
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(					
					'seputar_title' => trim($this->input->post('title')),
					'seputar_seo' => seo_title(trim($this->input->post('title'))),
					'seputar_short' => $this->input->post('short'), 
					'seputar_desc' => $this->input->post('deskripsi'),
					'seputar_image' => $this->upload->file_name,    			   		
					'seputar_tgl_update' => date('Y-m-d'),				
	    			'seputar_jam_update' => date('Y-m-d H:i:s'),
	    			'user_id' => $this->session->userdata('a_user_id')	    			
					);

		} else {	
			$data = array(					
					'seputar_title' => trim($this->input->post('title')),
					'seputar_seo' => seo_title(trim($this->input->post('title'))),
					'seputar_short' => $this->input->post('short'), 
					'seputar_desc' => $this->input->post('deskripsi'),    			   		
					'seputar_tgl_update' => date('Y-m-d'),				
	    			'seputar_jam_update' => date('Y-m-d H:i:s'),
	    			'user_id' => $this->session->userdata('a_user_id')	    			
					);
		}

		$this->db->where('seputar_id', $seputar_id);
		$this->db->update('umk_seputar', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('seputar_trash' => 1);
						
		$this->db->where('seputar_id', $kode);
		$this->db->update('umk_seputar', $data);
	}
}
/* Location: ./application/model/panel/seputar_model.php */
?>