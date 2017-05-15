<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all($progdi_id) {
		//$user_id = $this->session->userdata('a_user_id');
		$this->db->select('*');
		$this->db->from('umk_agenda a');
		$this->db->join('umk_progdi as p', 'a.progdi_id=p.progdi_id');
		$this->db->where('a.agenda_trash', 0);
		$this->db->where('a.progdi_id', $progdi_id);
		$this->db->order_by('a.agenda_id','desc');
		
		return $this->db->get();
	}	

	/*function select_progdi() {
		$user_id = $this->session->userdata('a_user_id');

		$this->db->select('*');
		$this->db->from('umk_user_akses a');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');
		$this->db->where('a.user_id', $user_id);
		$this->db->order_by('a.progdi_id','asc');
		
		return $this->db->get();
	}*/

	function select_progdi2($progdi_id) {
		$this->db->select('*');
		$this->db->from('umk_progdi');
		$this->db->where('progdi_trash', 0);		
		$this->db->where('progdi_id', $progdi_id);		
		
		return $this->db->get();
	}

	function insert_data() {		
		$data = array(				
				'progdi_id' => $this->uri->segment(4),
				'agenda_title' => trim($this->input->post('title')),
				'agenda_seo' => seo_title(trim($this->input->post('title'))),
				'agenda_short' => trim($this->input->post('short')),
				'agenda_desc' => trim($this->input->post('deskripsi')),
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
				'agenda_short' => trim($this->input->post('short')),
				'agenda_desc' => trim($this->input->post('deskripsi')),
				'agenda_tgl_update' => date('Y-m-d'),				
    			'agenda_jam_update' => date('Y-m-d H:i:s'),
	   			'user_id' => $this->session->userdata('a_user_id')	   			
				);
	
		$this->db->where('agenda_id', $agenda_id);
		$this->db->update('umk_agenda', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));

		$data = array('agenda_trash' => 1);
						
		$this->db->where('agenda_id', $kode);
		$this->db->update('umk_agenda', $data);
	}
}
/* Location: ./application/model/user/agenda_model.php */
?>