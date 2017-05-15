<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_alumni_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi p');
		$this->db->join('umk_m_fakultas m', 'p.fakultas_id = m.fakultas_id');
		$this->db->order_by('p.progdi_id','asc');
		
		return $this->db->get();
	}
	
	function select_all() {
		$Progdi = $this->input->post('lstProgdi');
		$Tahun1 = $this->input->post('tahun1');
		$Tahun2 = $this->input->post('tahun2');		

		if ($Progdi == 'all') { // Semua
			$this->db->select('u.*, a.alumni_nim, a.alumni_nama, p.progdi_name');
			$this->db->from('umk_users u');
			$this->db->join('umk_alumni a', 'u.alumni_nim = a.alumni_nim');
			$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
			$this->db->where('u.user_level', 'Alumni');
			$this->db->where('u.user_trash', 0);		
			$this->db->where('YEAR(a.alumni_tgl_masuk) >=', $Tahun1);
			$this->db->where('YEAR(a.alumni_tgl_masuk) <=', $Tahun2);	
			$this->db->order_by('u.user_username','asc');
				
			return $this->db->get();		
		} elseif ($Progdi <> 'all') { // By Progdi
			$this->db->select('u.*, a.alumni_nim, a.alumni_nama, p.progdi_name');
			$this->db->from('umk_users u');
			$this->db->join('umk_alumni a', 'u.alumni_nim = a.alumni_nim');
			$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
			$this->db->where('u.user_level', 'Alumni');
			$this->db->where('u.user_trash', 0);
			$this->db->where('a.progdi_id', $Progdi);
			$this->db->where('YEAR(a.alumni_tgl_masuk) >=', $Tahun1);
			$this->db->where('YEAR(a.alumni_tgl_masuk) <=', $Tahun2);			
			$this->db->order_by('u.user_username','asc');
			
			return $this->db->get();
		}
	}
	
	function select_by_id($user_id) {
		$this->db->select('*');
		$this->db->from('umk_users');
		$this->db->where('user_id', $user_id);
		
		return $this->db->get();
	}

	function update_data() {
		$user_id  = $this->input->post('user_id');		
		$password = trim($this->input->post('password'));

		if (empty($password)) {
			if (!empty($_FILES['userfile']['name'])) {
				$data = array(	    			    			
					'user_name' => trim($this->input->post('name')),	    			
	    			'user_avatar' => $this->upload->file_name	
					);
			} else {
				$data = array(	    			    		
					'user_name' => trim($this->input->post('name')),	    			
					);
			}
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$data = array(
					'user_password' => sha1(trim($this->input->post('password'))),
					'user_name' => trim($this->input->post('name')),	    		
	    			'user_avatar' => $this->upload->file_name	
					);
			} else {
				$data = array(
					'user_password' => sha1(trim($this->input->post('password'))),
					'user_name' => trim($this->input->post('name'))	    		
					);
			}
		}

		$this->db->where('user_id', $user_id);
		$this->db->update('umk_users', $data);
	}

	function delete_data($kode = '') {
		$kode = $this->security->xss_clean($this->uri->segment(4));		
		
		$this->db->where('user_id', $kode);
		$this->db->delete('umk_users');
	}
}
/* Location: ./application/model/panel/User_admin_model.php */
?>