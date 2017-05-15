<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_account');
		$this->load->model('database_model');
		$this->load->model('account_model');
		$this->load->model('menu_model');       
	}
	
	public function index() {
		$data['progdi'] = $this->database_model->select_progdi()->result();
		$this->template_account->display('caridatabase_v', $data);
	}

	public function searchdata() {
		$Progdi 	= $this->input->post('lstProgdi', 'true');		
		$Tahun1 	= $this->input->post('tahun1', 'true');
		$Tahun2 	= $this->input->post('tahun2', 'true');        

		if ($Progdi == 'all') { // Jika Semua Progdi
			$data = array(								
					'Tahun1' => $Tahun1,
					'Tahun2' => $Tahun2
				);	
			
			$data['daftar_alumni'] = $this->database_model->select_all()->result();

		} else { // Jika By Progdi			
			$data = array(			
					'lstProgdi' => $Progdi,					
					'Tahun1' => $Tahun1,
					'Tahun2' => $Tahun2
				);
			
			$data['daftar_alumni'] = $this->database_model->select_by_tahun()->result();
		}
		
    	$this->template_account->display('database_v', $data);
	}

	public function detail() {
		$nim = trim($this->uri->segment(3));
		$data['akun'] = $this->database_model->select_by_nim($nim)->row();

		$data['perusahaan'] = $this->account_model->select_perusahaan($nim)->row();
		$data['sekolah'] = $this->account_model->select_sekolah($nim)->row();
		$data['belumkerja'] = $this->account_model->select_belumkerja($nim)->row();
		$data['usaha'] = $this->account_model->select_usaha($nim)->row();
					
    	$this->template_account->display('databasedetail_v', $data);
	}
}
/* Location: ./application/controller/database.php */
?>