<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_fo {
	
	protected $_ci;
	function __construct(){
		$this->_ci = &get_instance();
	}
	
	function display($template_fo, $data = null) {		
		$data['content'] = $this->_ci->load->view($template_fo, $data,true);		
		$data['_header'] = $this->_ci->load->view('template_fo/header', $data,true);
		$data['_footer'] = $this->_ci->load->view('template_fo/footer', $data,true);
		
		$this->_ci->load->view('/template_fo.php', $data);
	}
}
/* Location: ./application/libraries/template_fo.php */
?>