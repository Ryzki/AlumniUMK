<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orangtua_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}	

	function insert_data_orangtua() {		
		$data = array(
				'progdi_id'    => $this->input->post('lstProgdi', 'true'),
				'orangtua_nama' => trim($this->input->post('txtNama', 'true')),
				'orangtua_pekerjaan' => trim($this->input->post('txtKerja', 'true')),
				'orangtua_pendidikan' => trim($this->input->post('txtDidik', 'true')),
				'orangtua_nama_anak' => trim($this->input->post('txtNamaAnak', 'true')),
				'orangtua_kualitas_layanan' => trim($this->input->post('txtLayanan', 'true')),
				'orangtua_kualitas_belajar' => trim($this->input->post('txtBelajar', 'true')),
				'orangtua_infra_fasilitas' => trim($this->input->post('txtInfra', 'true')),
				'orangtua_hard_soft' => trim($this->input->post('txtHardSoft', 'true')),
				'orangtua_saran' => trim($this->input->post('txtSaran', 'true')),
				'orangtua_date_update' => date('Y-m-d'),
	    		'orangtua_time_update' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_orangtua', $data);
	}									
}
/* Location: ./application/model/orangtua_model.php */
?>