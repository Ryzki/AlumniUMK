<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumni extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template_user');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('user/alumni_model');
		$this->load->model('user/menu_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_alumni'] = $this->alumni_model->select_alumni_baru()->result();
			$this->template_user->display('user/alumnibaru_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function baru($progdi_id){
		if($this->session->userdata('logged_in_umk')) {
			$progdi_id = $this->uri->segment(4);
			$data['progdi'] = $this->alumni_model->select_progdi2($progdi_id)->row();
			$data['daftar_alumni'] = $this->alumni_model->select_alumni_baru($progdi_id)->result();
			$this->template_user->display('user/alumnibaru_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function editalumnibaru($alumni_nim) {
		$alumni_nim = $this->uri->segment(5);
		$data['fakultas'] = $this->alumni_model->select_fakultas()->result();
		$data['progdi'] = $this->alumni_model->select_progdi()->result();
		$data['alumni'] = $this->alumni_model->select_by_id($alumni_nim)->row();
		
		$this->template_user->display('user/editalumnibaru_v', $data);
	}
	
	public function updatedatabaru() {
		// Email ke Member, CC ke Manggar (Kaji Arifin)       		
		/*$recepient_email = trim($this->input->post('email', 'true')); // Email Alumni Baru
		$recepient_cc = '';
		$recepient_bcc = '';
				
		$sender_subject = 'Your Account Activation - Alumni Tracer Teknik UMK';
		$sender_msg = 'Your Account is Activated, Please Login to Our Website.'."\r\n";
		$sender_msg .= "\r\n";
		$sender_msg .= "\r\n";
		$sender_msg .= 'alumni.teknik.umk.ac.id/login'."\r\n";		
		$sender_msg .= "\r\n";
		$sender_msg .= "\r\n";
		$sender_msg .= 'Sincerelly,'. "\r\n";
		$sender_msg .= "\r\n";
		$sender_msg .= "\r\n";
		$sender_msg .= 'Admin';
							
		$sender_name = 'Admin Alumni Tracer Teknik';
		$sender_email = 'alumni.teknikumk@gmail.com'; //diperlukan
			
		$this->email->from($sender_email, $sender_name); // inisialisasi pengirim
		$this->email->to($recepient_email); // email Member
		 
		if ($recepient_cc != '') {
			$this->email->cc($recepient_cc);
		}
				
		if ($recepient_bcc != '') {
			$this->email->bcc($recepient_bcc);
		}
				
		$this->email->subject($sender_subject);
		$this->email->message($sender_msg);
		
		$this->email->send(); //proses pengiriman email
		// Akhir Email */

		// Update Aktivasi Data
		$this->alumni_model->update_data_baru();
 		redirect(site_url().'user/alumni/baru'.'/'.$this->uri->segment(4));
	}
	
	public function deletedatabaru($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url().'user/alumni/baru'.'/'.$this->uri->segment(4));
		} else {
			$this->alumni_model->delete_data_baru($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."user/alumni/baru".'/'.$this->uri->segment(4)."\">";
		}
	}

	public function progdi($progdi_id) {
		$progdi_id = $this->uri->segment(4);	
		$data['progdi'] = $this->alumni_model->select_progdi2($progdi_id)->row();				
		$this->template_user->display('user/carialumni_v', $data);		
	}

	public function caridataalumni() {	
		$progdi_id = $this->uri->segment(4);	
		$Tahun1 = $this->input->post('tahun1');
		$Tahun2 = $this->input->post('tahun2');

		$data['progdi'] = $this->alumni_model->select_progdi2($progdi_id)->row();
		$data['daftar_alumni'] = $this->alumni_model->select_alumni_progdi($progdi_id)->result();			
		$this->template_user->display('user/alumniprogdi_v', $data);		
	}

	public function editalumni($alumni_nim) {
		$alumni_nim = $this->uri->segment(5);
		$data['fakultas'] = $this->alumni_model->select_fakultas()->result();
		$data['progdi'] = $this->alumni_model->select_progdi()->result();
		$data['kegiatan'] = $this->alumni_model->select_kegiatan()->result();
		$data['alumni'] = $this->alumni_model->select_by_id($alumni_nim)->row();
		
		$this->template_user->display('user/editalumni_v', $data);
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/alumni');
		} else {
			$this->alumni_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/alumni\">";
		}
	}
}
/* Location: ./application/controllers/user/alumni.php */
?>