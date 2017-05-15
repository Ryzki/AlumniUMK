<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_alumni($Nim) {
		$this->db->select('a.alumni_nim,a.alumni_nama,a.alumni_tgl_daftar,a.alumni_tgl_lhr,
							f.fakultas_name,p.progdi_name');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');		
		$this->db->where('a.alumni_nim', $Nim);			
		$this->db->order_by('a.alumni_tgl_daftar','desc');
		
		return $this->db->get();
	}

	function select_by_id($alumni_nim) {
		$this->db->select('u.alumni_nim, u.user_username, a.alumni_tgl_lhr');
		$this->db->from('umk_users u');
		$this->db->join('umk_alumni a', 'a.alumni_nim = u.alumni_nim');
		$this->db->where('u.alumni_nim', $alumni_nim);
		
		return $this->db->get();
	}

	function update_password() {
		$alumni_nim     = trim($this->input->post('alumni_nim'));

		$data = array('user_password' => sha1(trim($this->input->post('password'))));

		$this->db->where('alumni_nim', $alumni_nim);
		$this->db->update('umk_users', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
			
		$this->db->where('alumni_nim', $kode);
		$this->db->delete('umk_alumni');

		$this->db->where('alumni_nim', $kode);
		$this->db->delete('umk_users');

		$this->db->where('wisuda_id', $kode);
		$this->db->delete('umk_wisuda');
	}
}
/* Location: ./application/model/panel/reset_model.php */
?>