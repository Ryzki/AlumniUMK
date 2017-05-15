<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wirausaha extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_fo');
		$this->load->model('wirausaha_model');
		$this->load->model('menu_model');      
	}
	
	public function index($offset = 0) {
		$config['uri_segment'] = 3;
        $config['base_url'] = site_url(). 'wirausaha/index';
        $config['total_rows'] = $this->wirausaha_model->count_all();        
        $config['per_page'] = 12;
                               
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

		$data['wirausaha'] = $this->wirausaha_model->select_all($config['per_page'], $offset)->result();        

    	$this->template_fo->display('wirausahalist_v', $data);
	}

	public function id() {
		$usaha_id = $this->uri->segment(3);
		// Usaha
		$data['usaha'] = $this->wirausaha_model->select_usaha($usaha_id)->result();		
		$data['detail'] = $this->wirausaha_model->select_by_id($usaha_id)->row();		
		
    	$this->template_fo->display('usahadetail_v', $data);
	}
}
/* Location: ./application/controller/wirausaha.php */
?>