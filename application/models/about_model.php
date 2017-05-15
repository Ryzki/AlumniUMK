<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_about($content_id) {
		$this->db->select('*');
		$this->db->from('ft_content');
		$this->db->where('content_id', $content_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/about_model.php */
?>