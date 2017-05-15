<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agendaalumni extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_fo');
		$this->load->model('agenda_model');
		$this->load->model('menu_model');		
	}
	
	public function index($offset=0) {
		$config['uri_segment'] = 3;
        $config['base_url'] = site_url(). 'agendaalumni/index';
        $config['total_rows'] = $this->agenda_model->count_all();
        $config['per_page'] = 5;
                               
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
		$data['daftar_agenda'] = $this->agenda_model->select_all($config['per_page'],$offset)->result();

		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();		

    	$this->template_fo->display('agenda_v', $data);
	}

	public function id() {
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
		$data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();

		$agenda_id = $this->uri->segment(3);
		$data['detail'] = $this->agenda_model->select_by_id($agenda_id)->row();
		$data['komentar'] = $this->agenda_model->select_komentar($agenda_id)->result();
		$data['recent'] = $this->agenda_model->select_recent($agenda_id)->result();
    	$this->template_fo->display('agendadetail_v', $data);
	}

	public function kirim_komentar() {		
		$this->form_validation->set_rules('komentar','<b>Komentar</b>','trim|required|min_length[10]|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
			$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
			$data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();

			$agenda_id = $this->uri->segment(3);
			$data['detail'] = $this->agenda_model->select_by_id($agenda_id)->row();
			$data['komentar'] = $this->agenda_model->select_komentar($agenda_id)->result();
			$data['recent'] = $this->agenda_model->select_recent($agenda_id)->result();
	    	$this->template_fo->display('agendadetail_v', $data);
		} else {
			$this->agenda_model->insert_data();			
 			if ($this->input->server('HTTP_REFERER'))
			redirect($this->input->server('HTTP_REFERER'));
		}
	}	
}
/* Location: ./application/controller/agendaalumni.php */
?>