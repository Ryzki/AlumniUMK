<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wisuda_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('w.*,a.*,f.fakultas_name,p.progdi_name');
		$this->db->from('umk_wisuda w');
		$this->db->join('umk_alumni a', 'w.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');		
		$this->db->where('a.alumni_trash', 0);
		$this->db->where('a.alumni_status', 2);
		$this->db->where('w.wisuda_status <>', 'Baru');		
		$this->db->order_by('w.wisuda_id','desc');
		
		return $this->db->get();
	}


	function select_wisuda_baru($progdi_id) {
		$this->db->select('w.*,a.*,f.fakultas_name,p.progdi_name');
		$this->db->from('umk_wisuda w');
		$this->db->join('umk_alumni a', 'w.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');		
		$this->db->where('a.alumni_trash', 0);
		$this->db->where('a.alumni_status', 2);
		$this->db->where('w.wisuda_status', 'Baru');
		$this->db->where('a.progdi_id', $progdi_id);
		$this->db->order_by('w.wisuda_tgl_daftar','desc');
		
		return $this->db->get();
	}	

	function select_wisuda_progdi($progdi_id) {
		$this->db->select('w.*,a.*,f.fakultas_name,p.progdi_name');
		$this->db->from('umk_wisuda w');
		$this->db->join('umk_alumni a', 'w.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->join('umk_setting s', 'w.wisuda_periode = s.setting_periode');
		$this->db->where('a.alumni_trash', 0);
		$this->db->where('a.alumni_status', 2);
		$this->db->where('w.wisuda_status <>', 'Baru');
		$this->db->where('a.progdi_id', $progdi_id);
		$this->db->order_by('w.wisuda_tgl_daftar','desc');
		
		return $this->db->get();
	}

	function select_by_id($wisuda_id) {
		$this->db->select('*');
		$this->db->from('umk_wisuda w');
		$this->db->join('umk_alumni a', 'w.alumni_nim = a.alumni_nim');
		$this->db->where('w.wisuda_id', $wisuda_id);
		
		return $this->db->get();
	}

	function select_fakultas() {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');
		$this->db->where('fakultas_status', 0);
		$this->db->where('fakultas_trash', 0);
		$this->db->order_by('fakultas_id','asc');
		
		return $this->db->get();
	}

	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi');
		$this->db->where('progdi_trash', 0);		
		$this->db->order_by('progdi_id','asc');
		
		return $this->db->get();
	}

	function select_progdi2($progdi_id) {
		$this->db->select('*');
		$this->db->from('umk_progdi');
		$this->db->where('progdi_trash', 0);		
		$this->db->where('progdi_id', $progdi_id);		
		
		return $this->db->get();
	}	

	function update_data_baru() {
		$wisuda_id     = $this->input->post('wisuda_id');
		$data = array(
    			'wisuda_status' => $this->input->post('chkProses'),
    			'wisuda_tgl_update' => date('Y-m-d'),				
    			'wisuda_jam_update' => date('Y-m-d H:i:s'),
	   			'user_id' => $this->session->userdata('a_user_id')
				);

		$this->db->where('wisuda_id', $wisuda_id);
		$this->db->update('umk_wisuda', $data);

		$alumni_nim     = trim($this->input->post('alumni_nim'));
		$data = array(
    			'alumni_active' => 1
				);

		$this->db->where('alumni_nim', $alumni_nim);
		$this->db->update('umk_alumni', $data);
	}

	function delete_data_baru($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		$alumni_nim = $this->security->xss_clean($this->uri->segment(6));
		
		$data = array('alumni_trash' => 1);					
		$this->db->where('alumni_nim', $alumni_nim);
		$this->db->update('umk_alumni', $data);

		$data = array('user_trash' => 1);					
		$this->db->where('alumni_nim', $alumni_nim);
		$this->db->update('umk_users', $data);

		$this->db->where('wisuda_id', $kode);
		$this->db->delete('umk_wisuda');

	}

	function update_data() {
		$wisuda_id     = $this->input->post('wisuda_id');
		$data = array(
    			'wisuda_ftcp_ijazah' => $this->input->post('chkIjazah'),
    			'wisuda_ftcp_judul' => $this->input->post('chkJudul'),
    			'wisuda_ftcp_kw' => $this->input->post('chkKW'),
    			'wisuda_foto' => $this->input->post('chkFoto'),
    			'wisuda_status' => $this->input->post('lstStatus'),
    			'wisuda_tgl_update' => date('Y-m-d'),				
    			'wisuda_jam_update' => date('Y-m-d H:i:s'),
	   			'user_id' => $this->session->userdata('a_user_id')
				);

		$this->db->where('wisuda_id', $wisuda_id);
		$this->db->update('umk_wisuda', $data);
	}
}
/* Location: ./application/model/user/wisuda_model.php */
?>