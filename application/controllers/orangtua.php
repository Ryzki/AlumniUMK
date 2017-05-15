<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orangtua extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');			
		$this->load->library('template_fo');
		$this->load->model('orangtua_model');
		$this->load->model('menu_model');        
	}
	
	public function index() {
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
		$data['daftar_progdi'] = $this->menu_model->select_progdi2()->result();

    	$this->template_fo->display('orangtua_v', $data);
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
		$this->form_validation->set_rules('txtKerja','<b>Pekerjaan</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('txtDidik','<b>Pendidikan</b>','trim|required|max_length[50]|xss_clean');		
		$this->form_validation->set_rules('txtNamaAnak','<b>Nama Anak</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('lstProgdi','<b>Program Studi</b>','required|xss_clean');
		$this->form_validation->set_rules('txtLayanan','<b>Kualitas Layanan</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('txtBelajar','<b>Kualitas Pembelajaran</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('txtInfra','<b>Kualitas Infrastruktur dan Fasilitas</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('txtHardSoft','<b>Kemampuan Hardskill & Softskill</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('txtSaran','<b>Saran</b>','trim|required|xss_clean');		
		
		if ($this->form_validation->run() == FALSE) {
			$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
			$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
			$data['daftar_progdi'] = $this->menu_model->select_progdi2()->result();

	    	$this->template_fo->display('orangtua_v', $data);
		} else {
			$verify		= trim($this->input->post('verify', 'true'));
			$security	= $this->session->userdata('security_code');
  			
  			if((!empty($verify) && ($verify == $security))) {				
				$this->orangtua_model->insert_data_orangtua();
				$this->session->set_flashdata('notification','Terima Kasih, Kuesioner Anda Berhasil Di Simpan.');			
				redirect(site_url('orangtua'));
			} else {				
   				$this->session->set_flashdata('notification','Capctha Code Salah, Mohon Ulangi !!');			
				redirect(site_url('orangtua'));
			}
		}
	}			
}
/* Location: ./application/controller/orangtua.php */
?>