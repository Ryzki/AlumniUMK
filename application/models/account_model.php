<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	// Ambil Data Akun Login
	function select_account($user_id) {
		$this->db->select('*');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_users u', 'a.alumni_nim = u.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->join('umk_kegiatan k', 'a.kegiatan_id = k.kegiatan_id', 'left');
		$this->db->where('u.user_id', $user_id);
		
		return $this->db->get();
	}

	// Cek Password Lama
	function cek_password($oldpass) {
		$username = trim($this->session->userdata('username'));

		$this->db->select('*');
		$this->db->from('umk_users');
		$this->db->where('user_username', $username);
		$this->db->where('user_password', $oldpass);
		
		return $this->db->get();
	}

	// Select Fakultas
	function select_fakultas() {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');		
		$this->db->where('fakultas_trash', 0);
		$this->db->where('fakultas_status', 0);
		$this->db->order_by('fakultas_id', 'asc');
		
		return $this->db->get();
	}

	// Select Program Studi
	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi');		
		$this->db->where('progdi_trash', 0);
		$this->db->order_by('progdi_id', 'asc');
		
		return $this->db->get();
	}

	function select_wisuda($nim) {
		$this->db->select('*');
		$this->db->from('umk_wisuda w');
		$this->db->join('umk_alumni a', 'w.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');		
		$this->db->where('w.alumni_nim', $nim);		
		
		return $this->db->get();
	}

	// Kegiatan
	function select_kegiatan() {
		$this->db->select('*');
		$this->db->from('umk_kegiatan');
		$this->db->where('kegiatan_trash', 0);		
		$this->db->order_by('kegiatan_id', 'asc');
		
		return $this->db->get();
	}

	// Jenis Perusahaan
	function select_jenis() {
		$this->db->select('*');
		$this->db->from('umk_jenis_perusahaan');
		$this->db->where('jenis_trash', 0);				
		$this->db->order_by('jenis_id', 'asc');
		
		return $this->db->get();
	}

	// Gaji
	function select_gaji() {
		$this->db->select('*');
		$this->db->from('umk_gaji');
		$this->db->where('gaji_trash', 0);				
		$this->db->order_by('gaji_id', 'asc');
		
		return $this->db->get();
	}

	// Sumber Info
	function select_info() {
		$this->db->select('*');
		$this->db->from('umk_sumber_info');
		$this->db->where('info_trash', 0);				
		$this->db->order_by('info_id', 'asc');
		
		return $this->db->get();
	}

	// Skala
	function select_skala() {
		$this->db->select('*');
		$this->db->from('umk_skala');
		$this->db->where('skala_trash', 0);				
		$this->db->order_by('skala_id', 'asc');
		
		return $this->db->get();
	}

	// Aktifitas
	function select_aktifitas() {
		$this->db->select('*');
		$this->db->from('umk_aktifitas');
		$this->db->where('aktifitas_trash', 0);				
		$this->db->order_by('aktifitas_id', 'asc');
		
		return $this->db->get();
	}

	// Cek Data Perusahaan Akun Login
	function cek_perusahaan($nim) {
		$this->db->select('*');
		$this->db->from('umk_perusahaan p');
		$this->db->join('umk_alumni a', 'p.alumni_nim = a.alumni_nim', 'left');		
		$this->db->where('p.alumni_nim', $nim);		
		
		return $this->db->get();
	}

	// Cek Data Perusahaan Akun Login
	function cek_perusahaan_pertama($nim) {
		$this->db->select('*');
		$this->db->from('umk_perusahaan p');
		$this->db->join('umk_alumni a', 'p.alumni_nim = a.alumni_nim', 'left');		
		$this->db->where('p.alumni_nim', $nim);
		$this->db->where('p.perusahaan_status', 'Pertama');		
		
		return $this->db->get();
	}

	// Cek Data Perusahaan Akun Login
	function cek_perusahaan_sekarang($nim) {
		$this->db->select('*');
		$this->db->from('umk_perusahaan p');
		$this->db->join('umk_alumni a', 'p.alumni_nim = a.alumni_nim', 'left');		
		$this->db->where('p.alumni_nim', $nim);
		$this->db->where('p.perusahaan_status', 'Sekarang');		
		
		return $this->db->get();
	}

	// Ambil Data Perusahaan Akun Login
	function select_perusahaan($nim) {
		$this->db->select('*');
		$this->db->from('umk_perusahaan p');
		$this->db->join('umk_alumni a', 'p.alumni_nim = a.alumni_nim', 'left');		
		$this->db->where('p.alumni_nim', $nim);		
		
		return $this->db->get();
	}

	// Ambil Data Perusahaan Akun Login
	function select_perusahaan_pertama($nim) {
		$this->db->select('*');
		$this->db->from('umk_perusahaan p');
		$this->db->join('umk_alumni a', 'p.alumni_nim = a.alumni_nim', 'left');		
		$this->db->where('p.alumni_nim', $nim);
		$this->db->where('p.perusahaan_status', 'Pertama');
		
		return $this->db->get();
	}

	function select_perusahaan_sekarang($nim) {
		$this->db->select('*');
		$this->db->from('umk_perusahaan p');
		$this->db->join('umk_alumni a', 'p.alumni_nim = a.alumni_nim', 'left');		
		$this->db->where('p.alumni_nim', $nim);
		$this->db->where('p.perusahaan_status', 'Sekarang');
		
		return $this->db->get();
	}

	// Ambil Data Sekolah Akun Login
	function select_sekolah($nim) {
		$this->db->select('*');
		$this->db->from('umk_sekolah s');
		$this->db->join('umk_alumni a', 's.alumni_nim = a.alumni_nim', 'left');		
		$this->db->where('s.alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Ambil Data Usaha Akun Login
	function select_usaha($nim) {
		$this->db->select('*');
		$this->db->from('umk_usaha u');
		$this->db->join('umk_alumni a', 'u.alumni_nim = a.alumni_nim', 'left');		
		$this->db->where('u.alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Ambil Data Belum Kerja Akun Login
	function select_belumkerja($nim) {
		$this->db->select('*');
		$this->db->from('umk_belumkerja b');
		$this->db->join('umk_alumni a', 'b.alumni_nim = a.alumni_nim', 'left');		
		$this->db->where('b.alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Proses Update Data Nama Lengkap User
	function update_data_user() {
		$user_id = $this->session->userdata('user_id');
		$data = array(
					'user_name' => ucwords(trim($this->input->post('nama', 'true')))
				);		
		$this->db->where('user_id', $user_id);
		$this->db->update('umk_users', $data);
	}

	// Proses Update Avatar
	function update_avatar_user() {
		$user_id = $this->session->userdata('user_id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array('user_avatar' => $this->upload->file_name);	
		}		
		$this->db->where('user_id', $user_id);
		$this->db->update('umk_users', $data);
	}

	// Proses Update Data Password User Login dan Avatar
	function update_password_user() {
		$user_id = $this->session->userdata('user_id');
		$data = array('user_password' => trim(sha1($this->input->post('newpassword', 'true'))));

		$this->db->where('user_id', $user_id);
		$this->db->update('umk_users', $data);
	}

	// Update Data Alumni
	function update_data_alumni() {
		$nim = trim($this->session->userdata('nim'));		
		
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'alumni_tentang' => trim($this->input->post('tentang', 'true')),
					'alumni_nama' => ucwords(trim($this->input->post('nama', 'true'))),
					'alumni_tmpt_lhr' => ucwords(trim($this->input->post('tempat', 'true'))),
					'alumni_tgl_lhr' => $this->input->post('tgl_lahir', 'true'),
					'alumni_jk' => $this->input->post('lstJK', 'true'),
					'alumni_status_hidup' => $this->input->post('lstStatus', 'true'),
					'alumni_agama' => $this->input->post('lstAgama', 'true'),				
					'alumni_alamat' => trim($this->input->post('alamat', 'true')),
		    		'alumni_hp' => trim($this->input->post('hp', 'true')),
		    		'alumni_pin_bb' => strtoupper($this->input->post('pin', 'true')),
		    		'alumni_fb' => trim($this->input->post('fb', 'true')),
		    		'alumni_ortu' => trim($this->input->post('ortu', 'true')),
		    		'alumni_kerja_ortu' => trim($this->input->post('kerja_ortu', 'true')),
		    		'alumni_alamat_ortu' => trim($this->input->post('alamat_ortu', 'true')),
		    		'alumni_hp_ortu' => trim($this->input->post('telp_ortu', 'true')),
		    		'fakultas_id' => $this->input->post('lstFakultas', 'true'),
		    		'progdi_id' => $this->input->post('lstProgdi', 'true'),
		    		'alumni_tgl_masuk' => $this->input->post('tgl_masuk', 'true'),
		    		'alumni_tgl_lulus' => $this->input->post('tgl_lulus', 'true'),
		    		'alumni_foto' => $this->upload->file_name,
		    		'alumni_tgl_update' => date('Y-m-d'),
	    			'alumni_jam_update' => date('Y-m-d H:i:s')
			);
		} else {
			$data = array(
					'alumni_tentang' => trim($this->input->post('tentang', 'true')),
					'alumni_nama' => ucwords(trim($this->input->post('nama', 'true'))),
					'alumni_tmpt_lhr' => ucwords(trim($this->input->post('tempat', 'true'))),
					'alumni_tgl_lhr' => $this->input->post('tgl_lahir', 'true'),
					'alumni_jk' => $this->input->post('lstJK', 'true'),
					'alumni_status_hidup' => $this->input->post('lstStatus', 'true'),
					'alumni_agama' => $this->input->post('lstAgama', 'true'),				
					'alumni_alamat' => trim($this->input->post('alamat', 'true')),
		    		'alumni_hp' => trim($this->input->post('hp', 'true')),
		    		'alumni_pin_bb' => strtoupper($this->input->post('pin', 'true')),
		    		'alumni_fb' => trim($this->input->post('fb', 'true')),
		    		'alumni_ortu' => trim($this->input->post('ortu', 'true')),
		    		'alumni_kerja_ortu' => trim($this->input->post('kerja_ortu', 'true')),
		    		'alumni_alamat_ortu' => trim($this->input->post('alamat_ortu', 'true')),
		    		'fakultas_id' => $this->input->post('lstFakultas', 'true'),
		    		'progdi_id' => $this->input->post('lstProgdi', 'true'),
		    		'alumni_tgl_masuk' => $this->input->post('tgl_masuk', 'true'),
		    		'alumni_tgl_lulus' => $this->input->post('tgl_lulus', 'true'),
		    		'alumni_tgl_update' => date('Y-m-d'),
	    			'alumni_jam_update' => date('Y-m-d H:i:s')
			);
		}		

		$this->db->where('alumni_nim', $nim);
		$this->db->update('umk_alumni', $data);
	}
	
	function cek_data_wisuda() {
		$nim = trim($this->session->userdata('nim'));
		$this->db->select('*');
		$this->db->from('umk_wisuda');		
		$this->db->where('alumni_nim', $nim);
		
		return $this->db->get();
	}

	// Proses Update Data User Login
	function update_data_wisuda() {
		$wisuda_id = $this->input->post('wisuda_id');
		$data = array(
					'wisuda_judulproyek' => ucwords(trim($this->input->post('judul', 'true')))
				);		
		$this->db->where('wisuda_id', $wisuda_id);
		$this->db->update('umk_wisuda', $data);
	}

	// Proses Update Data Kegiatan Alumni
	function update_data_kegiatan() {
		$alumni_nim = $this->session->userdata('nim');
		$data = array(
					'kegiatan_id' => $this->input->post('lstKegiatan', 'true')
				);		
		$this->db->where('alumni_nim', $alumni_nim);
		$this->db->update('umk_alumni', $data);
	}

	// Update Nilai Skala Relevansi
	function update_data_skala() {	
		$nim = trim($this->session->userdata('nim'));	

		$data = array(
				'skala_id' => $this->input->post('rdSkala', 'true')
		);

		$this->db->where('alumni_nim', $nim);
		$this->db->update('umk_alumni', $data);
	}

	// Add Data Perusahaan Baru Pertama Alumni
	function insert_data_perusahaan_pertama() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'perusahaan_name' => ucwords(trim($this->input->post('nama', 'true'))),
				'perusahaan_alamat' => trim($this->input->post('alamat', 'true')),
    			'perusahaan_web' => trim($this->input->post('web', 'true')),
    			'jenis_id' => $this->input->post('lstJenis', 'true'),
    			'perusahaan_lain' => trim($this->input->post('lain', 'true')),
    			'perusahaan_tgl_masuk' => $this->input->post('tgl_masuk', 'true'),
    			'perusahaan_posisi' => trim($this->input->post('posisi', 'true')),
				'gaji_id' => $this->input->post('rdGaji', 'true'),
				'info_id' => $this->input->post('rdInfo', 'true'),
    			'perusahaan_catatan' => trim($this->input->post('catatan', 'true')),
    			'perusahaan_status' => 'Pertama',
    			'perusahaan_date_update' => date('Y-m-d'),
	    		'perusahaan_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_perusahaan', $data);
	}

	// Add Data Perusahaan Baru Sekarang Alumni
	function insert_data_perusahaan_sekarang() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),							
				'perusahaan_name' => ucwords(trim($this->input->post('nama', 'true'))),
				'perusahaan_alamat' => trim($this->input->post('alamat', 'true')),
    			'perusahaan_web' => trim($this->input->post('web', 'true')),
    			'jenis_id' => $this->input->post('lstJenis', 'true'),
    			'perusahaan_lain' => trim($this->input->post('lain', 'true')),
    			'perusahaan_tgl_masuk' => $this->input->post('tgl_masuk', 'true'),
    			'perusahaan_posisi' => trim($this->input->post('posisi', 'true')),
				'gaji_id' => $this->input->post('rdGaji', 'true'),
				'info_id' => $this->input->post('rdInfo', 'true'),
    			'perusahaan_catatan' => trim($this->input->post('catatan', 'true')),
    			'perusahaan_status' => 'Sekarang',
    			'perusahaan_date_update' => date('Y-m-d'),
	    		'perusahaan_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_perusahaan', $data);
	}

	// Update Data Perusahaan Alumni Login
	function update_data_perusahaan() {		
		$perusahaan_id = $this->input->post('perusahaan_id', 'true');

		$data = array(				
				'perusahaan_name' => ucwords(trim($this->input->post('nama', 'true'))),
				'perusahaan_alamat' => trim($this->input->post('alamat', 'true')),
    			'perusahaan_web' => trim($this->input->post('web', 'true')),
    			'jenis_id' => $this->input->post('lstJenis', 'true'),
    			'perusahaan_lain' => trim($this->input->post('lain', 'true')),
    			'perusahaan_tgl_masuk' => $this->input->post('tgl_masuk', 'true'),
    			'perusahaan_posisi' => trim($this->input->post('posisi', 'true')),
				'gaji_id' => $this->input->post('rdGaji', 'true'),
				'info_id' => $this->input->post('rdInfo', 'true'),
    			'perusahaan_catatan' => trim($this->input->post('catatan', 'true')),
    			'perusahaan_date_update' => date('Y-m-d'),
	    		'perusahaan_time_update' => date('Y-m-d H:i:s')
		);
		
		$this->db->where('perusahaan_id', $perusahaan_id);
		$this->db->update('umk_perusahaan', $data);
	}	

	// Insert Data Sekolah ALumni Login
	function insert_data_sekolah() {
			$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),
				'sekolah_name' => ucwords(trim($this->input->post('nama', 'true'))),
				'sekolah_alamat' => trim($this->input->post('alamat', 'true')),
				'sekolah_jenjang' => trim($this->input->post('jenjang', 'true')),
				'sekolah_tgl_msk' => $this->input->post('tgl_masuk', 'true'),
				'sekolah_jurusan' => trim($this->input->post('jurusan', 'true')),
				'sekolah_date_update' => date('Y-m-d'),
	    		'sekolah_time_update' => date('Y-m-d H:i:s') 
			);		
		
		$this->db->insert('umk_sekolah', $data);
	}

	// Update Data Sekolah Alumni Login
	function update_data_sekolah() {
		$sekolah_id = $this->input->post('sekolah_id', 'true');

		$data = array(
			'sekolah_name' => ucwords(trim($this->input->post('nama', 'true'))),
			'sekolah_alamat' => trim($this->input->post('alamat', 'true')),
			'sekolah_jenjang' => trim($this->input->post('jenjang', 'true')),
			'sekolah_tgl_msk' => $this->input->post('tgl_masuk', 'true'),
			'sekolah_jurusan' => trim($this->input->post('jurusan', 'true')),
			'sekolah_date_update' => date('Y-m-d'),
	    	'sekolah_time_update' => date('Y-m-d H:i:s') 
		);		

		$this->db->where('sekolah_id', $sekolah_id);
		$this->db->update('umk_sekolah', $data);
	}

	// Insert Data Usaha
	function insert_data_usaha() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),				 			   					
				'usaha_name' => ucwords(trim($this->input->post('nama', 'true'))),
				'usaha_seo' => seo_title(trim($this->input->post('nama', 'true'))),
				'usaha_tgl_berdiri' => $this->input->post('tgl_berdiri', 'true'),
				'usaha_alamat' => trim($this->input->post('alamat', 'true')),
    			'usaha_web' => trim($this->input->post('web', 'true')),
    			'usaha_bidang' => trim($this->input->post('bidang', 'true')),
    			'usaha_jml_karyawan' => $this->input->post('jumlah', 'true'),
    			'usaha_omzet' => $this->input->post('omzet', 'true'),
    			'usaha_pengeluaran' => $this->input->post('pengeluaran', 'true')    			
		);
				
		$this->db->insert('umk_usaha', $data);
	}

	// Update Data Usaha
	function update_data_usaha() {		
		$usaha_id = $this->input->post('usaha_id', 'true');		

		$data = array(				 			   					
				'usaha_name' => ucwords(trim($this->input->post('nama', 'true'))),
				'usaha_seo' => seo_title(trim($this->input->post('nama', 'true'))),
				'usaha_tgl_berdiri' => $this->input->post('tgl_berdiri', 'true'),
				'usaha_alamat' => trim($this->input->post('alamat', 'true')),
    			'usaha_web' => trim($this->input->post('web', 'true')),
    			'usaha_bidang' => trim($this->input->post('bidang', 'true')),
    			'usaha_jml_karyawan' => $this->input->post('jumlah', 'true'),
    			'usaha_omzet' => $this->input->post('omzet', 'true'),
    			'usaha_pengeluaran' => $this->input->post('pengeluaran', 'true')    			
		);
		
		$this->db->where('usaha_id', $usaha_id);
		$this->db->update('umk_usaha', $data);
	}

	// Insert Data Belum Kerja ALumni Login
	function insert_data_belumkerja() {
		$data = array(
				'alumni_nim' => trim($this->session->userdata('nim')),									 			   			
				'aktifitas_id' => $this->input->post('rdAktifitas', 'true'),
				'kerja_lain' => trim($this->input->post('lain', 'true')),
				'kerja_saran1' => trim($this->input->post('saran1', 'true')),
    			'kerja_saran2' => trim($this->input->post('saran2', 'true')),
    			'kerja_notif_email' => $this->input->post('chkEmail', 'true'),
    			'kerja_notif_sms' => $this->input->post('chkSMS', 'true')  	
		);
				
		$this->db->insert('umk_belumkerja', $data);
	}

	// Update Data Belum Kerja Alumni Login
	function update_data_belumkerja() {		
		$kerja_id = $this->input->post('kerja_id', 'true');	

		$data = array(				 			   		
				'aktifitas_id' => $this->input->post('rdAktifitas', 'true'),
				'kerja_lain' => trim($this->input->post('lain', 'true')),
				'kerja_saran1' => trim($this->input->post('saran1', 'true')),
    			'kerja_saran2' => trim($this->input->post('saran2', 'true')),
    			'kerja_notif_email' => $this->input->post('chkEmail', 'true'),
    			'kerja_notif_sms' => $this->input->post('chkSMS', 'true')  	
		);
		
		$this->db->where('kerja_id', $kerja_id);
		$this->db->update('umk_belumkerja', $data);
	}

	function update_logo_usaha() {
		$usaha_id     = $this->input->post('usaha_id', 'true');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'usaha_logo' => $this->upload->file_name,
					'usaha_desc' => trim($this->input->post('desc', 'true')),
					'usaha_iklan' => $this->input->post('chkKet', 'true')					
				);
		} else {
			$data = array(
					'usaha_desc' => trim($this->input->post('desc', 'true')),					
					'usaha_iklan' => $this->input->post('chkKet', 'true')
				);
		}
		
		$this->db->where('usaha_id', $usaha_id);
		$this->db->update('umk_usaha', $data);
	}

	function insert_invoice() {
		$StartingDate = date('Y-m-d');
		$newEndingDate = date('Y-m-d', strtotime(date('Y-m-d', strtotime($StartingDate)).'+ 365 days'));

		$data = array(
				'usaha_id' => $this->input->post('usaha_id', 'true'),		
    			'invoice_tanggal' => date('Y-m-d'),
    			'invoice_expired' => $newEndingDate,
    			'invoice_total' => 50000
				);
		
		$this->db->insert('umk_invoice', $data);
	}

	function cek_invoice_gantung($usaha_id) {
		$tgl = date('Y-m-d');

		$this->db->select('*');
		$this->db->from('umk_invoice');		
		$this->db->where('usaha_id', $usaha_id);
		$this->db->where('invoice_status', 0);		
		$this->db->where('invoice_expired >', $tgl);

		return $this->db->get();
	}

	function cek_invoice_aktif($usaha_id) {
		$tgl = date('Y-m-d');

		$this->db->select('*');
		$this->db->from('umk_invoice');		
		$this->db->where('usaha_id', $usaha_id);
		$this->db->where('invoice_status', 1);		
		$this->db->where('invoice_expired >', $tgl);

		return $this->db->get();
	}

	function select_invoice($usaha_id) {
		$this->db->select('*');
		$this->db->from('umk_invoice');
		$this->db->where('usaha_id', $usaha_id);
		$this->db->order_by('invoice_tanggal', 'desc');
		
		return $this->db->get();
	}
}
/* Location: ./application/model/account_model.php */
?>