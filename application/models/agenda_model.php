<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_all($limit = 5, $offset = 0) {
		$this->db->select('*');
		$this->db->from('umk_agenda a');
		$this->db->join('umk_users u', 'a.user_id=u.user_id');
		$this->db->where('a.agenda_trash', 0);
		$this->db->limit($limit);
        $this->db->offset($offset);
		$this->db->order_by('a.agenda_tgl_post', 'desc');
		
		return $this->db->get();
	}

	function count_all() {
		return $this->db->count_all('umk_agenda');
	}

	function select_by_id($agenda_id) {
		$this->db->select('*');
		$this->db->from('umk_agenda a');
		$this->db->join('umk_users u', 'a.user_id=u.user_id');
		$this->db->where('a.agenda_id', $agenda_id);       
		
		return $this->db->get();
	}

	function select_komentar($agenda_id) {
		$this->db->select('*');
		$this->db->from('umk_komentar_agenda k');
		$this->db->join('umk_users u', 'k.user_id = u.user_id');	
		$this->db->where('k.agenda_id', $agenda_id);
		$this->db->where('k.komentar_trash', 0);       
		
		return $this->db->get();
	}

	function select_recent($agenda_id) {
		$this->db->select('*');
		$this->db->from('umk_agenda');
		$this->db->where('agenda_id <>', $agenda_id);
		$this->db->limit(10);
		$this->db->order_by('agenda_id', 'desc');       
		
		return $this->db->get();
	}

	function select_progdi2() {
		$this->db->select('*');
		$this->db->from('umk_progdi p');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');		
		$this->db->where('p.progdi_trash', 0);
		$this->db->order_by('p.progdi_id', 'asc');
		
		return $this->db->get();
	}

	function insert_data() {
		$data = array(
				'agenda_id' => $this->uri->segment(3),
				'user_id' => $this->session->userdata('user_id'),				
				'komentar_pesan' => trim($this->input->post('komentar', 'true')),
				'komentar_tgl_post' => date('Y-m-d'),				
    			'komentar_jam_post' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_komentar_agenda', $data);
	}

	function select_list() {
		$user_id = $this->session->userdata('user_id');		
		$this->db->select('*');
		$this->db->from('umk_agenda as a');
		$this->db->join('umk_progdi as p', 'a.progdi_id=p.progdi_id', 'left');		
		$this->db->join('umk_users as u', 'a.user_id = u.user_id');
		$this->db->where('a.agenda_trash', 0);
		$this->db->where('a.user_id', $user_id);
		$this->db->order_by('a.agenda_id','desc');
		
		return $this->db->get();
	}

	function insert_data_agenda() {
			$data = array(
					'progdi_id' => $this->session->userdata('progdi_id'),
					'agenda_title' => trim($this->input->post('title', 'true')),
					'agenda_seo' => seo_title($this->input->post('title')),
					'agenda_short' => trim($this->input->post('short', 'true')),
					'agenda_desc' => trim($this->input->post('deskripsi', 'true')),
					'agenda_tgl_post' => date('Y-m-d'),				
	    			'agenda_jam_post' => date('Y-m-d H:i:s'),
	    			'user_id' => $this->session->userdata('user_id')	    			
					);		

		$this->db->insert('umk_agenda', $data);
	}

	function update_data_agenda() {
		$agenda_id     = $this->input->post('agenda_id', 'true');
				
		$data = array(
				'progdi_id' => $this->session->userdata('progdi_id'),
				'agenda_title' => trim($this->input->post('title', 'true')),
				'agenda_seo' => seo_title($this->input->post('title')),
				'agenda_short' => trim($this->input->post('short', 'true')),
				'agenda_desc' => trim($this->input->post('deskripsi', 'true')),
				'agenda_tgl_update' => date('Y-m-d'),				
	    		'agenda_jam_update' => date('Y-m-d H:i:s')
			);		

		$this->db->where('agenda_id', $agenda_id);
		$this->db->update('umk_agenda', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));

		$data = array('agenda_trash' => 1);
						
		$this->db->where('agenda_id', $kode);
		$this->db->update('umk_agenda', $data);
	}
}
/* Location: ./application/model/agenda_model.php */
?>