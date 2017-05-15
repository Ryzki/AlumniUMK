<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistik_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi p');
		$this->db->join('umk_m_fakultas m', 'p.fakultas_id = m.fakultas_id');
		$this->db->order_by('p.progdi_id','asc');
		
		return $this->db->get();
	}

	function select_progdi_by_id($progdi_id) {
		$this->db->select('progdi_name');
		$this->db->from('umk_progdi');
		$this->db->where('progdi_id', $progdi_id);		
		
		return $this->db->get();
	}

	function select_kegiatan() {
		$this->db->select('*');
		$this->db->from('umk_kegiatan');				      
		$this->db->order_by('kegiatan_id', 'asc');
		
		return $this->db->get();
	}

	function select_by_kegiatan($kegiatan_id) {
		$this->db->select('COUNT(alumni_nim) as total FROM umk_alumni');
		$this->db->where('kegiatan_id', $kegiatan_id);		
				
		return $this->db->get();
	}


	function select_by_kegiatan_progdi($kegiatan_id) {
		$progdi_id = $this->input->post('lstProgdi', 'true');	
		$Tahun1 = $this->input->post('tahun1', 'true');
		$Tahun2 = $this->input->post('tahun2', 'true');

		if ($progdi_id == 'all') {			
			$this->db->select('COUNT(alumni_nim) as total FROM umk_alumni');
			$this->db->where('kegiatan_id', $kegiatan_id);
			$this->db->where('YEAR(alumni_tgl_lulus) >=', $Tahun1);
			$this->db->where('YEAR(alumni_tgl_lulus) <=', $Tahun2);
		} else {			
			$this->db->select('COUNT(alumni_nim) as total FROM umk_alumni');
			$this->db->where('kegiatan_id', $kegiatan_id);
			$this->db->where('progdi_id', $progdi_id);
			$this->db->where('YEAR(alumni_tgl_lulus) >=', $Tahun1);
			$this->db->where('YEAR(alumni_tgl_lulus) <=', $Tahun2);		
		}

		return $this->db->get();			
	}

	function select_skala() {
		$this->db->select('*');
		$this->db->from('umk_skala');				      
		$this->db->order_by('skala_id', 'asc');
		
		return $this->db->get();
	}

	function select_by_skala($skala_id) {
		$this->db->select('COUNT(alumni_nim) as total FROM umk_alumni');
		$this->db->where('skala_id', $skala_id);		
		
		return $this->db->get();
	}

	function select_by_skala_progdi($skala_id) {
		$progdi_id = $this->input->post('lstProgdi', 'true');
		$Tahun1 = $this->input->post('tahun1', 'true');
		$Tahun2 = $this->input->post('tahun2', 'true');

		if ($progdi_id == 'all') {
			$this->db->select('COUNT(alumni_nim) as total FROM umk_alumni');
			$this->db->where('skala_id', $skala_id);
			$this->db->where('YEAR(alumni_tgl_lulus) >=', $Tahun1);
			$this->db->where('YEAR(alumni_tgl_lulus) <=', $Tahun2);
		} else {
			$this->db->select('COUNT(alumni_nim) as total FROM umk_alumni');
			$this->db->where('skala_id', $skala_id);
			$this->db->where('progdi_id', $progdi_id);
			$this->db->where('YEAR(alumni_tgl_lulus) >=', $Tahun1);
			$this->db->where('YEAR(alumni_tgl_lulus) <=', $Tahun2);
		}		
		
		return $this->db->get();
	}

	function select_gaji() {
		$this->db->select('*');
		$this->db->from('umk_gaji');				      
		$this->db->order_by('gaji_id', 'asc');
		
		return $this->db->get();
	}

	function select_by_gaji($gaji_id) {
		$this->db->select('COUNT(p.alumni_nim) as total FROM umk_alumni a 
			JOIN umk_perusahaan p ON a.alumni_nim=p.alumni_nim 
			JOIN umk_gaji g ON p.gaji_id=g.gaji_id');
		$this->db->where('p.gaji_id', $gaji_id);		
		
		return $this->db->get();
	}

	function select_by_gaji_progdi($gaji_id) {
		$progdi_id = $this->input->post('lstProgdi', 'true');
		$Tahun1 = $this->input->post('tahun1', 'true');
		$Tahun2 = $this->input->post('tahun2', 'true');

		if ($progdi_id == 'all') {
			$this->db->select('COUNT(p.alumni_nim) as total FROM umk_alumni a 
				JOIN umk_perusahaan p ON a.alumni_nim=p.alumni_nim 
				JOIN umk_gaji g ON p.gaji_id=g.gaji_id');
			$this->db->where('p.gaji_id', $gaji_id);
			$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
			$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);
		} else {
			$this->db->select('COUNT(p.alumni_nim) as total FROM umk_alumni a 
				JOIN umk_perusahaan p ON a.alumni_nim=p.alumni_nim 
				JOIN umk_gaji g ON p.gaji_id=g.gaji_id');
			$this->db->where('p.gaji_id', $gaji_id);
			$this->db->where('progdi_id', $progdi_id);
			$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
			$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);
		}		
		
		return $this->db->get();
	}

	function select_jenis() {
		$this->db->select('*');
		$this->db->from('umk_jenis_perusahaan');				      
		$this->db->order_by('jenis_id', 'asc');
		
		return $this->db->get();
	}

	function select_by_jenis($jenis_id) {
		$this->db->select('COUNT(p.alumni_nim) as total FROM umk_alumni a 
			JOIN umk_perusahaan p ON a.alumni_nim=p.alumni_nim 
			JOIN umk_gaji g ON p.gaji_id=g.gaji_id');
		$this->db->where('p.jenis_id', $jenis_id);		
		
		return $this->db->get();
	}

	function select_by_jenis_progdi($jenis_id) {
		$progdi_id = $this->input->post('lstProgdi', 'true');
		$Tahun1 = $this->input->post('tahun1', 'true');
		$Tahun2 = $this->input->post('tahun2', 'true');

		if ($progdi_id == 'all') {
			$this->db->select('COUNT(p.alumni_nim) as total FROM umk_alumni a 
				JOIN umk_perusahaan p ON a.alumni_nim=p.alumni_nim 
				JOIN umk_gaji g ON p.gaji_id=g.gaji_id');
			$this->db->where('p.jenis_id', $jenis_id);
			$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
			$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);		
		} else {
			$this->db->select('COUNT(p.alumni_nim) as total FROM umk_alumni a 
				JOIN umk_perusahaan p ON a.alumni_nim=p.alumni_nim 
				JOIN umk_gaji g ON p.gaji_id=g.gaji_id');
			$this->db->where('p.jenis_id', $jenis_id);
			$this->db->where('progdi_id', $progdi_id);
			$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
			$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);	
		}
		
		return $this->db->get();
	}

	function select_bekerja() {
		$Tahun1 = $this->input->post('tahun1', 'true');
		$Tahun2 = $this->input->post('tahun2', 'true');

		$this->db->select('a.alumni_nim, a.alumni_tgl_lulus, a.kegiatan_id, p.perusahaan_tgl_masuk');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_perusahaan p', 'a.alumni_nim = p.alumni_nim');				      
		$this->db->where('a.kegiatan_id', '1');
		$this->db->where('a.alumni_tgl_lulus <>', '');
		$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
		$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);
		$this->db->order_by('a.alumni_nim', 'asc');
			
		return $this->db->get();		
	}

	function select_bekerja_2() {
		$progdi_id = $this->input->post('lstProgdi', 'true');
		$Tahun1 = $this->input->post('tahun1', 'true');
		$Tahun2 = $this->input->post('tahun2', 'true');

		$this->db->select('a.alumni_nim, a.alumni_tgl_lulus, a.kegiatan_id, p.perusahaan_tgl_masuk');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_perusahaan p', 'a.alumni_nim = p.alumni_nim');				      
		$this->db->where('a.kegiatan_id', '1');
		$this->db->where('a.alumni_tgl_lulus <>', '');
		$this->db->where('a.progdi_id', $progdi_id);
		$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
		$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);
		$this->db->order_by('a.alumni_nim', 'asc');

		return $this->db->get();		
	}								
}
/* Location: ./application/model/statistik_model.php */
?>