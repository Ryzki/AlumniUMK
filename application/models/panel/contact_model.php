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

	function update_data($contact_id = 1) {
		$data = array(
			'contact_name' => trim($this->input->post('name')),
			'contact_address' => trim($this->input->post('address')),
			'contact_phone' => trim($this->input->post('phone')),
			'contact_fax' => trim($this->input->post('fax')),
			'contact_email' => trim($this->input->post('email')),
			'contact_web' => trim($this->input->post('web')),
			'contact_tgl_update' => date('Y-m-d'),
			'contact_jam_update' => date('Y-m-d H:i:s')
			);
		
		$this->db->where('contact_id', $contact_id);
		$this->db->update('umk_contact', $data);
	}
}
/* Location: ./application/model/panel/contact_model.php */
?>