<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('daftar_model');		   
	}
	
	public function index() {
		//$data['option_fakultas'] = $this->daftar_model->getFakultasList();
    	$this->template_account->display('daftar_v');
	}

	/*function select_progdi(){
        $data['option_progdi'] = $this->daftar_model->getProgdiList();
        $this->load->view('progdimember_v',$data);
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
	} */

	public function savedata () {		
		$this->form_validation->set_rules('nim','<b>NIM</b>','trim|required|integer|min_length[9]|max_length[9]|is_unique[umk_alumni.alumni_nim]|xss_clean');
		$this->form_validation->set_rules('nama','<b>Nama</b>','trim|required|max_length[50]|xss_clean');
		/*$this->form_validation->set_rules('fakultas_id','<b>Fakultas</b>','required|xss_clean');
		$this->form_validation->set_rules('progdi_id','<b>Program Studi</b>','required|xss_clean');*/
		$this->form_validation->set_rules('tempat','<b>Tempat Lahir</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('tgl_lahir','<b>Tanggal Lahir</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('email','<b>Email</b>','trim|required|min_length[5]|max_length[50]|is_unique[umk_alumni.alumni_email]|xss_clean');
		$this->form_validation->set_rules('telp','<b>No. Telp/HP</b>','trim|required|min_length[10]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('lstAgama','<b>Agama</b>','required|xss_clean');		
		$this->form_validation->set_rules('verify','<b>Captcha</b>','trim|required|min_length[5]|max_length[5]|xss_clean');			

		if ($this->form_validation->run() == FALSE) {
	    	//$data['option_fakultas'] = $this->daftar_model->getFakultasList();
    		$this->template_account->display('daftar_v');
		} else {  			  			
  			$verify		= trim($this->input->post('verify', 'true'));
			$security	= $this->session->userdata('security_code');

			if((!empty($verify) && ($verify == $security))) {
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
				$this->daftar_model->insert_data();
				// Add New Username to Table umk_users			
				//$this->daftar_model->insert_data_user();								
				redirect(site_url('daftar/success'));
  			} else {   				
   				$this->session->set_flashdata('notification','MAAF !!, Captcha Salah, ulangi lagi.');
   				redirect(site_url('daftar'));
  			}
 		}  		
	}

	public function success () {
    	$this->template_account->display('registersukses_v');
	}				
}
/* Location: ./application/controller/daftar.php */
?>