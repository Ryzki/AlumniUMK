
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_account {
	
	protected $_ci;
	function __construct(){
		$this->_ci = &get_instance();
	}
	
	function display($template_account, $data = null) {		
		$data['content'] = $this->_ci->load->view($template_account, $data,true);
		$data['_header'] = $this->_ci->load->view('template_account/header', $data,true);
		$data['_left_menu'] = $this->_ci->load->view('template_account/left_menu', $data,true);
		$data['_footer'] = $this->_ci->load->view('template_account/footer', $data,true);
		
		$this->_ci->load->view('/template_account.php', $data);
	}
}
/* Location: ./application/libraries/template_account.php */
?>