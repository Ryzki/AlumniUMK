<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Infopenting extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_fo');
		$this->load->model('info_model');
		$this->load->model('menu_model');
	}
	
	public function index($offset=0) {
		$config['uri_segment'] = 3;
        $config['base_url'] = site_url(). 'infopenting/index';
        $config['total_rows'] = $this->info_model->count_all();
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
		$data['daftar_info'] = $this->info_model->select_all($config['per_page'],$offset)->result();

		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();		

    	$this->template_fo->display('info_v', $data);
	}

    public function id() {
        $data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
        $data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
        $data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();

        $info_id = $this->uri->segment(3);
        $data['detail'] = $this->info_model->select_by_id($info_id)->row();        

        $this->template_fo->display('infodetail_v', $data);
    }
}
/* Location: ./application/controller/Infopenting.php */
?>