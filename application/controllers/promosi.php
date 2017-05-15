<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promosi extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('promosi_model');
		$this->load->model('account_model');		
		$this->load->model('menu_model');      
	}
	
	public function index() {
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));	
		
		$user_id = $this->session->userdata('user_id');
		$nim 	 = $this->session->userdata('nim');		
		$data['akun'] = $this->account_model->select_account($user_id)->row();
		$data['daftar_promosi'] = $this->promosi_model->select_usaha($nim)->result();

    	$this->template_account->display('promosi_v', $data);
	}

	public function addpromosi() {				
    	$this->template_account->display('addpromosi_v');
	}

	public function editpromosi() {		
		$user_id = $this->session->userdata('user_id');
		$nim 	 = $this->session->userdata('nim');		
		$data['usaha'] = $this->account_model->select_usaha($nim)->row();		

    	$this->template_account->display('editpromosi_v', $data);
	}
	
	public function insertusaha() {		
		$this->form_validation->set_rules('nama','<b>Nama Usaha</b>','trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('alamat','<b>Alamat Usaha</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('web','<b>Web Usaha</b>','max_length[50]|xss_clean');
		$this->form_validation->set_rules('bidang','<b>Bidang Usaha</b>','required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('jumlah','<b>Jumlah Karyawan</b>','required|integer|max_length[5]|xss_clean');
		$this->form_validation->set_rules('omzet','<b>Omzet /Bulan</b>','required|integer|max_length[10]|xss_clean');
		$this->form_validation->set_rules('pengeluaran','<b>Pengeluaran /Bulan</b>','required|integer|max_length[10]|xss_clean');
		$this->form_validation->set_rules('desc','<b>Description</b>','required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template_account->display('addpromosi_v');
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$jam = time();
				$kode = trim($this->session->userdata('nim'));
					
				$config['file_name']    = 'Logo_'.$kode.'_'.$jam.'.jpg';
				$config['upload_path'] = './logo/';
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

			// Insert Data Baru
			$this->promosi_model->insert_data_usaha();			
			// Add Invoice Baru
			$this->promosi_model->insert_invoice();
			redirect(site_url('promosi'));		
		}
	}

	public function updateusaha() {		
		$this->form_validation->set_rules('nama','<b>Nama Usaha</b>','required|min_length[5]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('alamat','<b>Alamat Usaha</b>','trim|required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('web','<b>Web Usaha</b>','max_length[50]|xss_clean');
		$this->form_validation->set_rules('bidang','<b>Bidang Usaha</b>','required|min_length[5]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('jumlah','<b>Jumlah Karyawan</b>','required|integer|max_length[5]|xss_clean');
		$this->form_validation->set_rules('omzet','<b>Omzet per Bulan</b>','required|integer|max_length[10]|xss_clean');
		$this->form_validation->set_rules('pengeluaran','<b>Pengeluaran per Bulan</b>','required|integer|max_length[10]|xss_clean');
		$this->form_validation->set_rules('desc','<b>Description</b>','required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$user_id = $this->session->userdata('user_id');
			$nim 	 = $this->session->userdata('nim');		
			$data['usaha'] = $this->account_model->select_usaha($nim)->row();		

	    	$this->template_account->display('editpromosi_v', $data);
		} else {			
			$this->promosi_model->update_data_usaha();			
			redirect(site_url('promosi'));		
		}
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));
		
		if ($kode == null) {
			redirect(site_url().'promosi');
		} else {
			// Delete Data Usaha
			$this->promosi_model->delete_data($kode);
			// Delete Data Invoice Usaha
			$this->promosi_model->delete_invoice($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."promosi\">";
		}
	}

}
/* Location: ./application/controller/promosi.php */
?>