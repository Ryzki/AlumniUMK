<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_setting($setting_id) {
		$this->db->select('*');
		$this->db->from('umk_setting');
		$this->db->where('setting_id', $setting_id);
		
		return $this->db->get();
	}

	function update_data($setting_id = 1) {	
			$data = array(
	    		'setting_periode' => $this->input->post('tgl_periode'),
				'setting_info' => trim($this->input->post('informasi')),
				'setting_syarat' => trim($this->input->post('syarat')),
				'setting_open' => $this->input->post('lstStatus')	    		
			);		

		$this->db->where('setting_id', $setting_id);
		$this->db->update('umk_setting', $data);
	}	
}
/* Location: ./application/model/panel/setting_model.php */
?>