<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transisi extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('transisi_model');		
		$this->load->model('menu_model');      
	}
	
	public function index() {
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));	
		$user_id = $this->session->userdata('user_id');	
		$nim = $this->session->userdata('nim');		
		$data['transisi'] = $this->transisi_model->select_transisi($nim)->row();
		$data['data_kursus'] = $this->transisi_model->select_kursus($nim)->result();

    	$this->template_account->display('transisi_v', $data);
	}

	public function insertdata() {								
		$this->form_validation->set_rules('jmllamar','<b>Jumlah Dilamar</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('jmlrespon','<b>Jumlah Respon</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('jenisinstansi','<b>Jenis Instansi</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('aspekkerja','<b>Aspek Pertimbangan</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('lstSesuai','<b>Kesesuaian Pekerjaan</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('hardskill','<b>Kemampuan Hardskill</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('softskill','<b>Kemampuan Softskill</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('masalah','<b>Masalah</b>','trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');		
			$data['transisi'] = $this->transisi_model->select_transisi($nim)->row();
	    	$this->template_account->display('transisi_v', $data);  
		} else {			
			$this->transisi_model->insert_data_transisi();
			$this->session->set_flashdata('notification','SUKSES !! Data Transisi Anda Berhasil Di Simpan.');
 			redirect(site_url('transisi'));
		}
	}

	public function updatedata() {												
		$this->transisi_model->update_data_transisi();
		$this->session->set_flashdata('notification','SUKSES !! Data Transisi Anda Berhasil Di Update.');
 		redirect(site_url('transisi'));		
	}

	public function savedata() {		
		$this->transisi_model->insert_data_kursus();
		$this->session->set_flashdata('notification','SUKSES !! Data Kursus Anda Berhasil Di Simpan.');
 		redirect(site_url('transisi#kursus'));
	}

	public function updatedatakursus() {		
		$this->transisi_model->update_data_kursus();
		$this->session->set_flashdata('notification','SUKSES !! Data Kursus Anda Berhasil Di Update.');
 		redirect(site_url('transisi#kursus'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));
		
		if ($kode == null) {
			redirect(site_url('transisi#kursus'));
		} else {
			$this->transisi_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."transisi#kursus\">";
		}
	}
}
/* Location: ./application/controller/transisi.php */
?>