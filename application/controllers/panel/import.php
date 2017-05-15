<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->helper('file');
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/import_model');	
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in_umk')) {			
			$this->template->display('panel/import_data_v');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}
	
	function do_upload()
	{
		$config['upload_path'] = './temp_upload/';
		$config['allowed_types'] = 'xls';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());
		}
		else
		{
            $data = array('error' => false);
			$upload_data = $this->upload->data();

            $this->load->library('excel_reader');
			$this->excel_reader->setOutputEncoding('CP1251');

			$file =  $upload_data['full_path'];
			$this->excel_reader->read($file);
			error_reporting(E_ALL ^ E_NOTICE);

			// Sheet 1
			$data = $this->excel_reader->sheets[0] ;
			// Ambil Data
            $dataexcelalumni = Array();
            for ($i = 1; $i <= $data['numRows']; $i++) {
               	if($data['cells'][$i][1] == '') break;               	
               	
               	$tgl_lhr 	= $data['cells'][$i][6];									
				$date_lahir	= date('Y-m-d', strtotime($tgl_lhr));
				$tgl_masuk 	= $data['cells'][$i][9];					
				$date_masuk	= date('Y-m-d', strtotime($tgl_masuk));
				$tgl_lulus 	= $data['cells'][$i][10];
				$date_lulus	= date('Y-m-d', strtotime($tgl_lulus));

				$dataexcelalumni[$i-1]['alumni_nim'] = $data['cells'][$i][1];
	            $dataexcelalumni[$i-1]['alumni_nama'] = $data['cells'][$i][2];
	            $dataexcelalumni[$i-1]['fakultas_id'] = $data['cells'][$i][3];
	            $dataexcelalumni[$i-1]['progdi_id'] = $data['cells'][$i][4];
	            $dataexcelalumni[$i-1]['alumni_tmpt_lhr'] = $data['cells'][$i][5];
	            $dataexcelalumni[$i-1]['alumni_tgl_lhr'] = $date_lahir;
	            $dataexcelalumni[$i-1]['alumni_hp'] = $data['cells'][$i][7];
	            $dataexcelalumni[$i-1]['alumni_agama'] = $data['cells'][$i][8];
	            $dataexcelalumni[$i-1]['alumni_tgl_masuk'] = $date_masuk;
	            $dataexcelalumni[$i-1]['alumni_tgl_lulus'] = $date_lulus;
	            $dataexcelalumni[$i-1]['user_username'] = $data['cells'][$i][11];
	            $dataexcelalumni[$i-1]['user_password'] = $data['cells'][$i][12];	            
            }

            $proses = Array();
            for ($i = 1; $i <= $data['numRows']; $i++) {
            	if($data['cells'][$i][1] == '') break;
            	$alumni_nim = $data['cells'][$i][1]; 
            	$alumni_nama = $data['cells'][$i][2];             	
            	// Cek Data Alumni
			    $checkalumni = $this->import_model->search_nim_alumni($alumni_nim)->result();			    
			    if (count($checkalumni) > 0)
			    {		    	
			    	echo 'Update '.$alumni_nim.'-'.$alumni_nama.'<br>';
			    	$this->import_model->update_alumni($dataexcelalumni); // Update Data Alumni			    	
			  	} 
			  	else 
			  	{
			  		echo 'Update '.$alumni_nim.'-'.$alumni_nama.'<br>';
			    	$this->import_model->insert_alumni($dataexcelalumni); // Insert Data Alumni		    			    	
			  	}
            }
           

		  	// Cek Data Users
		    /*$checkuser = $this->import_model->search_nim_users($dataexcelalumni);
		    if (count($checkuser) > 0)
		    {		    	
		    	$this->import_model->update_users($dataexcelalumni); // Update Data Users
		  	} 
		  	else 
		  	{		    	
		    	$this->import_model->insert_users($dataexcelalumni); // Insert Data Users
		  	}*/
			

            /*$dataexcelalumni = Array();
			for ($i = 1; $i <= $data['numRows']; $i++) {
				if ($data['cells'][$i][1] == '') break;
				// Variabel Data NIM
				$alumni_nim = $data['cells'][$i][1]; 				
				// Pengecekan jika ada NIM sama						
				$cek_data = $this->import_model->cek_data($alumni_nim)->result();
				$jml_data = count($cek_data);
				
				if ($jml_data == 0) {
					$tgl_lhr 	= $data['cells'][$i][6];									
					$date_lahir	= date('Y-m-d', strtotime($tgl_lhr));
					$tgl_masuk = $data['cells'][$i][9];					
					$date_masuk	= date('Y-m-d', strtotime($tgl_masuk));
					$tgl_lulus = $data['cells'][$i][10];
					$date_lulus	= date('Y-m-d', strtotime($tgl_lulus));

					$dataexcelalumni[$i-1]['alumni_nim'] = $data['cells'][$i][1];
	                $dataexcelalumni[$i-1]['alumni_nama'] = $data['cells'][$i][2];
	                $dataexcelalumni[$i-1]['fakultas_id'] = $data['cells'][$i][3];
	                $dataexcelalumni[$i-1]['progdi_id'] = $data['cells'][$i][4];
	                $dataexcelalumni[$i-1]['alumni_tmpt_lhr'] = $data['cells'][$i][5];
	                $dataexcelalumni[$i-1]['alumni_tgl_lhr'] = $date_lahir;
	                $dataexcelalumni[$i-1]['alumni_hp'] = $data['cells'][$i][7];
	                $dataexcelalumni[$i-1]['alumni_agama'] = $data['cells'][$i][8];
	                $dataexcelalumni[$i-1]['alumni_tgl_masuk'] = $date_masuk;
	                $dataexcelalumni[$i-1]['alumni_tgl_lulus'] = $date_lulus;	                
            	}
            	else 
            	{
            		$dataexcelalumni[$i-1]['alumni_nim'] = rand(111111111,999999999);
	                $dataexcelalumni[$i-1]['alumni_nama'] = '1';
	                $dataexcelalumni[$i-1]['fakultas_id'] = 0;
	                $dataexcelalumni[$i-1]['progdi_id'] = 0;
	                $dataexcelalumni[$i-1]['alumni_tmpt_lhr'] = 'KUDUS';
	                $dataexcelalumni[$i-1]['alumni_tgl_lhr'] = date('Y-m-d');
	                $dataexcelalumni[$i-1]['alumni_hp'] = '';
	                $dataexcelalumni[$i-1]['alumni_agama'] = '-';
	                $dataexcelalumni[$i-1]['alumni_tgl_masuk'] = date('Y-m-d');
	                $dataexcelalumni[$i-1]['alumni_tgl_lulus'] = date('Y-m-d');	                
            	}
			} */
            
            /*$dataexcelusers = Array();
			for ($i = 1; $i <= $data['numRows']; $i++) {
				if ($data['cells'][$i][1] == '') break;
				// Variabel Data NIM
				$alumni_nim_users = $data['cells'][$i][1]; 				
				// Pengecekan jika ada NIM sama						
				$cek_data_users = $this->import_model->cek_data_users($alumni_nim_users)->result();
				$jml_data_users = count($cek_data_users);
				
				if ($jml_data_users == 0) {
					$dataexcelusers[$i-1]['alumni_nim'] = $data['cells'][$i][1];
	                $dataexcelusers[$i-1]['alumni_nama'] = $data['cells'][$i][2];	                
	                $dataexcelusers[$i-1]['user_username'] = $data['cells'][$i][11];
	                $dataexcelusers[$i-1]['user_password'] = $data['cells'][$i][12];
            	}
            	else 
            	{
            		$dataexcelusers[$i-1]['alumni_nim'] = rand(111111111,999999999);
	                $dataexcelusers[$i-1]['alumni_nama'] = '1';	                
	                $dataexcelusers[$i-1]['user_username'] = $data['cells'][$i][11];
	                $dataexcelusers[$i-1]['user_password'] = $data['cells'][$i][12];
            	}
			}*/			           
            //$this->import_model->tambahdataalumni($dataexcelalumni);
            //$this->import_model->tambahdatauser($dataexcelusers);
            //$data['alumni'] = $this->import_model->getuser();
		}

		delete_files($upload_data['file_path']); 
		$data['data_import'] = $this->import_model->select_import()->result(); // Insert Data Users
	    $this->template->display('panel/hasil_import_v', $data);

	    //$this->session->set_flashdata('notification','SUKSES !! Data Anda Berhasil Di Import.');
		//redirect(site_url('panel/import'));
	}

	function do_upload2()
	{
	    $config['upload_path'] = './temp_upload/';
	    $config['allowed_types'] = 'xls';
                
    	$this->load->library('upload', $config);

     	if ( ! $this->upload->do_upload())
     	{
            $data = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg_excel', 'Insert failed. Please check your file, only .xls file allowed.');
	    }
	    else
	    {
            $data = array('error' => false);
            $upload_data = $this->upload->data();

            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');

            $file =  $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);

            // Sheet 1
            $data = $this->excel_reader->sheets[0] ;
            // Ambil Data
            $dataexcelalumni = Array();
            for ($i = 1; $i <= $data['numRows']; $i++) {
               	if($data['cells'][$i][1] == '') break;

               	$tgl_lhr 	= $data['cells'][$i][6];									
				$date_lahir	= date('Y-m-d', strtotime($tgl_lhr));
				$tgl_masuk = $data['cells'][$i][9];					
				$date_masuk	= date('Y-m-d', strtotime($tgl_masuk));
				$tgl_lulus = $data['cells'][$i][10];
				$date_lulus	= date('Y-m-d', strtotime($tgl_lulus));

				$dataexcelalumni['alumni_nim'] = $data['cells'][$i][1];
	            $dataexcelalumni['alumni_nama'] = $data['cells'][$i][2];
	            $dataexcelalumni['fakultas_id'] = $data['cells'][$i][3];
	            $dataexcelalumni['progdi_id'] = $data['cells'][$i][4];
	            $dataexcelalumni['alumni_tmpt_lhr'] = $data['cells'][$i][5];
	            $dataexcelalumni['alumni_tgl_lhr'] = $date_lahir;
	            $dataexcelalumni['alumni_hp'] = $data['cells'][$i][7];	           
	            $dataexcelalumni['alumni_tgl_masuk'] = $date_masuk;
	            $dataexcelalumni['alumni_tgl_lulus'] = $date_lulus;
	            $dataexcelalumni['alumni_tgl_update'] = date('Y-m-d');
	            $dataexcelalumni['alumni_jam_update'] = date('Y-m-d H:i:s');
	            $dataexcelalumni['alumni_import'] = 1;
				$dataexcelalumni['alumni_status'] = 1;
				$dataexcelalumni['alumni_active'] = 1;            
            	$dataexcelalumni['alumni_trash'] = 0;

	            $alumni_nim = $dataexcelalumni['alumni_nim'];				
				$alumni = $this->db->get_where('umk_alumni', array('alumni_nim' => $alumni_nim))->row();				
				if ($alumni == NULL) 
				{ //Data alumni belum ada
					$this->db->insert('umk_alumni', $dataexcelalumni);
				}
				else 
				{ //Data alumni sudah ada
					unset($dataexcelalumni['alumni_nim']);
					$this->db->where('alumni_nim', $alumni_nim);
					$this->db->update('umk_alumni', $dataexcelalumni);
				}
            }

            // Ambil Data untuk Users
            $dataexceluser = Array();
            for ($i = 1; $i <= $data['numRows']; $i++) {
               	if($data['cells'][$i][1] == '') break;
				$dataexceluser['alumni_nim'] = $data['cells'][$i][1];
	            $dataexceluser['user_name'] = $data['cells'][$i][2];
	            $dataexceluser['user_username'] = $data['cells'][$i][11];
	            $dataexceluser['user_password'] = sha1($data['cells'][$i][12]);
	            $dataexceluser['user_level'] = 'Alumni';
				$dataexceluser['user_online'] = 0;
				$dataexceluser['user_trash'] = 0;
				$dataexceluser['user_date_import'] = date('Y-m-d');           
            	
            	// Cek Data Users
	            $alumni_nim = $dataexceluser['alumni_nim'];				
				$alumni = $this->db->get_where('umk_users', array('alumni_nim' => $alumni_nim))->row();				
				if ($alumni == NULL) 
				{ //Data Users belum ada
					$this->db->insert('umk_users', $dataexceluser);
				}
				else 
				{ //Data Users sudah ada
					unset($dataexceluser['alumni_nim']);
					$this->db->where('alumni_nim', $alumni_nim);
					$this->db->update('umk_users', $dataexceluser);
				}
            }
  		}
  		
  		delete_files($upload_data['file_path']); 
		redirect(site_url().'panel/import/import_success');
  	}

  	public function import_success()
	{
		$data['data_import'] = $this->import_model->select_import()->result(); // Insert Data Users
	    $this->template->display('panel/hasil_import_v', $data);
	}
	
}
/* Location: ./application/controllers/panel/import.php */