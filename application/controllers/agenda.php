<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('agenda_model');
		$this->load->model('menu_model'); 
	}
	
	public function index() {
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));
		$data['daftar_agenda'] = $this->agenda_model->select_list()->result();		
		$this->template_account->display('agendalist_v', $data);					
	}	
	
	public function addagenda() {				
		$data['progdi'] = $this->agenda_model->select_progdi2()->result();
		$this->template_account->display('addagenda_v', $data);
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Judul Agenda</b>','trim|required|is_unique[umk_agenda.agenda_title]|xss_clean');		
		
		if ($this->form_validation->run() == FALSE) {			
			$data['progdi'] = $this->agenda_model->select_progdi2()->result();
			$this->template_account->display('addagenda_v', $data);
		} else {			
			$this->agenda_model->insert_data_agenda();
 			redirect(site_url().'agenda');
 		}
	}
	
	public function editagenda($agenda_id) {	
		$data['agenda'] = $this->agenda_model->select_by_id($agenda_id)->row();
		$data['progdi'] = $this->agenda_model->select_progdi2()->result();
		$this->template_account->display('editagenda_v', $data);
	}
	
	public function updatedata() {		
		$this->agenda_model->update_data_agenda();
 		redirect(site_url().'agenda'); 		
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));
		
		if ($kode == null) {
			redirect(site_url().'agenda');
		} else {
			$this->agenda_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."agenda\">";
		}
	}
}
/* Location: ./application/controllers/agenda.php */
?>