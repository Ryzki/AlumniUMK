<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_fo');
		$this->load->model('home_model');
		$this->load->model('menu_model');
	}
	
	public function index($content_id = 2){
		$data['home'] = $this->home_model->select_home($content_id)->row();		
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
		$data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();
		$data['daftar_info'] = $this->menu_model->select_info()->result();
		$data['info_penting'] = $this->menu_model->select_info_penting()->row();						

		$data['slider'] = $this->home_model->select_slider()->result();		
		$data['lowker'] = $this->home_model->select_lowker()->result();
    	$this->template_fo->display('home_v', $data);
	}

	public function daftar() {				
		if ($this->input->post('lstDaftar', 'true') == 1) {
			redirect(site_url('wisuda/daftar'));
		} else {
			redirect(site_url('daftar'));
		} 		
	}	
}
/* Location: ./application/controller/home.php */
?>