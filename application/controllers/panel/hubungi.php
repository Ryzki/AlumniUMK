<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hubungi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/hubungi_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_hubungi'] = $this->hubungi_model->select_all()->result();
			$this->template->display('panel/hubungi_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function detailhubungi($hubungi_id) {
		$data['hubungi'] = $this->hubungi_model->select_by_id($hubungi_id)->row();		
		$this->template->display('panel/detailhubungi_v', $data);
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/hubungi');
		} else {
			$this->hubungi_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/hubungi\">";
		}
	}
}
/* Location: ./application/controllers/panel/hubungi.php */
?>