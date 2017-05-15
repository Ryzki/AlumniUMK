<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_admin_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('umk_users');		
		$this->db->where('user_level', 'Admin');
		$this->db->where('user_trash', 0);			
		$this->db->order_by('user_username','asc');
				
		return $this->db->get(); 
	}

	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'user_username' => trim($this->input->post('username')),
	    			'user_password' => sha1(trim($this->input->post('password'))),
					'user_name' => trim($this->input->post('name')),
					'user_level' => 'Admin',	    			
					'user_avatar' => $this->upload->file_name
				);
		} else {				
			$data = array(
	    			'user_username' => trim($this->input->post('username')),
	    			'user_password' => sha1(trim($this->input->post('password'))),
	    			'user_level' => 'Admin',
					'user_name' => trim($this->input->post('name'))	    		
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