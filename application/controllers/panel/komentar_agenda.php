<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentar_agenda extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/komentar_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_komentar'] = $this->komentar_model->select_agenda_all()->result();
			$this->template->display('panel/komentaragenda_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function editkomentar($komentar_id) {
		$data['komentar'] = $this->komentar_model->select_seputar_by_id($komentar_id)->row();
		$this->template->display('panel/editkomentarseputar_v', $data);
	}
	
	public function updatedata() {		
		$this->komentar_model->update_data();
 		redirect(site_url().'panel/komentar_seputar');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/komentar_seputar');
		} else {
			$this->komentar_model->delete_data_agenda($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/komentar_seputar\">";
		}
	}
}
/* Location: ./application/controllers/panel/komentar_agenda.php */
?>