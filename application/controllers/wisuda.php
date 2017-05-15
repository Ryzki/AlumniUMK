<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wisuda extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->library('template_account');
		$this->load->model('wisuda_model');		     
	}
	
	public function index() {
		$data['periode'] = $this->wisuda_model->select_setting()->row();		
    	$this->template_account->display('wisuda_v', $data);
	}

	public function daftar() {		
		//$data['option_fakultas'] = $this->wisuda_model->getFakultasList();
		$data['setting'] = $this->wisuda_model->tampil_setting()->row();
		$this->template_account->display('daftarwisuda_v', $data);
	}

	/*function select_progdi() {
        $data['option_progdi'] = $this->wisuda_model->getProgdiList();
        $this->load->view('progdi_v',$data);
    }*/

    /*public function create_image(){
		$md5_hash = md5(rand(0,999));
		$security_code = substr($md5_hash, 15, 5);		
		$array_item = array('security_code' => $security_code);	    
	    $this->session->set_userdata($array_item);

	    $width = 100; 
	    $height = 30;  
	    $image = ImageCreate($width, $height);  
	    $white = ImageColorAllocate($image, 255, 255, 255); 
	    $black = ImageColorAllocate($image, 0, 0, 0); 
	    $grey = ImageColorAllocate($image, 204, 204, 204); 
	    ImageFill($image, 0, 0, $black); 
	    ImageString($image, 40, 30, 6, $security_code, $white); 
	    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
	    imageline($image, 300, $height/2, $width, $height/2, $grey); 
	    imageline($image, $width/2, 300, $width/2, $height, $grey); 
	    header("Content-Type: image/jpeg"); 
	    ImageJpeg($image); 
	    ImageDestroy($image); 
	}*/
    
	public function savedata() {
		$this->form_validation->set_rules('nim','<b>N I M</b>','trim|required|integer|min_length[9]|max_length[9]|is_unique[umk_alumni.alumni_nim]|xss_clean');
		$this->form_validation->set_rules('nama','<b>Nama</b>','trim|required|max_length[50]|xss_clean');		
		$this->form_validation->set_rules('tempat','<b>Tempat Lahir</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('tgl_lahir','<b>Tanggal Lahir</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('judul','<b>Judul</b>','trim|required|min_length[15]|xss_clean');
		$this->form_validation->set_rules('email','<b>Email</b>','trim|required|min_length[5]|max_length[50]|is_unique[umk_alumni.alumni_email]|xss_clean');
		$this->form_validation->set_rules('telp','<b>No. Telp/HP</b>','trim|required|min_length[10]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('lstAgama','<b>Agama</b>','required|xss_clean');
		$this->form_validation->set_rules('alamat','<b>Alamat</b>','trim|required|min_length[10]|max_length[70]|xss_clean');
		$this->form_validation->set_rules('nama_ortu','<b>Nama Pasangan/Orang Tua</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('kerja_ortu','<b>Pekerjaan Pasangan/Orang Tua</b>','trim|max_length[50]|xss_clean');
		$this->form_validation->set_rules('alamat_ortu','<b>Alamat Pasangan/Orang Tua</b>','trim|required|min_length[5]|max_length[70]|xss_clean');
		$this->form_validation->set_rules('telp_ortu','<b>Telp. Pasangan/Orang Tua</b>','trim|required|min_length[11]|max_length[30]|xss_clean');		
		$this->form_validation->set_rules('verify','<b>Captcha</b>','trim|required|min_length[5]|max_length[5]|xss_clean');			
		
		if ($this->form_validation->run() == FALSE) {
			//$data['option_fakultas'] = $this->wisuda_model->getFakultasList();
			$data['setting'] = $this->wisuda_model->tampil_setting()->row();
			$this->template_account->display('daftarwisuda_v', $data);
		} else {
			$verify		= trim($this->input->post('verify', 'true'));
			$security	= $this->session->userdata('security_code');

			if((!empty($verify) && ($verify == $security))) { 
				// Email ke Member, CC ke Manggar (Kaji Arifin)    
	   			/*$username  = trim($this->input->post('username', 'TRUE')); // Username
				$recepient_email = trim($this->input->post('email', 'TRUE')); // Email Alumni Baru
				$recepient_cc = '';
				$recepient_bcc = '';
				
				$sender_subject = 'Your Account - Alumni Tracer UMK';
				$sender_msg = 'Thank You for Join with Us ! '."\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= 'This Your Account : '."\r\n";
				$sender_msg .= 'Username : '.trim($username)."\r\n";
				$sender_msg .= 'Password : '.trim($this->input->post('password'))."\r\n";
				$sender_msg .= 'Tunggu sampai Administrator mengaktifkan Akun Anda.'."\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= 'Sincerelly,'. "\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= 'Admin';
							
				$sender_name = 'Admin Alumni Tracer UMK';
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
			 
				$this->email->send(); //proses pengiriman email */
				// Akhir Email

				// Email ke Fadli dari Manggar (Kaji Arifin), Perintah Accept
	   			/*$username_x  = trim($this->input->post('username', 'TRUE')); // Username
				$recepient_email_x = 'manggar07@gmail.com';
				$recepient_cc_x = '22manly@gmail.com';
				$recepient_bcc_x = '';
					
				$sender_subject_x = 'Member Baru';
				$sender_msg_x = 'Mohon untuk aktivasi Akun Alumni Baru.'."\r\n";
				$sender_msg_x .= "\r\n";
				$sender_msg_x .= "\r\n";
				$sender_msg_x .= 'Detail Akun Baru : '."\r\n";
				$sender_msg_x .= 'Username : '.$username."\r\n";
				$sender_msg_x .= 'Password : '.trim($this->input->post('password'))."\r\n";
				$sender_msg_x .= "\r\n";		
				$sender_msg_x .= "\r\n";
				$sender_msg_x .= 'Sincerelly,'. "\r\n";
				$sender_msg_x .= "\r\n";
				$sender_msg_x .= "\r\n";
				$sender_msg_x .= 'Admin';
								
				$sender_name_x = 'Admin Alumni Tracer Teknik';
				$sender_email_x = 'alumni.teknikumk@gmail.com'; //diperlukan
			 	
				$this->email->from($sender_email_x, $sender_name_x); // inisialisasi pengirim
				$this->email->to($recepient_email_x); // email Member
			 
				if ($recepient_cc_x != '') {
					$this->email->cc($recepient_cc_x);
				}
					
				if ($recepient_bcc_x != '') {
					$this->email->bcc($recepient_bcc_x);
				}
					
				$this->email->subject($sender_subject_x);
				$this->email->message($sender_msg_x);
			 
				$this->email->send(); //proses pengiriman email  */
				// Akhir Email				

				// Cek Foto Mahasiswa
				if (!empty($_FILES['userfile']['name'])) {
					$jam = time();
					$kode = trim($this->input->post('nim', 'true'));
						
					$config['file_name']    = 'Foto_'.$kode.'_'.$jam.'.jpg';
					$config['upload_path'] = './foto/';
					$config['allowed_types'] = 'jpg|png|gif|jpeg';		
					$config['overwrite'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->do_upload('userfile');
					$config['image_library'] = 'gd2';
					$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config['maintain_ratio'] = TRUE;
												
					$config['width'] = 150;
					$config['height'] = 200;
					$this->load->library('image_lib',$config);
						 
					$this->image_lib->resize();
				} elseif (empty($_FILES['userfile']['name'])){
					$config['file_name'] = '';
				}

				// Add New Alumni to Table umk_alumni
				$this->wisuda_model->insert_data_alumni();
				// Add New Username to Table umk_users			
				//$this->wisuda_model->insert_data_user();				
				// Insert ke Tabel Wisuda
				//$this->wisuda_model->insert_data_wisuda();
				// ID Wisuda Baru
				$wisuda_id = $this->db->insert_id();			
				redirect(site_url('wisuda/success').'/'.$wisuda_id);
			} else {   				
   				$this->session->set_flashdata('notification','Maaf !!, Captcha Salah, ulangi lagi.');
   				redirect(site_url('wisuda/daftar'));
  			}			
		}
	}

	public function success () {
    	$wisuda_id = $this->uri->segment(3);		
    	$data['detailwisuda'] = $this->wisuda_model->select_data_wisuda($wisuda_id)->row();
    	$data['setting'] = $this->wisuda_model->tampil_setting()->row();
    	$this->template_account->display('daftarwisudasukses_v', $data);
	}

	public function printpreview() {
    	$wisuda_id = $this->uri->segment(3);		
    	$data['detailwisuda'] = $this->wisuda_model->select_data_wisuda($wisuda_id)->row();    	
    	$this->load->view('printdaftarwisuda_v', $data);
	}

	public function download() {
		$wisuda_id = $this->uri->segment(3);		
    	$data['detailwisuda'] = $this->wisuda_model->select_data_wisuda($wisuda_id)->row(); 
		
		$time = time();
		$filename = 'BuktiPendaftaran_'.$wisuda_id.'_'.$time;
		$pdfFilePath = FCPATH."/download/$filename.pdf";
		
		if (file_exists($pdfFilePath) == FALSE){
			ini_set('memory_limit','50M');
			$html = $this->load->view('printdaftarwisuda_pdf_v', $data, true); // render the view into HTML
			 
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->SetHeader(''); 
			$pdf->SetFooter('');
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		redirect("/download/$filename.pdf");		
	}

}
/* Location: ./application/controller/wisuda.php */
?>