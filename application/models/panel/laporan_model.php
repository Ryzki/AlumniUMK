<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_fakultas() {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');
		$this->db->where('fakultas_status', 0);		
		$this->db->order_by('fakultas_id','asc');
		
		return $this->db->get();
	}

	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi p');
		$this->db->join('umk_m_fakultas m', 'p.fakultas_id = m.fakultas_id');
		$this->db->order_by('p.progdi_id','asc');
		
		return $this->db->get();
	}

	function select_kegiatan() {
		$this->db->select('*');
		$this->db->from('umk_kegiatan');		
		$this->db->order_by('kegiatan_id','asc');
		
		return $this->db->get();
	}
	
	function preview_alumni($data) {		
		$progdi 	= $this->input->post('lstProgdi');
		$kegiatan 	= $this->input->post('lstKegiatan');		

		if ($progdi == "all" && $kegiatan == 'all') {			
			$sql= 'SELECT a.*,f.fakultas_name,p.progdi_name,k.kegiatan_desc FROM umk_alumni a JOIN umk_m_fakultas f 
			ON a.fakultas_id=f.fakultas_id JOIN umk_progdi p ON a.progdi_id = p.progdi_id 
			LEFT JOIN umk_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.alumni_tgl_lulus>= ?
			AND a.alumni_tgl_lulus <= ? AND a.alumni_active=1 ORDER BY a.alumni_nama ASC';
		} elseif ($progdi == 'all' && $kegiatan <> 'all') { // Jika Semua Progdi dan Kegiatan by ID			
			$sql= 'SELECT a.*,f.fakultas_name,p.progdi_name,k.kegiatan_desc FROM umk_alumni a JOIN umk_m_fakultas f 
			ON a.fakultas_id=f.fakultas_id JOIN umk_progdi p ON a.progdi_id = p.progdi_id 
			JOIN umk_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.kegiatan_id = ? AND a.alumni_tgl_lulus>= ?
			AND a.alumni_tgl_lulus <= ? AND a.alumni_active=1 ORDER BY a.alumni_nama ASC';
		} elseif ($progdi <> 'all' && $kegiatan == 'all') { // Jika Progdi by ID dan Semua Kegiatan			
			$sql= 'SELECT a.*,f.fakultas_name,p.progdi_name,k.kegiatan_desc FROM umk_alumni a JOIN umk_m_fakultas f 
			ON a.fakultas_id=f.fakultas_id JOIN umk_progdi p ON a.progdi_id = p.progdi_id 
			LEFT JOIN umk_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.progdi_id = ? AND a.alumni_tgl_lulus>= ?
			AND a.alumni_tgl_lulus <= ? AND a.alumni_active=1 
			ORDER BY a.alumni_nama ASC';						
		} elseif ($progdi <> 'all' && $kegiatan <> 'all' ) { // Jika Progdi by ID dan Kegiatan by ID			
			$sql= 'SELECT a.*,f.fakultas_name,p.progdi_name,k.kegiatan_desc FROM umk_alumni a JOIN umk_m_fakultas f 
			ON a.fakultas_id=f.fakultas_id JOIN umk_progdi p ON a.progdi_id = p.progdi_id  
			LEFT JOIN umk_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.progdi_id = ? AND a.kegiatan_id = ? 
			AND a.alumni_tgl_lulus>= ? AND a.alumni_tgl_lulus <= ? AND a.alumni_active=1 
			ORDER BY a.alumni_nama ASC';
		}
		
		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	function cetak_all_alumni($data) {
		$tgl1 = $this->uri->segment(4);
		$tgl2 = $this->uri->segment(5);

		$sql= 'SELECT a.*,f.fakultas_name,p.progdi_name,k.kegiatan_desc FROM umk_alumni a JOIN umk_m_fakultas f 
			ON a.fakultas_id=f.fakultas_id JOIN umk_progdi p ON a.progdi_id = p.progdi_id 
		LEFT JOIN umk_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.alumni_tgl_lulus >= ?
		AND a.alumni_tgl_lulus <= ? AND a.alumni_active= 1	ORDER BY a.alumni_nama ASC';

		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	function cetak_kegiatan_alumni($data) {
		$kegiatan 	= $this->uri->segment(4);
		$tgl1 		= $this->uri->segment(5);
		$tgl2 		= $this->uri->segment(6);

		$sql= 'SELECT a.*,f.fakultas_name,p.progdi_name,k.kegiatan_desc FROM umk_alumni a JOIN umk_m_fakultas f 
			ON a.fakultas_id=f.fakultas_id JOIN umk_progdi p ON a.progdi_id = p.progdi_id 
			LEFT JOIN umk_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.kegiatan_id = ? 
			AND a.alumni_tgl_lulus >= ? AND a.alumni_tgl_lulus <= ? AND a.alumni_active=1 
			ORDER BY a.alumni_nama ASC';

		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	function cetak_progdi_alumni($data) {
		$progdi 	= $this->uri->segment(4);
		$tgl1 		= $this->uri->segment(5);
		$tgl2 		= $this->uri->segment(6);

		$sql= 'SELECT a.*,f.fakultas_name,p.progdi_name,k.kegiatan_desc FROM umk_alumni a JOIN umk_m_fakultas f 
			ON a.fakultas_id=f.fakultas_id JOIN umk_progdi p ON a.progdi_id = p.progdi_id 
			LEFT JOIN umk_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.progdi_id = ?
			AND a.alumni_tgl_lulus >= ? AND a.alumni_tgl_lulus <= ? AND a.alumni_active=1 
			ORDER BY a.alumni_nama ASC';

		$query = $this->db->query($sql, $data);
		return $query->result();
	}

	function cetak_alumni_by_id($data) {
		$progdi 	= $this->uri->segment(4);
		$kegiatan 	= $this->uri->segment(5);
		$tgl1 		= $this->uri->segment(6);
		$tgl2 		= $this->uri->segment(7);

		$sql= 'SELECT a.*,f.fakultas_name,p.progdi_name,k.kegiatan_desc FROM umk_alumni a JOIN umk_m_fakultas f 
			ON a.fakultas_id=f.fakultas_id JOIN umk_progdi p ON a.progdi_id = p.progdi_id 
			LEFT JOIN umk_kegiatan k ON a.kegiatan_id=k.kegiatan_id WHERE a.progdi_id = ? AND a.kegiatan_id = ? 
			AND a.alumni_tgl_lulus>= ? AND a.alumni_tgl_lulus <= ? AND a.alumni_active=1 ORDER BY a.alumni_nama ASC';

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

	function preview_kuesioner_all() {		
		$Tahun1 = $this->input->post('tahun1');
		$Tahun2 = $this->input->post('tahun2');		

		$this->db->select('a.alumni_nim, a.alumni_nama, f.fakultas_name, p.progdi_name, d.dikti_date_update');
		$this->db->from('umk_kuesioner_dikti d');
		$this->db->join('umk_alumni a', 'd.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
		$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.alumni_trash', 0);
		$this->db->order_by('a.alumni_nim','asc');
		
		return $this->db->get();
	}

	function preview_kuesioner_progdi() {
		$Progdi = $this->input->post('lstProgdi');
		$Tahun1 = $this->input->post('tahun1');
		$Tahun2 = $this->input->post('tahun2');		

		$this->db->select('a.alumni_nim, a.alumni_nama, f.fakultas_name, p.progdi_name, d.dikti_date_update');
		$this->db->from('umk_kuesioner_dikti d');
		$this->db->join('umk_alumni a', 'd.alumni_nim = a.alumni_nim');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->where('a.progdi_id', $Progdi);
		$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
		$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.alumni_trash', 0);
		$this->db->order_by('a.alumni_nim','asc');
		
		return $this->db->get();
	}

	function export_all_kuesioner() {
		$Tahun1 = $this->uri->segment(4);
		$Tahun2 = $this->uri->segment(5);

		$this->db->select('a.alumni_nim, a.alumni_nama, a.alumni_hp, a.alumni_email, d.*');
		$this->db->from('umk_kuesioner_dikti d');
		$this->db->join('umk_alumni a', 'd.alumni_nim = a.alumni_nim');		
		$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
		$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);
		$this->db->where('a.alumni_active', 1);		
		$this->db->order_by('a.alumni_nim','asc');
		
		return $this->db->get();
	}

	function export_progdi_kuesioner() {
		$Progdi = $this->uri->segment(4);
		$Tahun1 = $this->uri->segment(5);
		$Tahun2 = $this->uri->segment(6);

		$this->db->select('a.alumni_nim, a.alumni_nama, a.alumni_hp, a.alumni_email, d.*');
		$this->db->from('umk_kuesioner_dikti d');
		$this->db->join('umk_alumni a', 'd.alumni_nim = a.alumni_nim');		
		$this->db->where('a.progdi_id', $Progdi);
		$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
		$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);
		$this->db->where('a.alumni_active', 1);		
		$this->db->order_by('a.alumni_nim','asc');
		
		return $this->db->get();
	}

	function select_wisuda_all() {
		$Tgl1 = $this->input->post('tgl1');
		$Tgl2 = $this->input->post('tgl2');

		$this->db->select('a.alumni_foto, a.alumni_nim, a.alumni_nama, a.alumni_tmpt_lhr, a.alumni_tgl_lhr, a.alumni_agama,
			a.alumni_alamat, a.alumni_hp, a.alumni_email, w.wisuda_periode, w.wisuda_judulproyek');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_wisuda w', 'a.alumni_nim = w.alumni_nim');		
		$this->db->where('w.wisuda_periode >=', $Tgl1);
		$this->db->where('w.wisuda_periode <=', $Tgl2);
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.alumni_status', 2);		
		$this->db->order_by('a.alumni_nim','asc');
		
		return $this->db->get();
	}

	function select_wisuda_progdi() {
		$Progdi = $this->input->post('lstProgdi');
		$Tgl1 = $this->input->post('tgl1');
		$Tgl2 = $this->input->post('tgl2');

		$this->db->select('a.alumni_foto, a.alumni_nim, a.alumni_nama, a.alumni_tmpt_lhr, a.alumni_tgl_lhr, a.alumni_agama,
			a.alumni_alamat, a.alumni_hp, a.alumni_email, w.wisuda_periode, w.wisuda_judulproyek');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_wisuda w', 'a.alumni_nim = w.alumni_nim');		
		$this->db->where('a.progdi_id', $Progdi);
		$this->db->where('w.wisuda_periode >=', $Tgl1);
		$this->db->where('w.wisuda_periode <=', $Tgl2);
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.alumni_status', 2);		
		$this->db->order_by('a.alumni_nim','asc');
		
		return $this->db->get();
	}		
}
/* Location: ./application/model/panel/laporan_model.php */
?>