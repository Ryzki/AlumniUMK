<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Progdi_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_progdi p');
		$this->db->join('umk_m_fakultas m', 'p.fakultas_id = m.fakultas_id');
		$this->db->where('p.progdi_trash', 0);
		$this->db->order_by('m.fakultas_name','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
    			'fakultas_id' => $this->input->post('lstFakultas'),
    			'progdi_code' => trim($this->input->post('code')),
    			'progdi_name' => trim($this->input->post('name')),    			
    			'progdi_seo' => seo_title(trim($this->input->post('name'))),
				'progdi_tgl_update' => date('Y-m-d'),				
    			'progdi_jam_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_progdi', $data);
	}

	function select_fakultas() {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');
		$this->db->order_by('fakultas_id', 'asc');
		
		return $this->db->get();
	}
	
	function select_by_id($progdi_id) {
		$this->db->select('*');
		$this->db->from('umk_progdi');
		$this->db->where('progdi_id', $progdi_id);
		
		return $this->db->get();
	}

	function update_data() {
		$progdi_id     = $this->input->post('progdi_id');
		$data = array(
    			'fakultas_id' => $this->input->post('lstFakultas'),
    			'progdi_code' => trim($this->input->post('code')),
    			'progdi_name' => trim($this->input->post('name')),
    			'progdi_seo' => seo_title(trim($this->input->post('name'))),
				'progdi_tgl_update' => date('Y-m-d'),				
    			'progdi_jam_update' => date('Y-m-d H:i:s')
				);
						
		$this->db->where('progdi_id', $progdi_id);
		$this->db->update('umk_progdi', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		$data = array('progdi_trash' => 1);
						
		$this->db->where('progdi_id', $kode);
		$this->db->update('umk_progdi', $data);
	}

}
/* Location: ./application/model/panel/progdi_model.php */
?>