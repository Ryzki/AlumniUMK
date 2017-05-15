<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baru extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/alumni_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_alumni'] = $this->alumni_model->select_alumni_baru()->result();
			$this->template->display('panel/alumnibaru_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function editalumnibaru($alumni_nim) {
		$data['fakultas'] = $this->alumni_model->select_fakultas()->result();
		$data['progdi'] = $this->alumni_model->select_progdi()->result();
		$data['alumni'] = $this->alumni_model->select_by_id($alumni_nim)->row();
		
		$this->template->display('panel/editalumnibaru_v', $data);
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
		// Akhir Email
		*/

		// Update Aktivasi Data
		$this->alumni_model->update_data_baru();
 		redirect(site_url().'panel/baru');
	}
	
	public function deletedatabaru($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/baru');
		} else {
			$this->alumni_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/baru\">";
		}
	}
}
/* Location: ./application/controllers/panel/baru.php */
?>