<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seputar extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_fo');
		$this->load->model('seputar_model');
		$this->load->model('menu_model');     
	}
	
	public function index($offset=0) {
		$config['uri_segment'] = 3;
        $config['base_url'] = site_url(). 'seputar/index';
        $config['total_rows'] = $this->seputar_model->count_all();
        $config['per_page'] = 6;
                                      
        // CSS Bootstrap               
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';            
        $config['prev_link'] = '<';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        // Akhir CSS
         
        $config["num_links"] = round( $config["total_rows"] / $config["per_page"] );        		          
        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();

		$data['daftar_seputar'] = $this->seputar_model->select_all($config['per_page'], $offset)->result();
		
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();		

    	$this->template_fo->display('seputar_v', $data);
	}

	public function id() {		
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		
		$seputar_id = $this->uri->segment(3);
		$data['detail'] = $this->seputar_model->select_by_id($seputar_id)->row();
		$data['komentar'] = $this->seputar_model->select_komentar($seputar_id)->result();
		$data['recent'] = $this->seputar_model->select_recent($seputar_id)->result();

    	$this->template_fo->display('seputardetail_v', $data);
	}

	public function kirim_komentar() {						
		$this->form_validation->set_rules('komentar','<b>Komentar Anda</b>','trim|required|min_length[10]|xss_clean');
				
		if ($this->form_validation->run() == FALSE) {
			$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();

			$seputar_id = $this->uri->segment(3);
			$data['detail'] = $this->seputar_model->select_by_id($seputar_id)->row();
			$data['komentar'] = $this->seputar_model->select_komentar($seputar_id)->result();
			$data['recent'] = $this->seputar_model->select_recent($seputar_id)->result();

	    	$this->template_fo->display('seputardetail_v', $data);
		} else {
			$this->seputar_model->insert_data();
 			if ($this->input->server('HTTP_REFERER'))
			redirect($this->input->server('HTTP_REFERER'));
		}
	}	
}
/* Location: ./application/controller/seputar.php */
?>