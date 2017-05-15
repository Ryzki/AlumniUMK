
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_user {
	
	protected $_ci;
	function __construct(){
		$this->_ci = &get_instance();
	}
	
	function display($template_user, $data = null) {		
		$data['content'] = $this->_ci->load->view($template_user, $data,true);
		$data['_header'] = $this->_ci->load->view('template_user/header', $data,true);
		$data['_left_menu'] = $this->_ci->load->view('template_user/left_menu', $data,true);
		$data['_footer'] = $this->_ci->load->view('template_user/footer', $data,true);
		
		$this->_ci->load->view('/template_user.php', $data);
	}
}
/* Location: ./application/libraries/template_user.php */
?>