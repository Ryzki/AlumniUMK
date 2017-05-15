<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Struktur_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$user_id = $this->session->userdata('a_user_id');	

		$this->db->select('*');
		$this->db->from('umk_struktur as s');
		$this->db->join('umk_progdi as p', 's.progdi_id=p.progdi_id');
		$this->db->where('s.struktur_trash', 0);
		$this->db->where('s.user_id', $user_id);
		$this->db->order_by('s.struktur_id','desc');
		
		return $this->db->get();
	}

	function select_progdi() {
		$user_id = $this->session->userdata('a_user_id');

		$this->db->select('*');
		$this->db->from('umk_user_akses a');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');
		$this->db->where('a.user_id', $user_id);
		$this->db->order_by('a.progdi_id','asc');
		
		return $this->db->get();
	}

	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'user_id' => $this->session->userdata('a_user_id'),
					'progdi_id' => $this->input->post('lstProgdi'),				
					'struktur_title' => trim($this->input->post('title')),
					'struktur_seo' => seo_title(trim($this->input->post('title'))),
					'struktur_desc' => $this->input->post('deskripsi'),
					'struktur_image' => $this->upload->file_name,
					'struktur_tgl_update' => date('Y-m-d'),
					'struktur_jam_update' => date('Y-m-d H:i:s')
				);
		} else {
			$data = array(
					'user_id' => $this->session->userdata('a_user_id'),
					'progdi_id' => $this->input->post('lstProgdi'),				
					'struktur_title' => trim($this->input->post('title')),
					'struktur_seo' => seo_title(trim($this->input->post('title'))),
					'struktur_desc' => $this->input->post('deskripsi'),					
					'struktur_tgl_update' => date('Y-m-d'),
					'struktur_jam_update' => date('Y-m-d H:i:s')
				);
		}
		
		$this->db->insert('umk_struktur', $data);
	}
	
	function select_by_id($struktur_id) {
		$this->db->select('*');
		$this->db->from('umk_struktur');
		$this->db->where('struktur_id', $struktur_id);
		
		return $this->db->get();
	}

	function update_data() {
		$struktur_id     = $this->input->post('struktur_id');
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'user_id' => $this->session->userdata('a_user_id'),
					'progdi_id' => $this->input->post('lstProgdi'),				
					'struktur_title' => trim($this->input->post('title')),
					'struktur_seo' => seo_title(trim($this->input->post('title'))),
					'struktur_desc' => $this->input->post('deskripsi'),
					'struktur_image' => $this->upload->file_name,
					'struktur_tgl_update' => date('Y-m-d'),
					'struktur_jam_update' => date('Y-m-d H:i:s')
				);
		} else {
			$data = array(
					'user_id' => $this->session->userdata('a_user_id'),
					'progdi_id' => $this->input->post('lstProgdi'),				
					'struktur_title' => trim($this->input->post('title')),
					'struktur_seo' => seo_title(trim($this->input->post('title'))),
					'struktur_desc' => $this->input->post('deskripsi'),					
					'struktur_tgl_update' => date('Y-m-d'),
					'struktur_jam_update' => date('Y-m-d H:i:s')
				);
		}

		$this->db->where('struktur_id', $struktur_id);
		$this->db->update('umk_struktur', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('struktur_trash' => 1);
						
		$this->db->where('struktur_id', $kode);
		$this->db->update('umk_struktur', $data);
	}
}
/* Location: ./application/model/user/struktur_model.php */
?>