<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}	

	function insert_data_pengguna() {		
		$data = array(
				'pengguna_nama'    => ucwords(trim($this->input->post('txtNama', 'true'))),
				'pengguna_jabatan' => $this->input->post('txtJabatan', 'true'),
				'pengguna_email'   => $this->input->post('txtEmail', 'true'),
				'pengguna_hp'      => $this->input->post('txtHP', 'true'),
				'pengguna_perusahaan' => ucwords(trim($this->input->post('txtNamaPerus', 'true'))),
				'pengguna_bidang_usaha' => $this->input->post('txtBidang', 'true'),
				'pengguna_almt_perus' => $this->input->post('txtAlamat', 'true'),
				'pengguna_telp_perus' => $this->input->post('txtTelp', 'true'),
				'pengguna_fax_perus' => $this->input->post('txtFax', 'true'),
				'pengguna_web_perus' => $this->input->post('txtWebsite', 'true'),
				'jml_lulusan' => $this->input->post('lstJmlLulus', 'true'),
				'ms_kerja' => $this->input->post('lstMsKerja', 'true'),
				'gaji_awal' => $this->input->post('lstGajiAwal', 'true'),
				'ipk_kary' => $this->input->post('lstIPK', 'true'),
				'disiplin' => $this->input->post('rdDisiplin', 'true'),
				'jujur' => $this->input->post('rdJujur', 'true'),
				'motivasi' => $this->input->post('rdMotivasi', 'true'),
				'etos' => $this->input->post('rdEtos', 'true'),
				'keahlian' => $this->input->post('rdKeahlian', 'true'),
				'produktivitas' => $this->input->post('rdProduktivitas', 'true'),
				'inovasi' => $this->input->post('rdInovasi', 'true'),
				'solusi' => $this->input->post('rdSolusi', 'true'),
				'adaptasi' => $this->input->post('rdAdaptasi', 'true'),
				'tanggap' => $this->input->post('rdTanggap', 'true'),
				'emosi' => $this->input->post('rdEmosi', 'true'),
				'percaya_diri' => $this->input->post('rdPercayaDiri', 'true'),
				'komunikasi' => $this->input->post('rdKomunikasi', 'true'),
				'ide' => $this->input->post('rdIde', 'true'),
				'manajerial' => $this->input->post('rdManajerial', 'true'),
				'motivator' => $this->input->post('rdMotivator', 'true'),
				'ti' => $this->input->post('rdTI', 'true'),
				'sosialisasi' => $this->input->post('rdSosialisasi', 'true'),
				'kritik' => $this->input->post('rdKritikSaran', 'true'),
				'tim' => $this->input->post('rdTim', 'true'),
				'belajar' => $this->input->post('rdBelajar', 'true'),
				'penilaian' => $this->input->post('rdPenilaian', 'true'),
				'pengguna_lulusan' => $this->input->post('txtNamaLulusan', 'true'),
				'pengguna_kinerja' => $this->input->post('txtKinerja', 'true'),
				'pengguna_blm_punya' => $this->input->post('txtHSBelum', 'true'),
				'pengguna_kompetensi' => $this->input->post('txtKompetensiBelum', 'true'),
				'pengguna_date_update' => date('Y-m-d'),
	    		'pengguna_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_pengguna', $data);
	}

	function insert_data_harapan() {
		// ID Pengguna Baru
		$pengguna_id = $this->db->insert_id();		
		$data = array(
				'pengguna_id'    => $pengguna_id,
				'harapan_pd' => $this->input->post('lstPDUser', 'true'),
				'harapan_pimpin'   => $this->input->post('lstPimpinUser', 'true'),
				'harapan_jujur'      => $this->input->post('lstJujurUser', 'true'),
				'harapan_disiplin' => $this->input->post('lstDisiplinUser', 'true'),
				'harapan_komunikasi' => $this->input->post('lstKomunikasiUser', 'true'),
				'harapan_motivasi' => $this->input->post('lstMotivasiUser', 'true'),
				'harapan_adaptasi' => $this->input->post('lstAdaptasiUser', 'true'),
				'harapan_tekanan' => $this->input->post('lstTekananUser', 'true'),
				'harapan_ipk' => $this->input->post('lstIPKUser', 'true'),
				'harapan_bahasa' => $this->input->post('lstAsingUser', 'true'),
				'harapan_komputer' => $this->input->post('lstKomputerUser', 'true'),
				'harapan_penghargaan' => $this->input->post('lstPenghargaanUser', 'true'),
				'harapan_pengalaman' => $this->input->post('lstPengalamanUser', 'true'),
				'harapan_pelatihan' => $this->input->post('lstPelatihanUser', 'true'),
				'harapan_kendara' => $this->input->post('lstDriverUser', 'true'),
				'harapan_sistem' => $this->input->post('lstBasisUser', 'true'),
				'harapan_manajemen' => $this->input->post('lstManajemenUser', 'true'),
				'harapan_perancangan' => $this->input->post('lstPerancanganUser', 'true'),
				'harapan_database' => $this->input->post('lstPemrogramanUser', 'true'),
				'harapan_analisa' => $this->input->post('lstAnalisaUser', 'true'),
				'harapan_obyek' => $this->input->post('lstObyekUser', 'true'),
				'harapan_web' => $this->input->post('lstWebUser', 'true'),
				'harapan_testing' => $this->input->post('lstTestingUser', 'true'),
				'harapan_masukan' => $this->input->post('txtMasukan', 'true'),
				'harapan_date_update' => date('Y-m-d'),
	    		'harapan_time_update' => date('Y-m-d H:i:s')				
				);
		
		$this->db->insert('umk_harapan', $data);
	}									
}
/* Location: ./application/model/pengguna_model.php */
?>