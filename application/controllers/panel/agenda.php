<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/agenda_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_agenda'] = $this->agenda_model->select_all()->result();
			$this->template->display('panel/agenda_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addagenda() {		
		$this->template->display('panel/addagenda_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Title</b>','trim|required|min_length[5]|max_length[70]|is_unique[umk_agenda.agenda_title]');		
		$this->form_validation->set_rules('short','<b>Short Description</b>','trim');
		$this->form_validation->set_rules('deskripsi','<b>Description</b>','trim');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addagenda_v');   
		} else {			
			$this->agenda_model->insert_data();
 			redirect(site_url().'panel/agenda');
		}
	}
	
	public function editagenda($agenda_id) {		
		$data['agenda'] = $this->agenda_model->select_by_id($agenda_id)->row();
		$this->template->display('panel/editagenda_v', $data);
	}
	
	public function updatedata() {		
		$this->agenda_model->update_data();
 		redirect(site_url().'panel/agenda');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/agenda');
		} else {
			$this->agenda_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/agenda\">";
		}
	}
}
/* Location: ./application/controllers/panel/agenda.php */
?>