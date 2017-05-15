<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lowongankerja extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_fo');
		$this->load->model('lowker_model');
		$this->load->model('menu_model');     
	}
	
	// Tampilkan Semua Data Lowker
	public function index($offset = 0) {

		$config['uri_segment'] = 3;
        $config['base_url'] = site_url(). 'lowongankerja/index';
        $config['total_rows'] = $this->lowker_model->count_all();        
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
        
		$data['daftar_lowker'] = $this->lowker_model->select_all($config['per_page'], $offset)->result();		
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
								
    	$this->template_fo->display('lowker_v', $data);
	}

	// Tampilkan Data Lowker per Fakultas
	public function fakultas($fakultas_id, $offset = 0) {
		$fakultas_id = $this->uri->segment(3);

		$config['uri_segment'] = 4;
        $config['base_url'] = site_url(). 'lowongankerja/fakultas/'.$fakultas_id;
        $config['total_rows'] = $this->lowker_model->count_by_fakultas($fakultas_id);        
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
		$data['daftar_lowker'] = $this->lowker_model->select_all_id_fakultas($config['per_page'], $offset)->result();

		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
		$data['detail'] = $this->lowker_model->select_fakultas($fakultas_id)->row();

    	$this->template_fo->display('lowkerfakultasid_v', $data);
	}

	// Tampilkan Data Lowker per Progdi
	public function progdi($progdi_id, $offset = 0) {
		$progdi_id = $this->uri->segment(3);

		$config['uri_segment'] = 4;
        $config['base_url'] = site_url(). 'lowongankerja/progdi/'.$progdi_id;
        $config['total_rows'] = $this->lowker_model->count_by_progdi($progdi_id);        
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

		$data['daftar_lowker'] = $this->lowker_model->select_all_id_progdi($config['per_page'], $offset)->result();
		$data['detail'] = $this->lowker_model->select_progdi($progdi_id)->row();

		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();		

    	$this->template_fo->display('lowkerprogdiid_v', $data);
	}

	public function id() {
		$lowker_id = $this->uri->segment(3);
			
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
        
		$data['detail'] = $this->lowker_model->select_by_id($lowker_id)->row();
		$data['recent'] = $this->lowker_model->select_recent($lowker_id)->result();

    	$this->template_fo->display('lowkerdetail_v', $data);
	}
}
/* Location: ./application/controller/lowongankerja.php */
?>