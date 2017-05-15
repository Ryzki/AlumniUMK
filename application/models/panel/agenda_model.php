<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_agenda');
		$this->db->where('agenda_trash', 0);
		$this->db->order_by('agenda_id','desc');
		
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
		$data = array(				
				'agenda_title' => trim($this->input->post('title')),
				'agenda_seo' => seo_title(trim($this->input->post('title'))),
				'agenda_short' => $this->input->post('short'),
				'agenda_desc' => $this->input->post('deskripsi'),
				'agenda_tgl_post' => date('Y-m-d'),				
	    		'agenda_jam_post' => date('Y-m-d H:i:s'),
	    		'user_id' => $this->session->userdata('a_user_id')	    		
				);		

		$this->db->insert('umk_agenda', $data);
	}
	
	function select_by_id($agenda_id) {
		$this->db->select('*');
		$this->db->from('umk_agenda');
		$this->db->where('agenda_id', $agenda_id);
		
		return $this->db->get();
	}

	function update_data() {
		$agenda_id     = $this->input->post('agenda_id');

		$data = array(			
				'agenda_title' => trim($this->input->post('title')),
				'agenda_seo' => seo_title(trim($this->input->post('title'))),
				'agenda_short' => $this->input->post('short'),
				'agenda_desc' => $this->input->post('deskripsi'),
				'agenda_tgl_update' => date('Y-m-d'),				
    			'agenda_jam_update' => date('Y-m-d H:i:s'),
	   			'user_id' => $this->session->userdata('a_user_id')	   			
				);
	
		$this->db->where('agenda_id', $agenda_id);
		$this->db->update('umk_agenda', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));		
						
		$this->db->where('agenda_id', $kode);
		$this->db->delete('umk_agenda');
	}
}
/* Location: ./application/model/panel/agenda_model.php */
?>