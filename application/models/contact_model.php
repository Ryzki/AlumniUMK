<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {
	
	function __construct() {
		parent::__construct();		
	}
	
	function select_contact($contact_id) {
		$this->db->select('*');
		$this->db->from('umk_contact');
		$this->db->where('contact_id', $contact_id);
		
		return $this->db->get();
	}

	function insert_data() {
		$data = array(
				'hubungi_nama' => ucwords(trim($this->input->post('name', 'true'))),				
				'hubungi_email' => $this->input->post('email', 'true'),
				'hubungi_subyek' => ucwords(trim($this->input->post('subject', 'true'))),
				'hubungi_pesan' => trim($this->input->post('message', 'true')),
				'hubungi_tgl_kirim' => date('Y-m-d'),
				'hubungi_jam_kirim' => date('Y-m-d H:i:s')    			
				);		
		$this->db->insert('umk_hubungi', $data);
	}	
}
/* Location: ./application/model/contact_model.php */
?>