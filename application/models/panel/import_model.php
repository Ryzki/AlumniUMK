<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function insert_alumni($dataarray) // Tambah Data Baru
	{
		for($i=0; $i < count($dataarray); $i++){
	    	$data = array(
		       	'alumni_nim'=> $dataarray[$i]['alumni_nim'],
		        'alumni_nama'=> strtoupper($dataarray[$i]['alumni_nama']),
		        'fakultas_id'=> $dataarray[$i]['fakultas_id'],
		        'progdi_id'=> $dataarray[$i]['progdi_id'],
		        'alumni_tmpt_lhr'=> $dataarray[$i]['alumni_tmpt_lhr'],
		        'alumni_tgl_lhr'=> $dataarray[$i]['alumni_tgl_lhr'],
		        'alumni_hp'=> $dataarray[$i]['alumni_hp'],
		        'alumni_agama'=> $dataarray[$i]['alumni_agama'],
		        'alumni_tgl_masuk'=> $dataarray[$i]['alumni_tgl_masuk'],
		        'alumni_tgl_lulus'=> $dataarray[$i]['alumni_tgl_lulus'],
		        'alumni_status'=> 1,
		        'alumni_active'=> 1,
		        'alumni_import'=> 1,
		        'alumni_tgl_daftar'=> date('Y-m-d'),
		        'alumni_tgl_update'=> date('Y-m-d'),
		        'alumni_jam_update'=> date('Y-m-d H:i:s')
	    	);            
	    	$this->db->insert('umk_alumni', $data);
	    }
	}

	function update_alumni($dataarray)
    {
    	for($i=1;$i<count($dataarray);$i++){
            $data = array(
                'alumni_nama'=> strtoupper($dataarray[$i]['alumni_nama']),
		        'fakultas_id'=> $dataarray[$i]['fakultas_id'],
		        'progdi_id'=> $dataarray[$i]['progdi_id'],
		        'alumni_tmpt_lhr'=> $dataarray[$i]['alumni_tmpt_lhr'],
		        'alumni_tgl_lhr'=> $dataarray[$i]['alumni_tgl_lhr'],
		        'alumni_hp'=> $dataarray[$i]['alumni_hp'],
		        'alumni_agama'=> $dataarray[$i]['alumni_agama'],
		        'alumni_tgl_masuk'=> $dataarray[$i]['alumni_tgl_masuk'],
		        'alumni_tgl_lulus'=> $dataarray[$i]['alumni_tgl_lulus'],
		        'alumni_status'=> 1,
		        'alumni_active'=> 1,
		        'alumni_import'=> 1,
		        'alumni_tgl_daftar'=> date('Y-m-d'),
		        'alumni_tgl_update'=> date('Y-m-d'),
		        'alumni_jam_update'=> date('Y-m-d H:i:s')
            );                       

            $param = array(
               'alumni_nim'=>$dataarray[$i]['alumni_nim']
            );

            $this->db->where($param);
           	
           	return $this->db->update('umk_alumni',$data);   
        }
 	}

	function insert_users($dataarray)
	{
		for($i=0; $i < count($dataarray); $i++){
	    	$data = array(
		       	'alumni_nim'=> $dataarray[$i]['alumni_nim'],
		        'user_username'=> $dataarray[$i]['user_username'],
		        'user_password'=> sha1(trim($dataarray[$i]['user_password'])),
		        'user_name'=> $dataarray[$i]['alumni_nama'],
		        'user_level'=> 'Alumni',
		        'user_online'=> 0,
		        'user_trash'=> 0,
		        'user_date_import'=> date('Y-m-d')
	    	); 

	    	$this->db->insert('umk_users', $data);
	    }
	}

	function update_users($dataarray)
    {
    	for($i=1;$i<count($dataarray);$i++){
            $data = array(
                'user_username'=> $dataarray[$i]['user_username'],
		        'user_password'=> sha1(trim($dataarray[$i]['user_password'])),
		        'user_name'=> $dataarray[$i]['alumni_nama'],
		        'user_level'=> 'Alumni',
		        'user_online'=> 0,
		        'user_trash'=> 0,
		        'user_date_import'=> date('Y-m-d')
            );
            
            $param = array(
               'alumni_nim'=>$dataarray[$i]['alumni_nim']
            );
            $this->db->where($param);
           	
           	return $this->db->update('umk_users',$data);   
        }
 	}

    function getuser()
    {
        $query = $this->db->get('umk_alumni');
        return $query->result();
    }

    function cek_data($alumni_nim)
    {
        $this->db->select('alumni_nim');
		$this->db->from('umk_alumni');			
		$this->db->where('alumni_nim', $alumni_nim);
		
		return $this->db->get();
    }

    function cek_data_users($alumni_nim_users)
    {
        $this->db->select('alumni_nim');
		$this->db->from('umk_users');			
		$this->db->where('alumni_nim', $alumni_nim_users);
		
		return $this->db->get();
    }

    function search_nim($dataarray){
        for($i=1; $i<count($dataarray); $i++){
            $search = array(
                'alumni_nim'=>$dataarray[$i]['alumni_nim']
            );
 		}

		$data = array();
		$this->db->where($search);
		$this->db->limit(1);
		
		$A = $this->db->get('umk_alumni');
		if ($A->num_rows() > 0)
		{
			$data = $A->row_array();
		}
		$A->free_result();
		return $data;
	}

	function search_nim_users($dataarray){
        for($i=1;$i<count($dataarray);$i++){
            $search = array(
                'alumni_nim'=>$dataarray[$i]['alumni_nim']
            );
 		}
		
		$data = array();
		$this->db->where($search);
		$this->db->limit(1);
		
		$U = $this->db->get('umk_users');
		if ($U->num_rows() > 0)
		{
			$data = $U->row_array();
		}
		$U->free_result();
		return $data;
	}

	function select_import()
    {
        $this->db->select('*');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');			
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');			
		$this->db->where('a.alumni_import', 1);
		$this->db->order_by('a.alumni_nim', 'asc');
		
		return $this->db->get();
    }

}
/* Location: ./application/model/panel/import_model.php */
?>