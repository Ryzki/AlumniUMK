<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function getFakultasList() {
		$result = array();
		$this->db->from('umk_m_fakultas');
		$this->db->where('fakultas_trash', 0);
		$this->db->where('fakultas_status', 0);
        $this->db->order_by('fakultas_id','asc');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '- Pilih Fakultas -';
            $result[$row->fakultas_id]= $row->fakultas_name;
        }
        return $result;
	}

	function getProgdiList(){
        $fakultas_id = $this->input->post('fakultas_id');
        
        $result = array();
        $this->db->select('*');
        $this->db->from('umk_progdi');
        $this->db->where('fakultas_id', $fakultas_id);
        $this->db->order_by('progdi_id','asc');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '- Pilih Program Studi -';
            $result[$row->progdi_id]= $row->progdi_name;
        }
 
        return $result;
    }

    function cek_fakultas($progdi_code) {
		$this->db->select('*');
		$this->db->from('umk_progdi');		
		$this->db->where('progdi_code', $progdi_code);		
		
		return $this->db->get();
	}

	function insert_data() {
		$nim     	 = strtoupper(trim($this->input->post('nim')));
		$progdi_code = substr($nim,4,2);

		$data_fakultas 	= $this->daftar_model->cek_fakultas($progdi_code)->row();
		$fakultas_id 	= $data_fakultas->fakultas_id;
		$progdi_id 		= $data_fakultas->progdi_id;		
		
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'alumni_nim' 		=> $nim,
					'alumni_nama' 		=> ucwords(trim($this->input->post('nama', 'true'))),
					'alumni_tmpt_lhr' 	=> ucwords(trim($this->input->post('tempat', 'true'))),
					'alumni_tgl_lhr' 	=> $this->input->post('tgl_lahir', 'true'),
					'alumni_hp' 		=> trim($this->input->post('telp', 'true')),
					'alumni_agama' 		=> $this->input->post('lstAgama', 'true'),					
	    			'alumni_email' 		=> trim($this->input->post('email', 'true')),
	    			'fakultas_id' 		=> $fakultas_id,
	    			'progdi_id' 		=> $progdi_id,
	    			'alumni_foto' 		=> $this->upload->file_name,
	    			'alumni_tgl_daftar' => date('Y-m-d'),
	    			'alumni_status' 	=> 1,
	    			'alumni_tgl_update' => date('Y-m-d'),
	    			'alumni_jam_update' => date('Y-m-d H:i:s')
				);
		} else {	
			$data = array(
					'alumni_nim' 		=> $nim,
					'alumni_nama' 		=> ucwords(trim($this->input->post('nama', 'true'))),
					'alumni_tmpt_lhr' 	=> ucwords(trim($this->input->post('tempat', 'true'))),
					'alumni_tgl_lhr' 	=> $this->input->post('tgl_lahir', 'true'),
					'alumni_hp' 		=> trim($this->input->post('telp', 'true')),
					'alumni_agama' 		=> $this->input->post('lstAgama', 'true'),					
	    			'alumni_email' 		=> trim($this->input->post('email', 'true')),
	    			'fakultas_id' 		=> $fakultas_id,
	    			'progdi_id' 		=> $progdi_id,	    			
	    			'alumni_tgl_daftar' => date('Y-m-d'),
	    			'alumni_status' 	=> 1,
	    			'alumni_tgl_update' => date('Y-m-d'),
	    			'alumni_jam_update' => date('Y-m-d H:i:s')
				);
		}

		$this->db->insert('umk_alumni', $data);

		$tglx     = $this->input->post('tgl_lahir', 'true'); 		
        $tanggalx = substr($tglx,8,2);
        $bulanx   = substr($tglx,5,2);
        $tahunx   = substr($tglx,0,4);
		$password = $tahunx.$bulanx.$tanggalx;

		$data = array(
				'alumni_nim'    => $nim,
				'user_username' => $nim,
				'user_password' => sha1(trim($password)),
				'user_name'     => ucwords(trim($this->input->post('nama', 'true'))),
				'user_level'    => 'Alumni'
				);
		
		$this->db->insert('umk_users', $data);
	}

	function insert_data_user() {
		$tglx     = $this->input->post('tgl_lahir', 'true'); 		
        $tanggalx = substr($tglx,8,2);
        $bulanx   = substr($tglx,5,2);
        $tahunx   = substr($tglx,0,4);
		$password = $tahunx.$bulanx.$tanggalx;

		$data = array(
				'alumni_nim'    => trim($this->input->post('nim', 'true')),
				'user_username' => trim($this->input->post('nim', 'true')),
				'user_password' => sha1(trim($password)),
				'user_name'     => ucwords(trim($this->input->post('nama', 'true'))),
				'user_level'    => 'Alumni'
				);
		
		$this->db->insert('umk_users', $data);
	}								
}
/* Location: ./application/model/daftar_model.php */
?>