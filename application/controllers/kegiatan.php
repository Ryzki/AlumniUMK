<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends CI_Controller{
	public function __construct(){
		parent::__construct();		
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
		$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();		
		// Cek Perusahaan Pertama
		$data['pertama'] = $this->account_model->cek_perusahaan_pertama($nim)->row();
		// Cek Perusahaan Sekarang
		$data['sekarang'] = $this->account_model->cek_perusahaan_sekarang($nim)->row();		

		$data['jenis'] = $this->account_model->select_jenis()->result();
		$data['gaji'] = $this->account_model->select_gaji()->result();
		$data['info'] = $this->account_model->select_info()->result();	
		$data['skala'] = $this->account_model->select_skala()->result();
		$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

		$data['perusahaanpertama'] = $this->account_model->select_perusahaan_pertama($nim)->row();
		$data['perusahaansekarang'] = $this->account_model->select_perusahaan_sekarang($nim)->row();
		$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
		$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
		$data['usaha'] = $this->account_model->select_usaha($nim)->row();

    	$this->template_account->display('kegiatan_v', $data);
	}
	
	public function updatekegiatan() {								
		$this->account_model->update_data_kegiatan();
		$this->session->set_flashdata('notification','SUKSES !! Data Kegiatan Anda Berhasil Di Update.');
		redirect(site_url('kegiatan'));		
	}

	public function insertperusahaanpertama() { // Pekerjaan Pertama Alumni		
		$this->form_validation->set_rules('nama','<b>Nama Perusahaan</b>','trim|required|max_length[50]|xss_clean');						
		$this->form_validation->set_rules('alamat','<b>Alamat Perusahaan</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('web','<b>Web Perusahaan</b>','trim|xss_clean');
		$this->form_validation->set_rules('lstJenis','<b>Jenis Perusahaan</b>','required|xss_clean');
		$this->form_validation->set_rules('lain','<b>Lain</b>','trim|xss_clean');
		$this->form_validation->set_rules('tgl_masuk','<b>Tgl. Masuk Kerja</b>','required|xss_clean');
		$this->form_validation->set_rules('posisi','<b>Posisi Bekerja</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('rdGaji','<b>Gaji Pertama</b>','required|xss_clean');
		$this->form_validation->set_rules('rdInfo','<b>Sumber Info</b>','required|xss_clean');
		$this->form_validation->set_rules('rdSkala','<b>Skala Relevansi</b>','required|xss_clean');
		$this->form_validation->set_rules('catatan','<b>Mata Kuliah</b>','trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');

			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();
			// Cek Perusahaan Pertama
			$data['pertama'] = $this->account_model->cek_perusahaan_pertama($nim)->row();
			// Cek Perusahaan Sekarang
			$data['sekarang'] = $this->account_model->cek_perusahaan_sekarang($nim)->row();		

			$data['jenis'] = $this->account_model->select_jenis()->result();
			$data['gaji'] = $this->account_model->select_gaji()->result();
			$data['info'] = $this->account_model->select_info()->result();	
			$data['skala'] = $this->account_model->select_skala()->result();
			$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

			$data['perusahaanpertama'] = $this->account_model->select_perusahaan_pertama($nim)->row();
			$data['perusahaansekarang'] = $this->account_model->select_perusahaan_sekarang($nim)->row();
			$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
			$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();

	    	$this->template_account->display('kegiatan_v', $data);
		} else {
			// Update Skala Relevansi Alumni
			$this->account_model->update_data_skala();
			// Insert Data Perusahaan
			$this->account_model->insert_data_perusahaan_pertama();		
			$this->session->set_flashdata('notification','SUKSES !! Data Pekerjaan Anda Berhasil Di Simpan.');
			redirect(site_url('kegiatan'));			
		}
	}

	public function insertperusahaansekarang() { // Pekerjaan Sekarang Alumni		
		$this->form_validation->set_rules('nama','<b>Nama Perusahaan</b>','trim|required|max_length[50]|xss_clean');						
		$this->form_validation->set_rules('alamat','<b>Alamat Perusahaan</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('web','<b>Web Perusahaan</b>','trim|xss_clean');
		$this->form_validation->set_rules('lstJenis','<b>Jenis Perusahaan</b>','required|xss_clean');
		$this->form_validation->set_rules('lain','<b>Lain</b>','trim|xss_clean');
		$this->form_validation->set_rules('tgl_masuk','<b>Tgl. Masuk Kerja</b>','required|xss_clean');
		$this->form_validation->set_rules('posisi','<b>Posisi Bekerja</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('rdGaji','<b>Gaji Pertama</b>','required|xss_clean');
		$this->form_validation->set_rules('rdInfo','<b>Sumber Info</b>','required|xss_clean');
		$this->form_validation->set_rules('rdSkala','<b>Skala Relevansi</b>','required|xss_clean');
		$this->form_validation->set_rules('catatan','<b>Mata Kuliah</b>','trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');

			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();
			// Cek Perusahaan Pertama
			$data['pertama'] = $this->account_model->cek_perusahaan_pertama($nim)->row();
			// Cek Perusahaan Sekarang
			$data['sekarang'] = $this->account_model->cek_perusahaan_sekarang($nim)->row();		

			$data['jenis'] = $this->account_model->select_jenis()->result();
			$data['gaji'] = $this->account_model->select_gaji()->result();
			$data['info'] = $this->account_model->select_info()->result();	
			$data['skala'] = $this->account_model->select_skala()->result();
			$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

			$data['perusahaanpertama'] = $this->account_model->select_perusahaan_pertama($nim)->row();
			$data['perusahaansekarang'] = $this->account_model->select_perusahaan_sekarang($nim)->row();
			$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
			$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();

	    	$this->template_account->display('kegiatan_v', $data);
		} else {
			// Update Skala Relevansi Alumni
			$this->account_model->update_data_skala();
			// Insert Data Perusahaan
			$this->account_model->insert_data_perusahaan_sekarang();		
			$this->session->set_flashdata('notification','SUKSES !! Data Pekerjaan Anda Berhasil Di Simpan.');
			redirect(site_url('kegiatan'));			
		}
	}

	public function updateperusahaan() {		
		$this->form_validation->set_rules('nama','<b>Nama Perusahaan</b>','trim|required|max_length[50]|xss_clean');						
		$this->form_validation->set_rules('alamat','<b>Alamat Perusahaan</b>','required|xss_clean');
		$this->form_validation->set_rules('web','<b>Web Perusahaan</b>','trim|xss_clean');
		$this->form_validation->set_rules('lstJenis','<b>Jenis Perusahaan</b>','required|xss_clean');
		$this->form_validation->set_rules('lain','<b>Lain</b>','trim|xss_clean');
		$this->form_validation->set_rules('tgl_masuk','<b>Tgl. Masuk Kerja</b>','required|xss_clean');
		$this->form_validation->set_rules('posisi','<b>Posisi Bekerja</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('rdGaji','<b>Gaji Pertama</b>','required|xss_clean');
		$this->form_validation->set_rules('rdInfo','<b>Sumber Info</b>','required|xss_clean');
		$this->form_validation->set_rules('rdSkala','<b>Skala Relevansi</b>','required|xss_clean');
		$this->form_validation->set_rules('catatan','<b>Mata Kuliah</b>','trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');

			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();
			// Cek Perusahaan Pertama
			$data['pertama'] = $this->account_model->cek_perusahaan_pertama($nim)->row();
			// Cek Perusahaan Sekarang
			$data['sekarang'] = $this->account_model->cek_perusahaan_sekarang($nim)->row();		

			$data['jenis'] = $this->account_model->select_jenis()->result();
			$data['gaji'] = $this->account_model->select_gaji()->result();
			$data['info'] = $this->account_model->select_info()->result();	
			$data['skala'] = $this->account_model->select_skala()->result();
			$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

			$data['perusahaanpertama'] = $this->account_model->select_perusahaan_pertama($nim)->row();
			$data['perusahaansekarang'] = $this->account_model->select_perusahaan_sekarang($nim)->row();
			$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
			$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();

	    	$this->template_account->display('kegiatan_v', $data);
		} else {
			// Update Skala Relevansi Alumni
			$this->account_model->update_data_skala();
			// Update Perusahaan Pertama
			$this->account_model->update_data_perusahaan();		
			$this->session->set_flashdata('notification','SUKSES !! Data Pekerjaan Anda Berhasil Di Update.');
			redirect(site_url('kegiatan'));			
		}
	}

	public function insertsekolah() {		
		$this->form_validation->set_rules('nama','<b>Nama Universitas</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('alamat','<b>Alamat Universitas</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('jenjang','<b>Jenjang</b>','trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('tgl_masuk','<b>Tgl. Masuk</b>','required|xss_clean');
		$this->form_validation->set_rules('jurusan','<b>Jurusan</b>','trim|required|max_length[50]|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');

			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();
			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['jenis'] = $this->account_model->select_jenis()->result();
			$data['gaji'] = $this->account_model->select_gaji()->result();
			$data['info'] = $this->account_model->select_info()->result();	
			$data['skala'] = $this->account_model->select_skala()->result();
			$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
			$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();

	    	$this->template_account->display('kegiatan_v', $data);
		} else {
			// Insert Data Sekolah
			$this->account_model->insert_data_sekolah();
			$this->session->set_flashdata('notification','SUKSES !! Data Sekolah Anda Berhasil Di Simpan.');
			redirect(site_url('kegiatan'));			
		}
	}

	public function updatesekolah() {		
		$this->form_validation->set_rules('nama','<b>Nama Universitas</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('alamat','<b>Alamat Universitas</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('jenjang','<b>Jenjang</b>','trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('tgl_masuk','<b>Tgl. Masuk</b>','required|xss_clean');
		$this->form_validation->set_rules('jurusan','<b>Jurusan</b>','trim|required|max_length[50]|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');

			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();
			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['jenis'] = $this->account_model->select_jenis()->result();
			$data['gaji'] = $this->account_model->select_gaji()->result();
			$data['info'] = $this->account_model->select_info()->result();	
			$data['skala'] = $this->account_model->select_skala()->result();
			$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
			$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();

	    	$this->template_account->display('kegiatan_v', $data);
		} else {
			// Update Data Sekolah
			$this->account_model->update_data_sekolah();
			$this->session->set_flashdata('notification','SUKSES !! Data Sekolah Anda Berhasil Di Update.');
			redirect(site_url('kegiatan'));
		}
	}

	public function insertbelumkerja() {		
		$this->form_validation->set_rules('rdAktifitas','<b>Kegiatan</b>','required|xss_clean');
		$this->form_validation->set_rules('lain','','trim|xss_clean');
		$this->form_validation->set_rules('saran1','<b>Saran</b>','required|min_length[10]|xss_clean');
		$this->form_validation->set_rules('saran2','<b>Saran Perbaikan</b>','required|min_length[10]|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');

			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();
			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['jenis'] = $this->account_model->select_jenis()->result();
			$data['gaji'] = $this->account_model->select_gaji()->result();
			$data['info'] = $this->account_model->select_info()->result();	
			$data['skala'] = $this->account_model->select_skala()->result();
			$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
			$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();

	    	$this->template_account->display('kegiatan_v', $data);
		} else {					
			// Insert Data Belum Kerja
			$this->account_model->insert_data_belumkerja();
			$this->session->set_flashdata('notification','SUKSES !! Data Kegiatan Anda Berhasil Di Simpan.');
			redirect(site_url('kegiatan'));		
		}
	}

	public function updatebelumkerja() {		
		$this->form_validation->set_rules('rdAktifitas','<b>Kegiatan</b>','required|xss_clean');
		$this->form_validation->set_rules('lain','','trim|xss_clean');
		$this->form_validation->set_rules('saran1','<b>Saran</b>','required|min_length[10]|xss_clean');
		$this->form_validation->set_rules('saran2','<b>Saran Perbaikan</b>','required|min_length[10]|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');

			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();
			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['jenis'] = $this->account_model->select_jenis()->result();
			$data['gaji'] = $this->account_model->select_gaji()->result();
			$data['info'] = $this->account_model->select_info()->result();	
			$data['skala'] = $this->account_model->select_skala()->result();
			$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
			$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();

	    	$this->template_account->display('kegiatan_v', $data);
		} else {
			// Update Data Belum Kerja					
			$this->account_model->update_data_belumkerja();
			$this->session->set_flashdata('notification','SUKSES !! Data Kegiatan Anda Berhasil Di Update.');
			redirect(site_url('kegiatan'));		
		}
	}

	public function insertusaha() {		
		$this->form_validation->set_rules('nama','<b>Nama Perusahaan</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('alamat','<b>Alamat Perusahaan</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('web','<b>Web Perusahaan</b>','max_length[50]|xss_clean');
		$this->form_validation->set_rules('bidang','<b>Bidang Usaha</b>','required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('jumlah','<b>Jumlah Karyawan</b>','required|integer|max_length[5]|xss_clean');
		$this->form_validation->set_rules('omzet','<b>Omzet /Bulan</b>','required|integer|max_length[10]|xss_clean');
		$this->form_validation->set_rules('pengeluaran','<b>Pengeluaran /Bulan</b>','required|integer|max_length[10]|xss_clean');	
		$this->form_validation->set_rules('tgl_berdiri','<b>Tanggal Berdiri</b>','required|xss_clean');	
		$this->form_validation->set_rules('rdSkala','<b>Skala Relevansi</b>','required|xss_clean');		
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');

			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();
			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['jenis'] = $this->account_model->select_jenis()->result();
			$data['gaji'] = $this->account_model->select_gaji()->result();
			$data['info'] = $this->account_model->select_info()->result();	
			$data['skala'] = $this->account_model->select_skala()->result();
			$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
			$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();

	    	$this->template_account->display('kegiatan_v', $data);
		} else {
			// Update Skala Relevansi Alumni
			$this->account_model->update_data_skala();
			// Insert Data Usaha Alumni
			$this->account_model->insert_data_usaha();
			$this->session->set_flashdata('notification','SUKSES !! Data Kegiatan Anda Berhasil Di Simpan.');
			redirect(site_url('kegiatan'));		
		}
	}


	public function updateusaha() {		
		$this->form_validation->set_rules('nama','<b>Nama Perusahaan</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('alamat','<b>Alamat Perusahaan</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('web','<b>Web Perusahaan</b>','max_length[50]|xss_clean');
		$this->form_validation->set_rules('bidang','<b>Bidang Usaha</b>','required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('jumlah','<b>Jumlah Karyawan</b>','required|integer|max_length[5]|xss_clean');
		$this->form_validation->set_rules('omzet','<b>Omzet /Bulan</b>','required|integer|max_length[10]|xss_clean');
		$this->form_validation->set_rules('pengeluaran','<b>Pengeluaran /Bulan</b>','required|integer|max_length[10]|xss_clean');	
		$this->form_validation->set_rules('tgl_berdiri','<b>Tanggal Berdiri</b>','required|xss_clean');	
		$this->form_validation->set_rules('rdSkala','<b>Skala Relevansi</b>','required|xss_clean');			
				
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');

			$data['akun'] = $this->account_model->select_account($user_id)->row();
			$data['daftar_kegiatan'] = $this->account_model->select_kegiatan()->result();
			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['jenis'] = $this->account_model->select_jenis()->result();
			$data['gaji'] = $this->account_model->select_gaji()->result();
			$data['info'] = $this->account_model->select_info()->result();	
			$data['skala'] = $this->account_model->select_skala()->result();
			$data['aktifitas'] = $this->account_model->select_aktifitas()->result();

			$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
			$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
			$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();

	    	$this->template_account->display('kegiatan_v', $data);
		} else {
			echo $this->input->post('tgl_berdiri', 'true');
			// Update Skala Relevansi Alumni
			$this->account_model->update_data_skala();
			// Update Data Usaha Alumni
			$this->account_model->update_data_usaha();

			$this->session->set_flashdata('notification','SUKSES !! Data Kegiatan Anda Berhasil Di Update.');
			redirect(site_url('kegiatan'));		
		}
	}

	public function updatelogousaha() {		
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();
			$nim = $this->session->userdata('nim');
				
			$config['file_name']    = 'Logo_'.$kode.'_'.$jam.'.jpg';
			$config['upload_path'] = './logo/';
			$config['allowed_types'] = 'jpg|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
										
			$config['width'] = 300;
			$config['height'] = 250;
			$this->load->library('image_lib',$config);
				 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';			
		}

		// Update Logo dan Deskripsi Usaha
		$this->account_model->update_logo_usaha();

		$usaha_id     = $this->input->post('usaha_id', 'TRUE');
		// Cek apakah ada Invoice yang masih belum terbayar ?
		$cek_invoice_gantung = $this->account_model->cek_invoice_gantung($usaha_id)->row();
		$cek_data_gantung = count($cek_invoice_gantung);
		
		if ($cek_data_gantung == 0) {
			// Cek apakah sudah ada Invoice Aktif terbayar dan Tgl Expirednya setelah tgl sekarang ??
			$cek_invoice_aktif = $this->account_model->cek_invoice_aktif($usaha_id)->row();
			$cek_data_aktif = count($cek_invoice_aktif);			

			if ($cek_data_aktif == 0) {
				// Simpan data Invoice Baru
				$this->account_model->insert_invoice();
				// ID Invoice Baru
				/*$invoice_id = $this->db->insert_id();
				
				$StartingDate = date('Y-m-d');
				$newEndingDate = date('Y-m-d', strtotime(date('Y-m-d', strtotime($StartingDate)).'+ 365 days'));
								
				$recepient_email = $this->input->post('alumni_email', 'TRUE'); // Email Alumni Baru
				$recepient_cc = 'manggar07@gmail.com';
				$recepient_bcc = '22manly@gmail.com';
				
				$sender_subject = 'Invoice - Tracer Teknik UMK';
				$sender_msg  = 'Invoice Iklan Usaha Anda :'."\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= 'Detail Invoice Anda '."\r\n";				
				$sender_msg .= 'No. Invoce : #'.$invoice_id."\r\n";
				$sender_msg .= 'Tanggal Invoice :'.$StartingDate."\r\n";
				$sender_msg .= 'Tanggal Expired :'.$newEndingDate."\r\n";
				$sender_msg .= 'Total : Rp. 50.000,-'."\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= 'Sincerelly,'. "\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= "\r\n";
				$sender_msg .= 'Admin Tracer Teknik';
							
				$sender_name = 'Admin Tracer Teknik';
				$sender_email = 'alumni.teknikumk@gmail.com';
		 	
				$this->email->from($sender_email, $sender_name);
				$this->email->to($recepient_email);
		 
				if ($recepient_cc != '') {
					$this->email->cc($recepient_cc);
				}
				
				if ($recepient_bcc != '') {
					$this->email->bcc($recepient_bcc);
				}
				
				$this->email->subject($sender_subject);
				$this->email->message($sender_msg);
		 
				$this->email->send(); */				
			}	
		}
						
 		$this->session->set_flashdata('notification','SUKSES !! Data Usaha Anda Berhasil Di Update.');
		redirect(site_url('kegiatan'));							
	}

}
/* Location: ./application/controller/kegiatan.php */
?>