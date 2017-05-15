<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_users');		
		$this->db->where('user_level', 'User');
		$this->db->where('user_trash', 0);			
		$this->db->order_by('user_username','asc');
				
		return $this->db->get();	 
	}

	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi p');
		$this->db->join('umk_m_fakultas m', 'p.fakultas_id = m.fakultas_id');
		$this->db->order_by('p.progdi_id','asc');
		
		return $this->db->get();
	}

	function select_list_akses($users_userid) {
		$this->db->select('*');
		$this->db->from('umk_user_akses a');
		$this->db->join('umk_users u', 'a.user_id = u.user_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->where('u.user_trash', 0);
		$this->db->where('a.user_id', $users_userid);
		$this->db->order_by('a.progdi_id','asc');
		
		return $this->db->get();
	}

	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'user_username' => trim($this->input->post('username')),
	    			'user_password' => sha1(trim($this->input->post('password'))),
					'user_name' => trim($this->input->post('name')),
	    			'user_level' => 'User',
					'user_avatar' => $this->upload->file_name
				);
		} else {				
			$data = array(
	    			'user_username' => trim($this->input->post('username')),
	    			'user_password' => sha1(trim($this->input->post('password'))),
					'user_name' => trim($this->input->post('name')),				
	    			'user_level' => 'User'			
					);
		}

		$this->db->insert('umk_users', $data);
	}
	
	function select_by_id($user_id) {
		$this->db->select('*');
		$this->db->from('umk_users');
		$this->db->where('user_id', $user_id);
		
		return $this->db->get();
	}

	function update_data() {
		$user_id  = $this->input->post('user_id');		
		$password = $this->input->post('password');

		if (empty($password)) {
			if (!empty($_FILES['userfile']['name'])) {
				$data = array(	    			    			
					'user_name' => trim($this->input->post('name')),	    			
	    			'user_avatar' => $this->upload->file_name	
					);
			} else {
				$data = array(	    			    		
					'user_name' => trim($this->input->post('name'))
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

	function delete_akses($kode = '') {
		$kode = $this->security->xss_clean($this->uri->segment(4));		
		
		$this->db->where('user_id', $kode);
		$this->db->delete('umk_user_akses');		
	}

	function insert_data_akses() {				
		$data = array(
	    		'user_id' => $this->uri->segment(4),
	    		'progdi_id' => $this->input->post('lstProgdi')	    		
			);
		
		$this->db->insert('umk_user_akses', $data);
	}

	function select_akses_by_id($akses_id) {
		$this->db->select('*');
		$this->db->from('umk_user_akses');
		$this->db->where('akses_id', $akses_id);
		
		return $this->db->get();
	}

	function update_data_akses() {				
		$akses_id  = $this->input->post('akses_id');	
		$data = array(	    		
	    		'progdi_id' => $this->input->post('lstProgdi')
			);
		$this->db->where('akses_id', $akses_id);
		$this->db->update('umk_user_akses', $data);
	}

	function delete_data_akses($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));		
						
		$this->db->where('akses_id', $kode);
		$this->db->delete('umk_user_akses');
	}	
}
/* Location: ./application/model/panel/user_model.php */
?>