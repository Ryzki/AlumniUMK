<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));			
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('account_model');		
		$this->load->model('menu_model');      
	}
	
	public function index() {
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));	
		$user_id = $this->session->userdata('user_id');
		$nim = $this->session->userdata('nim');		
		$data['akun'] = $this->account_model->select_account($user_id)->row();

		$data['perusahaan'] = $this->account_model->select_perusahaan_sekarang($nim)->row();
		$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
		$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
		$data['usaha'] = $this->account_model->select_usaha($nim)->row();

    	$this->template_account->display('account_v', $data);
	}

	public function editdata() {		
		$user_id = $this->session->userdata('user_id');		
		$data['akun'] = $this->account_model->select_account($user_id)->row();
		$data['fakultas'] = $this->account_model->select_fakultas()->result();
		$data['progdi'] = $this->account_model->select_progdi()->result();			

    	$this->template_account->display('account_v', $data);
	}

	public function gantipassword() {		
		$user_id = $this->session->userdata('user_id');		
		$data['akun'] = $this->account_model->select_account($user_id)->row();
		$data['fakultas'] = $this->account_model->select_fakultas()->result();
		$data['progdi'] = $this->account_model->select_progdi()->result();			

    	$this->template_account->display('account_v', $data);
	}

	public function printdata() {		
		$user_id = $this->session->userdata('user_id');
		$nim = $this->session->userdata('nim');		
		$data['akun'] = $this->account_model->select_account($user_id)->row();
		$data['fakultas'] = $this->account_model->select_fakultas()->result();
		$data['progdi'] = $this->account_model->select_progdi()->result();

		$data['perusahaan'] = $this->account_model->select_perusahaan_sekarang($nim)->row();
		$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
		$data['usaha'] = $this->account_model->select_usaha($nim)->row();
		$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();					

    	$this->load->view('printdataalumni_v', $data);
	}

	public function editwisuda() {		
		$nim = trim($this->session->userdata('nim'));
		$data['akun'] = $this->account_model->select_wisuda($nim)->row();			

    	$this->template_account->display('account_v', $data);
	}
	
	public function updatedata() {
		$this->form_validation->set_rules('tentang','<b>Tentang Saya</b>','trim|xss_clean');
		$this->form_validation->set_rules('nama','<b>Nama Lengkap</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('tempat','<b>Tempat Lahir</b>','trim|required|max_length[30]|xss_clean');
		$this->form_validation->set_rules('tgl_lahir','<b>Tanggal Lahir</b>','required|xss_clean');
		$this->form_validation->set_rules('lstJK','<b>Jenis Kelamin</b>','required|xss_clean');
		$this->form_validation->set_rules('lstStatus','<b>Status</b>','required|xss_clean');	
		$this->form_validation->set_rules('lstAgama','<b>Agama</b>','required|xss_clean');
		$this->form_validation->set_rules('alamat','<b>Alamat</b>','trim|required|max_length[70]|xss_clean');	
		$this->form_validation->set_rules('hp','<b>No. Handphone</b>','required|numeric|min_length[10]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('pin','<b>PIN BB</b>','trim|xss_clean');
		$this->form_validation->set_rules('fb','<b>Facebook</b>','trim|xss_clean');		
		$this->form_validation->set_rules('ortu','<b>Nama Orang Tua</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('kerja_ortu','<b>Pekerjaan Orang Tua</b>','trim|max_length[50]|xss_clean');				
		$this->form_validation->set_rules('alamat_ortu','<b>Alamat Orang Tua</b>','trim|max_length[70]|xss_clean');
		$this->form_validation->set_rules('telp_ortu','<b>Telp Orang Tua</b>','trim|max_length[30]|xss_clean');
		$this->form_validation->set_rules('lstFakultas','<b>Fakultas</b>','required|xss_clean');
		$this->form_validation->set_rules('lstProgdi','<b>Program Studi</b>','required|xss_clean');
		$this->form_validation->set_rules('tgl_masuk','<b>Tgl. Masuk Kuliah</b>','required|xss_clean');
		$this->form_validation->set_rules('tgl_lulus','<b>Tgl. Lulus Kuliah</b>','required|xss_clean');		
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');
			$nim = trim($this->session->userdata('nim'));
			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['fakultas'] = $this->account_model->select_fakultas()->result();
			$data['progdi'] = $this->account_model->select_progdi()->result();			

	    	$this->template_account->display('account_v', $data);
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$jam = time();
				$kode = trim($this->session->userdata('nim'));
					
				$config['file_name']    = 'Foto_'.$kode.'_'.$jam.'.jpg';
				$config['upload_path'] = './foto/';
				$config['allowed_types'] = 'jpg|png|gif';		
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
			// Update Nama User
			$this->account_model->update_data_user();
			// Update Alumni
			$this->account_model->update_data_alumni();
			$this->session->set_flashdata('notification','SUKSES !! Data Anda Berhasil Di Update.');
			redirect(site_url('account/editdata'));			
		}
	}

	public function updateavatar() {		
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();
			$kode = trim($this->session->userdata('nim'));
						
			$config['file_name']    = 'Avatar_'.$kode.'_'.$jam.'.jpg';
			$config['upload_path'] = './avatar/';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
													
			$config['width'] = 100;
			$config['height'] = 100;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		// Update Avatar
		$this->account_model->update_avatar_user();
		$this->session->set_flashdata('notification','SUKSES !! Avatar Anda Berhasil Di Update.');
		redirect(site_url('account/editdata'));	
	}

	public function updatepassword() {
		$this->form_validation->set_rules('oldpassword','<b>Password Lama</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('newpassword','<b>Password Baru</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('confirmpassword','<b>Konfirmasi Password Baru</b>','trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');
			$nim = trim($this->session->userdata('nim'));
			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['fakultas'] = $this->account_model->select_fakultas()->result();
			$data['progdi'] = $this->account_model->select_progdi()->result();			

	    	$this->template_account->display('account_v', $data);
		} else {
			$oldpass = trim($this->input->post('oldpassword', 'true'));
			$newpass = trim($this->input->post('newpassword', 'true'));
			$confirmpassword = trim($this->input->post('confirmpassword', 'true'));

			// Cek Password Lama
			$cekpass = $this->account_model->cek_password(sha1($oldpass))->row();
			$num_pass = count($cekpass);
			if ($num_pass == 0) {				
				$this->session->set_flashdata('notification','MAAF !! Password Lama Anda Salah.');
				redirect(site_url('account/gantipassword'));	
			} elseif ($confirmpassword != $newpass) {
				$this->session->set_flashdata('notification','MAAF !! Konfirmasi Password Tidak Sama.');
				redirect(site_url('account/gantipassword'));
			} else {				
				// Update Password User
				$this->account_model->update_password_user();
				$this->session->set_flashdata('notification','SUKSES !! Password Anda Berhasil Di Update.');
				redirect(site_url('account/gantipassword'));
			}
		}
	}

	public function updatedatawisuda() {
		// Update Judul Wisuda
		$this->account_model->update_data_wisuda();
		$this->session->set_flashdata('notification','SUKSES !! Data Wisuda Anda Berhasil Di Update.');
		redirect(site_url('account/editwisuda'));		
	}	

	public function cetak_kartu() {
		$user_id = $this->session->userdata('user_id');
		$data['detail'] = $this->account_model->select_account($user_id)->row();
		$this->load->view('kartu_alumni', $data);
	}
}
/* Location: ./application/controller/account.php */
?>