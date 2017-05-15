<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wisuda_model extends CI_Model {
	var $tabel_fakultas = 'umk_m_fakultas';
	var $tabel_progdi   = 'umk_progdi';
	
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
            $result['']= '- Pilih Fakultas -';
            $result[$row->fakultas_id] = $row->fakultas_name;
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
            $result['']= '- Pilih Program Studi -';
            $result[$row->progdi_id] = $row->progdi_name;
        }
 
        return $result;
    }

    function tampil_setting($setting_id = 1) {
    	$this->db->select('*');
		$this->db->from('umk_setting');
		$this->db->where('setting_id', $setting_id);
		
		return $this->db->get();
    }
    
    function select_setting() {
		$this->db->select('*');
		$this->db->from('umk_setting');

		return $this->db->get();
	}

	function select_all($periode) {
		$this->db->select('w.*,a.*,f.fakultas_name,p.progdi_name');
		$this->db->from('umk_wisuda w');
		$this->db->join('umk_alumni a', 'w.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');		
		$this->db->where('a.alumni_trash', 0);
		$this->db->where('w.wisuda_periode', $periode);		
		$this->db->order_by('w.wisuda_id','desc');
		
		return $this->db->get();
	}

	function count_all() {
		return $this->db->count_all('umk_wisuda');
	}

	function select_by_nim($alumni_nim) {
		$this->db->select('*');
		$this->db->from('ft_alumni a');
		$this->db->join('ft_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->join('ft_kegiatan k', 'a.kegiatan_id = k.kegiatan_id');
		$this->db->where('a.alumni_nim', $alumni_nim);		
		
		return $this->db->get();
	}

	function select_data($alumni_nim) {
		$this->db->select('a.*, f.fakultas_name, p.progdi_name');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');		
		$this->db->where('a.alumni_nim', $alumni_nim);		
		
		return $this->db->get();
	}
	
	function cek_fakultas($progdi_code) {
		$this->db->select('*');
		$this->db->from('umk_progdi');		
		$this->db->where('progdi_code', $progdi_code);		
		
		return $this->db->get();
	}
	
	function insert_data_alumni() {
		$nim     	 = trim($this->input->post('nim', 'true'));
		$progdi_code = substr($nim,4,2);

		$data_fakultas 	= $this->wisuda_model->cek_fakultas($progdi_code)->row();
		$fakultas_id 	= $data_fakultas->fakultas_id;
		$progdi_id 		= $data_fakultas->progdi_id;

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'alumni_nim' => trim($this->input->post('nim', 'true')),
					'alumni_nama' => ucwords(trim($this->input->post('nama', 'true'))),
					'alumni_tmpt_lhr' => ucwords(trim($this->input->post('tempat', 'true'))),
					'alumni_tgl_lhr' => $this->input->post('tgl_lahir', 'true'),
					'alumni_hp' => trim($this->input->post('telp', 'true')),
					'alumni_agama' => $this->input->post('lstAgama', 'true'),
					'alumni_alamat' => trim($this->input->post('alamat', 'true')),
	    			'alumni_email' => trim($this->input->post('email', 'true')),
	    			'fakultas_id' => $fakultas_id,
	    			'progdi_id' => $progdi_id,
	    			'alumni_ortu' => trim($this->input->post('nama_ortu', 'true')),
	    			'alumni_kerja_ortu' => trim($this->input->post('kerja_ortu', 'true')),
	    			'alumni_alamat_ortu' => trim($this->input->post('alamat_ortu', 'true')),
	    			'alumni_hp_ortu' => trim($this->input->post('telp_ortu', 'true')),
	    			'alumni_foto' => $this->upload->file_name,
	    			'alumni_tgl_daftar' => date('Y-m-d'),
	    			'alumni_status' => 2
				);
		} else {	
			$data = array(
					'alumni_nim' => trim($this->input->post('nim', 'true')),
					'alumni_nama' => ucwords(trim($this->input->post('nama', 'true'))),
					'alumni_tmpt_lhr' => ucwords(trim($this->input->post('tempat', 'true'))),
					'alumni_tgl_lhr' => $this->input->post('tgl_lahir', 'true'),
					'alumni_hp' => trim($this->input->post('telp', 'true')),
					'alumni_agama' => $this->input->post('lstAgama', 'true'),
					'alumni_alamat' => trim($this->input->post('alamat', 'true')),
	    			'alumni_email' => trim($this->input->post('email', 'true')),
	    			'fakultas_id' => $fakultas_id,
	    			'progdi_id' => $progdi_id,
	    			'alumni_ortu' => trim($this->input->post('nama_ortu', 'true')),
	    			'alumni_kerja_ortu' => trim($this->input->post('kerja_ortu', 'true')),
	    			'alumni_alamat_ortu' => trim($this->input->post('alamat_ortu', 'true')),
	    			'alumni_hp_ortu' => trim($this->input->post('telp_ortu', 'true')),
	    			'alumni_tgl_daftar' => date('Y-m-d'),
	    			'alumni_tgl_update' => date('Y-m-d'),
	    			'alumni_jam_update' => date('Y-m-d H:i:s'),
	    			'alumni_status' => 2
				);
		}

		$this->db->insert('umk_alumni', $data);

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

		$data = array(
				'alumni_nim' => trim($this->input->post('nim', 'true')),
				'wisuda_periode' => $this->input->post('setting_periode', 'true'),
				'wisuda_info' => $this->input->post('setting_info', 'true'),
				'wisuda_judulproyek' => ucwords(trim($this->input->post('judul', 'true'))),
				'wisuda_tgl_daftar' => date('Y-m-d'),
				'wisuda_jam_daftar' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_wisuda', $data);
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

	// Add Data Mahasiswa Wisuda Baru
	function insert_data_wisuda() {
		$data = array(
				'alumni_nim' => trim($this->input->post('nim', 'true')),
				'wisuda_periode' => $this->input->post('setting_periode', 'true'),
				'wisuda_info' => $this->input->post('setting_info', 'true'),
				'wisuda_judulproyek' => ucwords(trim($this->input->post('judul', 'true'))),
				'wisuda_tgl_daftar' => date('Y-m-d'),
				'wisuda_jam_daftar' => date('Y-m-d H:i:s')
				);
		
		$this->db->insert('umk_wisuda', $data);
	}

	function select_data_wisuda($wisuda_id) {
		$this->db->select('*');
		$this->db->from('umk_wisuda w');
		$this->db->join('umk_alumni a', 'w.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');		
		$this->db->where('w.wisuda_id', $wisuda_id);		
		
		return $this->db->get();
	}			
}
/* Location: ./application/model/wisuda_model.php */
?>