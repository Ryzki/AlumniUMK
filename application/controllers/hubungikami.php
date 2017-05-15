<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hubungikami extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->library('template_fo');
		$this->load->model('contact_model');
		$this->load->model('menu_model');       
	}
	
	public function index($contact_id = 1){
		$data['contact'] = $this->contact_model->select_contact($contact_id)->row();
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
								
    	$this->template_fo->display('contact_v', $data);
	}

	public function kirim_pesan () {
		$this->form_validation->set_rules('name','<b>Nama</b>','trim|required|min_length[10]|max_length[30]|xss_clean');		
		$this->form_validation->set_rules('email','<b>Email</b>','trim|required|min_length[10]|max_length[30]|valid_email|is_unique[umk_hubungi.hubungi_email]|xss_clean');
		$this->form_validation->set_rules('subject','<b>Subyek</b>','trim|required|min_length[10]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('message','<b>Pesan Anda</b>','trim|required|min_length[10]|xss_clean');		
		
		if ($this->form_validation->run() == FALSE) {
			$contact_id = 1;
			$data['contact'] = $this->contact_model->select_contact($contact_id)->row();
			$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
									
	    	$this->template_fo->display('contact_v', $data);
		} else {			
			/*$verify		= trim($this->input->post('verify', 'true'));
			$security	= $this->session->userdata('security_code');
  			
  			if((!empty($verify) && ($verify == $security))) {*/
				$this->contact_model->insert_data(); 
				$this->session->set_flashdata('notification','Terima Kasih, Pesan Anda Berhasil Terkirim.');			
				redirect(site_url('hubungikami'));
			/*} else {
				$this->session->set_flashdata('notification','Maaf !!, Captcha Salah, ulangi lagi.');			
				redirect(site_url('hubungikami'));
			}*/				
		}
	}	
}
/* Location: ./application/controller/hubungikami.php */
?>