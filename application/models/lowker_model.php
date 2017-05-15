<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lowker_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all($limit = 6, $offset = 0) {		
		$this->db->select('*');
		$this->db->from('umk_lowker l');
		$this->db->join('umk_users u', 'l.user_id = u.user_id');
		$this->db->join('umk_progdi p', 'l.progdi_id = p.progdi_id', 'left');		
		$this->db->where('l.lowker_trash', 0);
		$this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('l.lowker_tgl_post', 'desc');
		
		return $this->db->get();
	}
	
	function select_all_id_fakultas($limit = 6, $offset = 0) {
		$fakultas_id = $this->uri->segment(3);

		$this->db->select('*');
		$this->db->from('umk_lowker l');
		$this->db->join('umk_users u', 'l.user_id = u.user_id');
		$this->db->join('umk_progdi p', 'l.progdi_id = p.progdi_id');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');
		$this->db->where('f.fakultas_id', $fakultas_id);
		$this->db->where('l.lowker_trash', 0);			
		$this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('l.lowker_tgl_post', 'desc');
		
		return $this->db->get();
	}

	function select_all_id_progdi($limit = 6, $offset = 0) {
		$progdi_id = $this->uri->segment(3);

		$this->db->select('*');
		$this->db->from('umk_lowker l');
		$this->db->join('umk_users u', 'l.user_id = u.user_id');
		$this->db->join('umk_progdi p', 'l.progdi_id = p.progdi_id');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');
		$this->db->where('p.progdi_id', $progdi_id);
		$this->db->where('l.lowker_trash', 0);			
		$this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('l.lowker_tgl_post', 'desc');
		
		return $this->db->get();
	}


	function count_all() {
		return $this->db->count_all('umk_lowker');
	}

	function count_by_fakultas() {
		$fakultas_id = $this->uri->segment(3);

		$this->db->from('umk_lowker l');
		$this->db->join('umk_progdi p', 'l.progdi_id = p.progdi_id');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');
		$this->db->where('f.fakultas_id', $fakultas_id);

		return $this->db->count_all_results();
	}

	function count_by_progdi() {
		$progdi_id = $this->uri->segment(3);

		$this->db->from('umk_lowker');
		$this->db->where('progdi_id', $progdi_id);

		return $this->db->count_all_results();
	}	

	function select_by_id($lowker_id) {
		$this->db->select('*');
		$this->db->from('umk_lowker l');
		$this->db->join('umk_users u', 'l.user_id = u.user_id');
		$this->db->join('umk_progdi p', 'l.progdi_id = p.progdi_id', 'left');		
		$this->db->where('l.lowker_id', $lowker_id);       
		
		return $this->db->get();
	}

	function select_recent($lowker_id) {
		$this->db->select('*');
		$this->db->from('umk_lowker l');
		$this->db->where('lowker_id <>', $lowker_id);
		$this->db->limit(10);
		$this->db->order_by('lowker_id', 'desc');       
		
		return $this->db->get();
	}

	function select_fakultas($fakultas_id) {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');		
		$this->db->where('fakultas_id', $fakultas_id);       
		
		return $this->db->get();
	}

	function select_progdi($progdi_id) {
		$this->db->select('*');
		$this->db->from('umk_progdi p');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');
		$this->db->where('p.progdi_id', $progdi_id);				    
		
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

	function select_list() {
		$user_id = $this->session->userdata('user_id');		
		$this->db->select('*');
		$this->db->from('umk_lowker as l');
		$this->db->join('umk_progdi as p', 'l.progdi_id=p.progdi_id', 'left');
		$this->db->join('umk_users as u', 'l.user_id = u.user_id');
		$this->db->where('l.lowker_trash', 0);
		$this->db->where('l.user_id', $user_id);
		$this->db->order_by('l.lowker_id','desc');
		
		return $this->db->get();
	}

	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'progdi_id' => $this->session->userdata('progdi_id'),
				'lowker_title' => trim($this->input->post('title', 'true')),
				'lowker_seo' => seo_title($this->input->post('title')),
				'lowker_short' => trim($this->input->post('short', 'true')),
				'lowker_desc' => trim($this->input->post('deskripsi', 'true')),
				'lowker_image' => $this->upload->file_name,					
				'lowker_tgl_post' => date('Y-m-d'),
				'lowker_jam_post' => date('Y-m-d H:i:s'),
				'lowker_tgl_deadline' => $this->input->post('tgl_deadline')
			);
		} else {
			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'progdi_id' => $this->session->userdata('progdi_id'),
				'lowker_title' => trim($this->input->post('title', 'true')),
				'lowker_seo' => seo_title($this->input->post('title')),
				'lowker_short' => trim($this->input->post('short', 'true')),
				'lowker_desc' => trim($this->input->post('deskripsi', 'true')),
				'lowker_tgl_post' => date('Y-m-d'),
				'lowker_jam_post' => date('Y-m-d H:i:s'),
				'lowker_tgl_deadline' => $this->input->post('tgl_deadline')
			);
		}		
		
		$this->db->insert('umk_lowker', $data);
	}

	function update_data() {
		$lowker_id     = $this->input->post('lowker_id', 'true');
		
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(				
				'progdi_id' => $this->session->userdata('progdi_id'),
				'lowker_title' => trim($this->input->post('title', 'true')),
				'lowker_seo' => seo_title($this->input->post('title')),
				'lowker_short' => trim($this->input->post('short', 'true')),
				'lowker_desc' => trim($this->input->post('deskripsi', 'true')),
				'lowker_image' => $this->upload->file_name,						
				'lowker_tgl_update' => date('Y-m-d'),
				'lowker_jam_update' => date('Y-m-d H:i:s'),
				'lowker_tgl_deadline' => $this->input->post('tgl_deadline')
			);
		} else {
			$data = array(				
				'progdi_id' => $this->session->userdata('progdi_id'),
				'lowker_title' => trim($this->input->post('title', 'true')),
				'lowker_seo' => seo_title($this->input->post('title')),
				'lowker_short' => trim($this->input->post('short', 'true')),
				'lowker_desc' => trim($this->input->post('deskripsi', 'true')),
				'lowker_tgl_update' => date('Y-m-d'),
				'lowker_jam_update' => date('Y-m-d H:i:s'),
				'lowker_tgl_deadline' => $this->input->post('tgl_deadline')
			);
		}

		$this->db->where('lowker_id', $lowker_id);
		$this->db->update('umk_lowker', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));

		$data = array('lowker_trash' => 1);
						
		$this->db->where('lowker_id', $kode);
		$this->db->update('umk_lowker', $data);
	}
}
/* Location: ./application/model/lowker_model.php */
?>