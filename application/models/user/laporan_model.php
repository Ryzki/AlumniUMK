<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_progdi() {
		$user_id = $this->session->userdata('a_user_id');

		$this->db->select('*');
		$this->db->from('umk_user_akses a');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->join('umk_m_fakultas f', 'p.fakultas_id = f.fakultas_id');
		$this->db->where('a.user_id', $user_id);
		$this->db->order_by('a.progdi_id','asc');
		
		return $this->db->get();
	}
	
	function select_progdi2($progdi_id) {		
		$this->db->select('*');
		$this->db->from('umk_progdi');
		$this->db->where('progdi_id', $progdi_id);		
		
		return $this->db->get();
	}

	function preview_wisuda($data) {		
		$status 	= $this->input->post('lstStatus');
		$progdi 	= $this->input->post('lstProgdi');
		$tgl1		= $this->input->post('tgl1');
		$tgl2		= $this->input->post('tgl2');		

		if ($status == 'all' && $progdi <> 'all') { // Jika Semua Status dan Progdi by ID			
			$sql= 'SELECT w.*,a.*,f.fakultas_name,p.progdi_name FROM umk_wisuda w JOIN umk_alumni a 
			ON w.alumni_nim = a.alumni_nim JOIN umk_m_fakultas f ON a.fakultas_id = f.fakultas_id 
			JOIN umk_progdi p ON a.progdi_id = p.progdi_id WHERE a.progdi_id = ? AND w.wisuda_periode >= ?
			AND w.wisuda_periode <= ? AND a.alumni_status=2 ORDER BY a.alumni_nama ASC';		
		} elseif ($status <> 'all' && $progdi <> 'all' ) { // Jika Status by ID dan Progdi by ID			
			$sql= 'SELECT w.*,a.*,f.fakultas_name,p.progdi_name FROM umk_wisuda w JOIN umk_alumni a 
			ON w.alumni_nim = a.alumni_nim JOIN umk_m_fakultas f ON a.fakultas_id = f.fakultas_id 
			JOIN umk_progdi p ON a.progdi_id = p.progdi_id WHERE w.wisuda_status = ? AND  a.progdi_id = ? 
			AND w.wisuda_periode >= ? AND w.wisuda_periode <= ? AND a.alumni_status=2 
			ORDER BY a.alumni_nama ASC';
		}
		
		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	function preview_alumni($data) {				
		$progdi 	= $this->input->post('lstProgdi');		
			
		$sql= 'SELECT w.*,a.*,f.fakultas_name,p.progdi_name FROM umk_wisuda w JOIN umk_alumni a 
			ON w.alumni_nim = a.alumni_nim JOIN umk_m_fakultas f ON a.fakultas_id = f.fakultas_id 
			JOIN umk_progdi p ON a.progdi_id = p.progdi_id WHERE a.progdi_id = ? ORDER BY a.alumni_nama ASC';		
		
		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	function cetak_all_alumni() {
		$sql= 'SELECT a.*,p.progdi_name,k.kegiatan_desc FROM ft_alumni a JOIN ft_progdi p ON a.progdi_id = p.progdi_id 
		JOIN ft_kegiatan k ON a.kegiatan_id=k.kegiatan_id ORDER BY a.alumni_nama ASC';

		$query = $this->db->query($sql);
		return $query->result();
	}

	/*function cetak_kegiatan_alumni($data) {
		$kegiatan 	= $this->uri->segment(4);

		$sql= 'SELECT a.*,p.progdi_name,k.kegiatan_desc FROM ft_alumni a JOIN ft_progdi p ON a.progdi_id = p.progdi_id 
		JOIN ft_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.kegiatan_id = ? ORDER BY a.alumni_nama ASC';

		$query = $this->db->query($sql, $data);
		return $query->result();
	}*/

	function cetak_progdi_wisuda($data) {
		$progdi 	= $this->uri->segment(4);
		$tgl1		= $this->uri->segment(5);
		$tgl2		= $this->uri->segment(6);

		$sql= 'SELECT w.*,a.*,f.fakultas_name,p.progdi_name FROM umk_wisuda w JOIN umk_alumni a 
			ON w.alumni_nim = a.alumni_nim JOIN umk_m_fakultas f ON a.fakultas_id = f.fakultas_id 
			JOIN umk_progdi p ON a.progdi_id = p.progdi_id WHERE a.progdi_id = ? AND w.wisuda_periode >= ?
			AND w.wisuda_periode <= ? AND a.alumni_status = 2 ORDER BY a.alumni_nama ASC';

		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	function cetak_wisuda_by_id($data) {
		$progdi 	= $this->uri->segment(4);
		$tgl1		= $this->uri->segment(5);
		$tgl2		= $this->uri->segment(6);
		$status 	= $this->uri->segment(7);

		$sql= 'SELECT w.*,a.*,f.fakultas_name,p.progdi_name FROM umk_wisuda w JOIN umk_alumni a 
			ON w.alumni_nim = a.alumni_nim JOIN umk_m_fakultas f ON a.fakultas_id = f.fakultas_id 
			JOIN umk_progdi p ON a.progdi_id = p.progdi_id WHERE a.progdi_id = ? AND w.wisuda_periode >= ?
			AND w.wisuda_periode <= ? AND w.wisuda_status = ? AND a.alumni_status = 2 
			ORDER BY a.alumni_nama ASC';

		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	function cetak_progdi_alumni($data) {
		$progdi 	= $this->uri->segment(4);

		$sql= 'SELECT w.*,a.*,f.fakultas_name,p.progdi_name FROM umk_wisuda w JOIN umk_alumni a 
			ON w.alumni_nim = a.alumni_nim JOIN umk_m_fakultas f ON a.fakultas_id = f.fakultas_id 
			JOIN umk_progdi p ON a.progdi_id = p.progdi_id WHERE a.progdi_id = ? ORDER BY a.alumni_nama ASC';

		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	/*function cetak_alumni($data) {		
		$progdi 	= $this->uri->segment(4);
		$kegiatan 	= $this->uri->segment(5);

		if ($progdi == '' && $kegiatan == '') {
			$sql= 'SELECT a.*,p.progdi_name,k.kegiatan_desc FROM ft_alumni a JOIN ft_progdi p ON a.progdi_id = p.progdi_id 
			JOIN ft_kegiatan k ON a.kegiatan_id=k.kegiatan_id ORDER BY a.alumni_nama ASC';
		} elseif ($progdi <> '' && $kegiatan == '') {		
			$sql= 'SELECT a.*,p.progdi_name,k.kegiatan_desc FROM ft_alumni a JOIN ft_progdi p ON a.progdi_id = p.progdi_id 
			JOIN ft_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.progdi_id = '.$progdi.' ORDER BY a.alumni_nama ASC';
		} elseif ($progdi == '' && $kegiatan <> '') {
			$sql= 'SELECT a.*,p.progdi_name,k.kegiatan_desc FROM ft_alumni a JOIN ft_progdi p ON a.progdi_id = p.progdi_id 
			JOIN ft_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.kegiatan_id = '.$kegiatan.' ORDER BY a.alumni_nama ASC';
		} elseif ($progdi <> '' && $kegiatan <> '') {
			$sql= 'SELECT a.*,p.progdi_name,k.kegiatan_desc FROM ft_alumni a JOIN ft_progdi p ON a.progdi_id = p.progdi_id  
			JOIN ft_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.progdi_id = '.$progdi.' AND a.kegiatan_id = '.$kegiatan.' ORDER BY a.alumni_nama ASC';
		}
		
		$query = $this->db->query($sql, $data);
		return $query->result();
	} */		
}
/* Location: ./application/model/user/laporan_model.php */
?>