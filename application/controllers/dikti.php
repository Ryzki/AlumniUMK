<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dikti extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('dikti_model');		
		$this->load->model('menu_model');
	}
	
	public function index(){
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));
		$user_id = $this->session->userdata('user_id');	
		$nim = $this->session->userdata('nim');		
		$data['alumni'] = $this->dikti_model->select_alumni($nim)->row();
		$data['detail'] = $this->dikti_model->select_dikti($nim)->row();		

    	$this->template_account->display('dikti_v', $data);	
	}

	public function savedata () {		
		$this->form_validation->set_rules('f301','<b></b>','trim');
		$this->form_validation->set_rules('f302','<b></b>','trim');
		$this->form_validation->set_rules('f303','<b></b>','trim');
		$this->form_validation->set_rules('f401','<b></b>','trim');
		$this->form_validation->set_rules('f402','<b></b>','trim');
		$this->form_validation->set_rules('f403','<b></b>','trim');
		$this->form_validation->set_rules('f404','<b></b>','trim');
		$this->form_validation->set_rules('f405','<b></b>','trim');
		$this->form_validation->set_rules('f406','<b></b>','trim');
		$this->form_validation->set_rules('f407','<b></b>','trim');
		$this->form_validation->set_rules('f408','<b></b>','trim');
		$this->form_validation->set_rules('f409','<b></b>','trim');
		$this->form_validation->set_rules('f410','<b></b>','trim');
		$this->form_validation->set_rules('f411','<b></b>','trim');
		$this->form_validation->set_rules('f412','<b></b>','trim');
		$this->form_validation->set_rules('f413','<b></b>','trim');
		$this->form_validation->set_rules('f414','<b></b>','trim');
		$this->form_validation->set_rules('f415','<b></b>','trim');
		$this->form_validation->set_rules('f416','<b></b>','trim');
		$this->form_validation->set_rules('f500','<b></b>','trim');
		$this->form_validation->set_rules('f501','<b></b>','trim');
		$this->form_validation->set_rules('f502','<b></b>','trim');		
		$this->form_validation->set_rules('f6','<b></b>','trim');
		$this->form_validation->set_rules('f7','<b></b>','trim');
		$this->form_validation->set_rules('f7a','<b></b>','trim');
		$this->form_validation->set_rules('f8','<b></b>','trim');
		$this->form_validation->set_rules('f901','<b></b>','trim');
		$this->form_validation->set_rules('f902','<b></b>','trim');
		$this->form_validation->set_rules('f903','<b></b>','trim');
		$this->form_validation->set_rules('f904','<b></b>','trim');
		$this->form_validation->set_rules('f905','<b></b>','trim');
		$this->form_validation->set_rules('f906','<b></b>','trim');
		$this->form_validation->set_rules('f1001','<b></b>','trim');
		$this->form_validation->set_rules('f1002','<b></b>','trim');
		$this->form_validation->set_rules('f1101','<b></b>','trim');
		$this->form_validation->set_rules('f1102','<b></b>','trim');
		$this->form_validation->set_rules('f12','<b></b>','trim');
		$this->form_validation->set_rules('f1301','<b></b>','');
		$this->form_validation->set_rules('f1302','<b></b>','');
		$this->form_validation->set_rules('f1303','<b></b>','');
		$this->form_validation->set_rules('f14','<b></b>','trim');
		$this->form_validation->set_rules('f15','<b></b>','trim');
		$this->form_validation->set_rules('f1601','<b></b>','trim');
		$this->form_validation->set_rules('f1602','<b></b>','trim');
		$this->form_validation->set_rules('f1603','<b></b>','trim');
		$this->form_validation->set_rules('f1604','<b></b>','trim');
		$this->form_validation->set_rules('f1605','<b></b>','trim');
		$this->form_validation->set_rules('f1606','<b></b>','trim');
		$this->form_validation->set_rules('f1607','<b></b>','trim');
		$this->form_validation->set_rules('f1608','<b></b>','trim');
		$this->form_validation->set_rules('f1609','<b></b>','trim');
		$this->form_validation->set_rules('f1610','<b></b>','trim');
		$this->form_validation->set_rules('f1611','<b></b>','trim');
		$this->form_validation->set_rules('f1612','<b></b>','trim');
		$this->form_validation->set_rules('f1613','<b></b>','trim');
		$this->form_validation->set_rules('f1614','<b></b>','trim');
		$this->form_validation->set_rules('f171','<b></b>','trim');
		$this->form_validation->set_rules('f172','<b></b>','trim');
		$this->form_validation->set_rules('f173','<b></b>','trim');
		$this->form_validation->set_rules('f174','<b></b>','trim');
		$this->form_validation->set_rules('f175','<b></b>','trim');
		$this->form_validation->set_rules('f176','<b></b>','trim');
		$this->form_validation->set_rules('f177','<b></b>','trim');
		$this->form_validation->set_rules('f178','<b></b>','trim');
		$this->form_validation->set_rules('f179','<b></b>','trim');
		$this->form_validation->set_rules('f1710','<b></b>','trim');
		$this->form_validation->set_rules('f1711','<b></b>','trim');
		$this->form_validation->set_rules('f1712','<b></b>','trim');
		$this->form_validation->set_rules('f1713','<b></b>','trim');
		$this->form_validation->set_rules('f1714','<b></b>','trim');
		$this->form_validation->set_rules('f1715','<b></b>','trim');
		$this->form_validation->set_rules('f1716','<b></b>','trim');
		$this->form_validation->set_rules('f1717','<b></b>','trim');
		$this->form_validation->set_rules('f1718','<b></b>','trim');
		$this->form_validation->set_rules('f1719','<b></b>','trim');
		$this->form_validation->set_rules('f1720','<b></b>','trim');
		$this->form_validation->set_rules('f1721','<b></b>','trim');
		$this->form_validation->set_rules('f1722','<b></b>','trim');
		$this->form_validation->set_rules('f1723','<b></b>','trim');
		$this->form_validation->set_rules('f1724','<b></b>','trim');
		$this->form_validation->set_rules('f1725','<b></b>','trim');
		$this->form_validation->set_rules('f1726','<b></b>','trim');
		$this->form_validation->set_rules('f1727','<b></b>','trim');
		$this->form_validation->set_rules('f1728','<b></b>','trim');
		$this->form_validation->set_rules('f1729','<b></b>','trim');
		$this->form_validation->set_rules('f1730','<b></b>','trim');
		$this->form_validation->set_rules('f1731','<b></b>','trim');
		$this->form_validation->set_rules('f1732','<b></b>','trim');
		$this->form_validation->set_rules('f1733','<b></b>','trim');
		$this->form_validation->set_rules('f1734','<b></b>','trim');
		$this->form_validation->set_rules('f1735','<b></b>','trim');
		$this->form_validation->set_rules('f1736','<b></b>','trim');
		$this->form_validation->set_rules('f1737','<b></b>','trim');
		$this->form_validation->set_rules('f1738','<b></b>','trim');
		$this->form_validation->set_rules('f1739','<b></b>','trim');
		$this->form_validation->set_rules('f1740','<b></b>','trim');
		$this->form_validation->set_rules('f1741','<b></b>','trim');
		$this->form_validation->set_rules('f1742','<b></b>','trim');
		$this->form_validation->set_rules('f1743','<b></b>','trim');
		$this->form_validation->set_rules('f1744','<b></b>','trim');
		$this->form_validation->set_rules('f1745','<b></b>','trim');
		$this->form_validation->set_rules('f1746','<b></b>','trim');
		$this->form_validation->set_rules('f1747','<b></b>','trim');
		$this->form_validation->set_rules('f1748','<b></b>','trim');
		$this->form_validation->set_rules('f1749','<b></b>','trim');
		$this->form_validation->set_rules('f1750','<b></b>','trim');
		$this->form_validation->set_rules('f1751','<b></b>','trim');
		$this->form_validation->set_rules('f1752','<b></b>','trim');
		$this->form_validation->set_rules('f1753','<b></b>','trim');
		$this->form_validation->set_rules('f1754','<b></b>','trim');
		$this->form_validation->set_rules('f1755','<b></b>','trim');
		$this->form_validation->set_rules('f1756','<b></b>','trim');
		$this->form_validation->set_rules('f1757','<b></b>','trim');
		$this->form_validation->set_rules('f1758','<b></b>','trim');
		$this->form_validation->set_rules('f18','<b></b>','trim');

		if ($this->form_validation->run() == FALSE) {
	    	$user_id = $this->session->userdata('user_id');	
			$nim = $this->session->userdata('nim');		
			$data['alumni'] = $this->dikti_model->select_alumni($nim)->row();
			$data['detail'] = $this->dikti_model->select_dikti($nim)->row();		

	    	$this->template_account->display('dikti_v', $data);	
		} else {  			  			  															
			$this->dikti_model->insert_data();
			$this->session->set_flashdata('notification','Sukses, Data Anda berhasil Di Simpan.');			
			redirect(site_url('dikti'));  			
 		}  		
	}

	public function updatedata() {		
		$this->dikti_model->update_data();
		$this->session->set_flashdata('notification','Sukses, Data Anda berhasil Di Update.');
 		redirect(site_url('dikti')); 
	}

	public function downloadbukti() {
		$nim = $this->session->userdata('nim');		
		$data['alumni'] = $this->dikti_model->select_alumni($nim)->row();
		$data['detail'] = $this->dikti_model->select_dikti($nim)->row(); 
		
		$time = time();	
		$filename = 'BuktiKuesioner_'.$nim.'_'.$time;
		$pdfFilePath = FCPATH."/download/$filename.pdf";
		
		if (file_exists($pdfFilePath) == FALSE){
			ini_set('memory_limit','100M');
			$html = $this->load->view('printbuktikuesioner_pdf_v', $data, true);
			 
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->SetHeader(''); 
			$pdf->SetFooter('');
			$pdf->WriteHTML($html);
			$pdf->Output($pdfFilePath, 'F');
		}
		redirect("/download/$filename.pdf");		
	}

	public function downloadbuktipreview() {
		$nim = $this->session->userdata('nim');		
		$data['alumni'] = $this->dikti_model->select_alumni($nim)->row();
		$data['detail'] = $this->dikti_model->select_dikti($nim)->row(); 
		$this->load->view('printbuktikuesioner_pdf_v', $data);
	}
}
/* Location: ./application/controllers/Dikti.php */
?>