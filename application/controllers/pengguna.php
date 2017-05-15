<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('curl');		
		$this->load->library('template_fo');
		$this->load->model('pengguna_model');
		$this->load->model('menu_model');        
	}
	
	public function index() {
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();

    	$this->template_fo->display('pengguna_v', $data);
	}

	public function create_image(){
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
	}

	public function savedata () {		
		$this->form_validation->set_rules('txtNama','<b>Nama</b>','trim|required|max_length[50]|xss_clean');		
		$this->form_validation->set_rules('txtJabatan','<b>Jabatan</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('txtEmail','<b>Email</b>','trim|required|max_length[30]|valid_email|xss_clean');		
		$this->form_validation->set_rules('txtHP','<b>No. Handphone</b>','trim|required|max_length[30]|xss_clean');
		$this->form_validation->set_rules('txtNamaPerus','<b>Nama Perusahaan</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('txtBidang','<b>Bidang Usaha</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('txtAlamat','<b>Alamat</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('txtTelp','<b>No. Telp</b>','trim|required|max_length[30]|xss_clean');
		$this->form_validation->set_rules('txtFax','<b>No. Fax</b>','trim|required|max_length[30]|xss_clean');
		$this->form_validation->set_rules('txtWebsite','','trim|xss_clean');
		$this->form_validation->set_rules('lstJmlLulus','<b>Jumlah Lulusan</b>','required|xss_clean');
		$this->form_validation->set_rules('lstMsKerja','<b>Masa Kerja</b>','required|xss_clean');
		$this->form_validation->set_rules('lstGajiAwal','<b>Gaji Awal</b>','required|xss_clean');
		$this->form_validation->set_rules('lstIPK','<b>IPK</b>','required|xss_clean');
		// Radio Button
		$this->form_validation->set_rules('rdDisiplin','<b>Dispilin</b>','required|xss_clean');
		$this->form_validation->set_rules('rdJujur','<b>Kejujuran</b>','required|xss_clean');
		$this->form_validation->set_rules('rdMotivasi','<b>Motivasi</b>','required|xss_clean');
		$this->form_validation->set_rules('rdEtos','<b>Etos</b>','required|xss_clean');
		$this->form_validation->set_rules('rdKeahlian','<b>Keahlian</b>','required|xss_clean');
		$this->form_validation->set_rules('rdProduktivitas','<b>Produktivitas</b>','required|xss_clean');
		$this->form_validation->set_rules('rdInovasi','<b>Inovasi</b>','required|xss_clean');
		$this->form_validation->set_rules('rdSolusi','<b>Solusi</b>','required|xss_clean');
		$this->form_validation->set_rules('rdAdaptasi','<b>Adaptasi</b>','required|xss_clean');
		$this->form_validation->set_rules('rdTanggap','<b>Tanggap</b>','required|xss_clean');
		$this->form_validation->set_rules('rdEmosi','<b>Emosi</b>','required|xss_clean');
		$this->form_validation->set_rules('rdPercayaDiri','<b>Percaya Diri</b>','required|xss_clean');
		$this->form_validation->set_rules('rdKomunikasi','<b>Komunikasi</b>','required|xss_clean');
		$this->form_validation->set_rules('rdIde','<b>Ide</b>','required|xss_clean');
		$this->form_validation->set_rules('rdManajerial','<b>Manajerial</b>','required|xss_clean');
		$this->form_validation->set_rules('rdMotivator','<b>Motivator</b>','required|xss_clean');
		$this->form_validation->set_rules('rdTI','<b>TI</b>','required|xss_clean');
		$this->form_validation->set_rules('rdSosialisasi','<b>Sosialisasi</b>','required|xss_clean');
		$this->form_validation->set_rules('rdKritikSaran','<b>Kritik dan Saran</b>','required|xss_clean');
		$this->form_validation->set_rules('rdTim','<b>Tim</b>','required|xss_clean');
		$this->form_validation->set_rules('rdBelajar','<b>Belajar</b>','required|xss_clean');
		$this->form_validation->set_rules('rdPenilaian','<b>Penilaian</b>','required|xss_clean');
		$this->form_validation->set_rules('lstPDUser','<b>User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstPimpinUser','<b>Pimpinan User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstJujurUser','<b>Kejujuran</b>','required|xss_clean');
		$this->form_validation->set_rules('lstDisiplinUser','<b>Disiplin User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstKomunikasiUser','<b>Komunikasi User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstMotivasiUser','<b>Motivasi User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstAdaptasiUser','<b>Adaptasi User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstTekananUser','<b>Tekanan User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstIPKUser','<b>IPK User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstAsingUser','<b>Asing</b>','required|xss_clean');
		$this->form_validation->set_rules('lstKomputerUser','<b>Komputer</b>','required|xss_clean');
		$this->form_validation->set_rules('lstPenghargaanUser','<b>Penghargaan</b>','required|xss_clean');
		$this->form_validation->set_rules('lstPengalamanUser','<b>Pengalaman</b>','required|xss_clean');
		$this->form_validation->set_rules('lstPelatihanUser','<b>Pelatihan</b>','required|xss_clean');
		$this->form_validation->set_rules('lstDriverUser','<b>Driver</b>','required|xss_clean');
		$this->form_validation->set_rules('lstBasisUser','<b>Basis</b>','required|xss_clean');
		$this->form_validation->set_rules('lstManajemenUser','<b>Manajemen User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstPerancanganUser','<b>Perancangan</b>','required|xss_clean');
		$this->form_validation->set_rules('lstPemrogramanUser','<b>Pemrograman</b>','required|xss_clean');
		$this->form_validation->set_rules('lstAnalisaUser','<b>Analisa</b>','required|xss_clean');
		$this->form_validation->set_rules('lstObyekUser','<b>Obyek</b>','required|xss_clean');
		$this->form_validation->set_rules('lstWebUser','<b>Web User</b>','required|xss_clean');
		$this->form_validation->set_rules('lstTestingUser','<b>Testing User</b>','required|xss_clean');

		$this->form_validation->set_rules('txtNamaLulusan','<b>Nama Lulusan</b>','required|xss_clean');
		$this->form_validation->set_rules('txtKinerja','<b>Kinerja Lulusan</b>','required|xss_clean');
		$this->form_validation->set_rules('txtHSBelum','<b>Hardskill dan Softskill</b>','required|xss_clean');
		$this->form_validation->set_rules('txtKompetensiBelum','<b>Kompetensi</b>','required|xss_clean');
		$this->form_validation->set_rules('txtMasukan','<b>Masukan</b>','required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
			$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();			

	    	$this->template_fo->display('pengguna_v', $data);
		} else {
			$verify		= trim($this->input->post('verify', 'true'));
			$security	= $this->session->userdata('security_code');
  			
  			if((!empty($verify) && ($verify == $security))) { 									
				// Add Pengguna to Table umk_pengguna
				$this->pengguna_model->insert_data_pengguna();
				// Add Pengguna to Table umk_harapan
				$this->pengguna_model->insert_data_harapan();
				$this->session->set_flashdata('notification','Terima Kasih, Pesan Anda Berhasil Terkirim.');			
				redirect(site_url('pengguna'));
			} else {				
   				$this->session->set_flashdata('notification','Capctha Code Salah, Mohon Ulangi !!');			
				redirect(site_url('pengguna'));
			}
		}
	}			
}
/* Location: ./application/controller/pengguna.php */
?>