<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wirausaha extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/wirausaha_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_wirausaha'] = $this->wirausaha_model->select_all()->result();
			$this->template->display('panel/wirausaha_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function listinvoice($usaha_id) {
		$data['wirausaha'] = $this->wirausaha_model->select_by_id($usaha_id)->row();
		$data['daftar_invoice'] = $this->wirausaha_model->select_all_invoice($usaha_id)->result();
		
		$this->template->display('panel/listinvoice_v', $data);
	}

	public function editwirausaha($usaha_id) {
		$data['fakultas'] = $this->wirausaha_model->select_fakultas()->result();
		$data['progdi'] = $this->wirausaha_model->select_progdi()->result();
		$data['skala'] = $this->wirausaha_model->select_skala()->result();
		$data['wirausaha'] = $this->wirausaha_model->select_by_id($usaha_id)->row();
		
		$this->template->display('panel/editwirausaha_v', $data);
	}

	public function addinvoice() {
		$usaha_id = $this->uri->segment(4);		
		$data['urut'] = $this->wirausaha_model->generateAutoid();
		$data['wirausaha'] = $this->wirausaha_model->select_by_id($usaha_id)->row();
		
		$this->template->display('panel/addinvoice_v', $data);
	}

	public function editinvoice($invoice_id) {
		$usaha_id = $this->uri->segment(4);
		$invoice_id = $this->uri->segment(5);
		$data['invoice'] = $this->wirausaha_model->select_by_invoice($invoice_id)->row();
		$data['wirausaha'] = $this->wirausaha_model->select_by_id($usaha_id)->row();
		
		$this->template->display('panel/editinvoice_v', $data);
	}

	public function updatedatainvoice() {
		// Update Data Invoice
		$this->wirausaha_model->update_data_invoice();
		// Update Data Usaha untuk Iklan dan Expired Iklannya
		$this->wirausaha_model->update_data();

 		redirect(site_url().'panel/wirausaha/listinvoice/'.$this->uri->segment(4));
	}
	
	public function deletedatainvoice($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url().'panel/wirausaha/listinvoice/'.$this->uri->segment(4));
		} else {
			$this->wirausaha_model->delete_data_invoice($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/wirausaha/listinvoice/".$this->uri->segment(4)."\">";
		}
	}

	public function savedatainvoice() {								
		$this->form_validation->set_rules('total','<b>Total</b>','trim|required|integer');		
		
		if ($this->form_validation->run() == FALSE) {
			$usaha_id = $this->uri->segment(4);		
			$data['urut'] = $this->wirausaha_model->generateAutoid();
			$data['wirausaha'] = $this->wirausaha_model->select_by_id($usaha_id)->row();
			
			$this->template->display('panel/addinvoice_v', $data);  
		} else {
			$this->wirausaha_model->insert_data_invoice();
			// ID Invoice Baru
			$invoice_id = $this->db->insert_id();

			// Setting Email			
			$nama_alumni = $this->input->post('nama', 'TRUE'); // Nama Alumni								
			$recepient_email = $this->input->post('email', 'TRUE'); // Email Alumni
			$recepient_cc = 'manggar07@gmail.com';
			$recepient_bcc = '22manly@gmail.com';
				
			$sender_subject = 'Invoice - Tracer UMK';
			$sender_msg = 'Yth. '. $nama_alumni ."\r\n";
			$sender_msg .= "\r\n";
			$sender_msg .= 'Email ini adalah pemeberitahuan bahwa Invoice untuk konfirmasi Iklan anda telah dibuat pada : '. date('Y-m-d') ."\r\n";
			$sender_msg .= 'Invoice #'.$invoice_id."\r\n";
			$sender_msg .= 'Jumlah Tagihan: Rp. 50,000,-'."\r\n";
			$sender_msg .= 'Tanggal Expired : '.$this->input->post('tgl_expired')."\r\n";			
			$sender_msg .= "\r\n";
			$sender_msg .= "\r\n";
			$sender_msg .= 'Sincerelly,'. "\r\n";
			$sender_msg .= "\r\n";
			$sender_msg .= "\r\n";
			$sender_msg .= 'Admin';
							
			$sender_name = 'Admin Tracer Teknik';
			$sender_email = 'alumni.teknikumk@gmail.com'; //diperlukanan
		 	
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
			
 			redirect(site_url().'panel/wirausaha/listinvoice/'.$this->uri->segment(4));
		}
	}	
}
/* Location: ./application/controllers/panel/wirausaha.php */
?>