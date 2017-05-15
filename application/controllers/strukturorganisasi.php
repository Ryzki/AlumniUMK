<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Strukturorganisasi extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_fo');
		$this->load->model('struktur_model');
		$this->load->model('menu_model');      
	}
	
	public function index() {		
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
		$data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();								   

    	$this->template_fo->display('struktur_v', $data);
	}

	public function fakultas($fakultas_id) {		
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();  
		$data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();  	    
		
		$fakultas_id = $this->uri->segment(3);		
		$data['daftar_struktur'] = $this->struktur_model->select_fakultas_id($fakultas_id)->result();
		$data['fakultas'] = $this->struktur_model->select_fakultas($fakultas_id)->row();

    	$this->template_fo->display('strukturfakultasid_v', $data);
	}

	public function progdi($progdi_id) {		
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
		$data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();   	    
		
		$progdi_id = $this->uri->segment(3);		
		$data['daftar_struktur'] = $this->struktur_model->select_progdi_id($progdi_id)->result();
		$data['progdi'] = $this->struktur_model->select_progdi($progdi_id)->row();

    	$this->template_fo->display('strukturprogdiid_v', $data);
	}

	public function id($struktur_id) {		
		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
		$data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();    	    
		
		$struktur_id = $this->uri->segment(3);		
		$data['struktur'] = $this->struktur_model->select_by_id($struktur_id)->row();		

    	$this->template_fo->display('strukturid_v', $data);
	}
}
/* Location: ./application/controller/strukturorganisasi.php */
?>