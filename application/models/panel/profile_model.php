<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_by_id($user_id) {		
		$this->db->select('*');
		$this->db->from('umk_users');
		$this->db->where('user_id', $user_id);
		
		return $this->db->get();
	}

	function update_data() {
		$user_id   = $this->session->userdata('a_user_id');
		
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
					'user_password' => sha1($this->input->post('password')),	    			    		
					'user_name' => trim($this->input->post('name')),					    			
	    			'user_avatar' => $this->upload->file_name
					);
			} else {
				$data = array(
					'user_name' => trim($this->input->post('name')),
					'user_password' => sha1($this->input->post('password')),	    				
					);
			}			
		}

		$this->db->where('user_id', $user_id);
		$this->db->update('umk_users', $data);
	}	
}
/* Location: ./application/model/panel/profile_model.php */
?>