<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template_user');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('user/agenda_model');
		$this->load->model('user/menu_model');	
	}
	
	public function index(){
		redirect(base_url());
	}

	public function progdi(){
		if($this->session->userdata('logged_in_umk')) {
			$progdi_id = $this->uri->segment(4);
			$data['progdi'] = $this->agenda_model->select_progdi2($progdi_id)->row();
			$data['daftar_agenda'] = $this->agenda_model->select_all($progdi_id)->result();
			$this->template_user->display('user/agenda_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addagenda() {
		$progdi_id = $this->uri->segment(4);
		$data['progdi'] = $this->agenda_model->select_progdi2($progdi_id)->row();
		$this->template_user->display('user/addagenda_v', $data); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Title</b>','trim|required|min_length[5]|max_length[70]|is_unique[umk_agenda.agenda_title]');
		
		if ($this->form_validation->run() == FALSE) {
			$progdi_id = $this->uri->segment(4);
			$data['progdi'] = $this->agenda_model->select_progdi2($progdi_id)->row();
			$this->template_user->display('user/addagenda_v', $data);  
		} else {			
			$this->agenda_model->insert_data();
 			redirect(site_url().'user/agenda/progdi/'.$this->uri->segment(4));
		}
	}
	
	public function editagenda($agenda_id) {
		$progdi_id = $this->uri->segment(4);
		$agenda_id = $this->uri->segment(5);
		$data['progdi'] = $this->agenda_model->select_progdi2($progdi_id)->row();
		$data['agenda'] = $this->agenda_model->select_by_id($agenda_id)->row();

		$this->template_user->display('user/editagenda_v', $data);
	}
	
	public function updatedata() {			
		$this->agenda_model->update_data();
 		redirect(site_url().'user/agenda/progdi/'.$this->uri->segment(4));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url().'user/agenda/progdi/'.$this->uri->segment(4));
		} else {
			$this->agenda_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."user/agenda/progdi".'/'.$this->uri->segment(4)."\">";
		}
	}
}
/* Location: ./application/controllers/user/agenda.php */
?>