<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_menu($content_id) {
		$this->db->select('*');
		$this->db->from('umk_content');
		$this->db->where('content_id', $content_id);
		
		return $this->db->get();
	}

	function update_data($content_id = 1) {	
		$data = array(
    		'content_short' => $this->input->post('short'), 
    		'content_deskripsi' => $this->input->post('deskripsi'),    			
			'content_tgl_update' => date('Y-m-d'),
    		'content_jam_update' => date('Y-m-d H:i:s')
		);

		$this->db->where('content_id', $content_id);
		$this->db->update('umk_content', $data);
	}	
}
/* Location: ./application/model/panel/menu_model.php */
?>