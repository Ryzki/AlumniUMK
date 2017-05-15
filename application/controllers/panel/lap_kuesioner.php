<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_kuesioner extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/laporan_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['progdi'] = $this->laporan_model->select_progdi()->result();
			$this->template->display('panel/caridatakuesioner_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function preview() {  
		$Progdi 	= $this->input->post('lstProgdi', 'true');		
		$Tahun1 	= $this->input->post('tahun1', 'true');
		$Tahun2 	= $this->input->post('tahun2', 'true');        

		if ($Progdi == 'all') { // Jika Semua Progdi
			$data = array(								
					'Tahun1' => $Tahun1,
					'Tahun2' => $Tahun2
				);	
			$data['preview'] = $this->laporan_model->preview_kuesioner_all()->result();					
		} else { // Jika By Progdi			
			$data = array(			
					'lstProgdi' => $Progdi,					
					'Tahun1' => $Tahun1,
					'Tahun2' => $Tahun2
				);
			$data['preview'] = $this->laporan_model->preview_kuesioner_progdi()->result();	       						
		}

		$data['lastPost'] = $data;
		$this->template->display('panel/tampil_data_kuesioner_v', $data);	 				                 
	}
	
	public function exportall() {		
		$objPHPExcel = new PHPExcel();		
		// Set properties
        $objPHPExcel->getProperties()
			     	->setCreator("Alumni.umk.ac.id") //creator
        	        ->setTitle("Data Export Tabel Kuesioner");  //file title

		$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

		$objget->setTitle('Sheet Data'); //sheet title
		//$objset->setCellValue('A1',"This is Sample Excel File"); //insert cell value
		//$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
		//		->setSize(15);    //set font size

		//table header
		$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
			"AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW",
			"AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT",
			"BU","BV","BW","BX","BY","BZ","CA","CB","CC","CD","CE","CF","CG","CH","CI","CJ","CK","CL","CM","CN","CO","CP","CQ",
			"CR","CS","CT","CU","CV","CW","CX","CY","CZ","DA","DB","DC","DD","DE","DF","DG","DH","DI","DJ","DK","DL","DM","DN",
			"DO","DP");

        $val = array("kdptimsmh","kdpstmsmh","nimhsmsmh","nmmhsmsmh","telpomsmh","emailmsmh","f301","f302","f303",
                	"f401","f402","f403","f404","f405","f406","f407","f408","f409","f410","f411","f412","f413","f414",
                	"f415","f416","f500","f501","f502","f6","f7","f7a","f8","f901","f902","f903","f904","f905","f906",
                	"f1001","f1002","f1101","f1102","f12","f1301","f1301","f1303","f14","f15","f1601","f1602","f1603",
                	"f1604","f1605","f1606","f1607","f1608","f1609","f1610","f1611","f1612","f1613","f1614","f171",
                	"f172","f173","f174","f175","f176","f177","f178","f179","f1710","f1711","f1712","f1713","f1714","f1715",
                	"f1716","f1717","f1718","f1719","f1720","f1721","f1722","f1723","f1724","f1725","f1726","f1727","f1728",
                	"f1729","f1730","f1731","f1732","f1733","f1734","f1735","f1736","f1737","f1738","f1739","f1740","f1741",
                	"f1742","f1743","f1744","f1745","f1746","f1747","f1748","f1749","f1750","f1751","f1752","f1753","f1754",
                	"f1755","f1756","f1757","f1758");
		for ($a=0; $a<120; $a++) 
        {
            $objset->setCellValue($cols[$a].'1', $val[$a]);
            //set borders
			$objget->getStyle($cols[$a].'1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			//$objget->getStyle($cols[$a].'1')->getBorders,"f1301"(),""->getBottom()(-,"f1303">setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($cols[$a].'1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($cols[$a].'1')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

			//set alignment
			$objget->getStyle($cols[$a].'1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			//set font weight
			$objget->getStyle($cols[$a].'1')->getFont()->setBold(true) ;
		}
                
            //taruh baris data disini
			$Tahun1 		= $this->uri->segment(4);
			$Tahun2 		= $this->uri->segment(5);

			$data = array(				
					'Tahun1' => $Tahun1,
					'Tahun2' => $Tahun2
				);			

			$datakuesioner = $this->laporan_model->export_all_kuesioner()->result();
			$baris  = 2; // Awal isi Data / Record
			foreach ($datakuesioner as $r) {
			 	$objset->setCellValue("A".$baris,''); //mengisi data untuk nomor urut
				$objset->setCellValue("B".$baris,''); //mengisi data untuk nama
				$objset->setCellValue("C".$baris,$r->alumni_nim); //mengisi data untuk alamat
				$objset->setCellValue("D".$baris,$r->alumni_nama); //mengisi data untuk TELP
				$objset->setCellValue("E".$baris,$r->alumni_hp); //mengisi data untuk TELP
				$objset->setCellValue("F".$baris,$r->alumni_email); //mengisi data untuk TELP
				$objset->setCellValue("G".$baris,$r->dikti_f301);
				$objset->setCellValue("H".$baris,$r->dikti_f302);
				$objset->setCellValue("I".$baris,$r->dikti_f303);
				$objset->setCellValue("J".$baris,$r->dikti_f401);
				$objset->setCellValue("K".$baris,$r->dikti_f402);
				$objset->setCellValue("L".$baris,$r->dikti_f403);
				$objset->setCellValue("M".$baris,$r->dikti_f404);
				$objset->setCellValue("N".$baris,$r->dikti_f405);
				$objset->setCellValue("O".$baris,$r->dikti_f406);
				$objset->setCellValue("P".$baris,$r->dikti_f407);
				$objset->setCellValue("Q".$baris,$r->dikti_f408);
				$objset->setCellValue("R".$baris,$r->dikti_f409);
				$objset->setCellValue("S".$baris,$r->dikti_f410);
				$objset->setCellValue("T".$baris,$r->dikti_f411);
				$objset->setCellValue("U".$baris,$r->dikti_f412);
				$objset->setCellValue("V".$baris,$r->dikti_f413);
				$objset->setCellValue("W".$baris,$r->dikti_f414);
				$objset->setCellValue("X".$baris,$r->dikti_f415);
				$objset->setCellValue("Y".$baris,$r->dikti_f416);
				$objset->setCellValue("Z".$baris,$r->dikti_f500);
				$objset->setCellValue("AA".$baris,$r->dikti_f501);				
				$objset->setCellValue("AB".$baris,$r->dikti_f502);
				$objset->setCellValue("AC".$baris,$r->dikti_f6);
				$objset->setCellValue("AD".$baris,$r->dikti_f7);
				$objset->setCellValue("AE".$baris,$r->dikti_f7a);
				$objset->setCellValue("AF".$baris,$r->dikti_f8);
				$objset->setCellValue("AG".$baris,$r->dikti_f901);
				$objset->setCellValue("AH".$baris,$r->dikti_f902);
				$objset->setCellValue("AI".$baris,$r->dikti_f903);
				$objset->setCellValue("AJ".$baris,$r->dikti_f904);
				$objset->setCellValue("AK".$baris,$r->dikti_f905);
				$objset->setCellValue("AL".$baris,$r->dikti_f906);
				$objset->setCellValue("AM".$baris,$r->dikti_f1001);
				$objset->setCellValue("AN".$baris,$r->dikti_f1002);
				$objset->setCellValue("AO".$baris,$r->dikti_f1101);
				$objset->setCellValue("AP".$baris,$r->dikti_f1102);
				$objset->setCellValue("AQ".$baris,$r->dikti_f12);
				$objset->setCellValue("AR".$baris,$r->dikti_f1301);
				$objset->setCellValue("AS".$baris,$r->dikti_f1302);
				$objset->setCellValue("AT".$baris,$r->dikti_f1303);
				$objset->setCellValue("AU".$baris,$r->dikti_f14);
				$objset->setCellValue("AV".$baris,$r->dikti_f15);
				$objset->setCellValue("AW".$baris,$r->dikti_f1601);
				$objset->setCellValue("AX".$baris,$r->dikti_f1602);
				$objset->setCellValue("AY".$baris,$r->dikti_f1603);
				$objset->setCellValue("AZ".$baris,$r->dikti_f1604);
				$objset->setCellValue("BA".$baris,$r->dikti_f1605);
				$objset->setCellValue("BB".$baris,$r->dikti_f1606);
				$objset->setCellValue("BC".$baris,$r->dikti_f1607);
				$objset->setCellValue("BD".$baris,$r->dikti_f1608);
				$objset->setCellValue("BE".$baris,$r->dikti_f1609);
				$objset->setCellValue("BF".$baris,$r->dikti_f1610);
				$objset->setCellValue("BG".$baris,$r->dikti_f1611);
				$objset->setCellValue("BH".$baris,$r->dikti_f1612);
				$objset->setCellValue("BI".$baris,$r->dikti_f1613);
				$objset->setCellValue("BJ".$baris,$r->dikti_f1614);
				$objset->setCellValue("BK".$baris,$r->dikti_f171);
				$objset->setCellValue("BL".$baris,$r->dikti_f172);
				$objset->setCellValue("BM".$baris,$r->dikti_f173);
				$objset->setCellValue("BN".$baris,$r->dikti_f174);
				$objset->setCellValue("BO".$baris,$r->dikti_f175);
				$objset->setCellValue("BP".$baris,$r->dikti_f176);
				$objset->setCellValue("BQ".$baris,$r->dikti_f177);
				$objset->setCellValue("BR".$baris,$r->dikti_f178);
				$objset->setCellValue("BS".$baris,$r->dikti_f179);
				$objset->setCellValue("BT".$baris,$r->dikti_f1710);
				$objset->setCellValue("BU".$baris,$r->dikti_f1711);
				$objset->setCellValue("BV".$baris,$r->dikti_f1712);
				$objset->setCellValue("BW".$baris,$r->dikti_f1713);
				$objset->setCellValue("BX".$baris,$r->dikti_f1714);
				$objset->setCellValue("BY".$baris,$r->dikti_f1715);
				$objset->setCellValue("BZ".$baris,$r->dikti_f1716);
				$objset->setCellValue("CA".$baris,$r->dikti_f1717);
				$objset->setCellValue("CB".$baris,$r->dikti_f1718);
				$objset->setCellValue("CC".$baris,$r->dikti_f1719);
				$objset->setCellValue("CD".$baris,$r->dikti_f1720);
				$objset->setCellValue("CE".$baris,$r->dikti_f1721);
				$objset->setCellValue("CF".$baris,$r->dikti_f1722);
				$objset->setCellValue("CG".$baris,$r->dikti_f1723);
				$objset->setCellValue("CH".$baris,$r->dikti_f1724);
				$objset->setCellValue("CI".$baris,$r->dikti_f1725);
				$objset->setCellValue("CJ".$baris,$r->dikti_f1726);
				$objset->setCellValue("CK".$baris,$r->dikti_f1727);
				$objset->setCellValue("CL".$baris,$r->dikti_f1728);
				$objset->setCellValue("CM".$baris,$r->dikti_f1729);
				$objset->setCellValue("CN".$baris,$r->dikti_f1730);
				$objset->setCellValue("CO".$baris,$r->dikti_f1731);
				$objset->setCellValue("CP".$baris,$r->dikti_f1732);
				$objset->setCellValue("CQ".$baris,$r->dikti_f1733);
				$objset->setCellValue("CR".$baris,$r->dikti_f1734);
				$objset->setCellValue("CS".$baris,$r->dikti_f1735);
				$objset->setCellValue("CT".$baris,$r->dikti_f1736);
				$objset->setCellValue("CU".$baris,$r->dikti_f1737);
				$objset->setCellValue("CV".$baris,$r->dikti_f1738);
				$objset->setCellValue("CW".$baris,$r->dikti_f1739);
				$objset->setCellValue("CX".$baris,$r->dikti_f1740);
				$objset->setCellValue("CY".$baris,$r->dikti_f1741);
				$objset->setCellValue("CZ".$baris,$r->dikti_f1742);
				$objset->setCellValue("DA".$baris,$r->dikti_f1743);
				$objset->setCellValue("DB".$baris,$r->dikti_f1744);
				$objset->setCellValue("DC".$baris,$r->dikti_f1745);
				$objset->setCellValue("DD".$baris,$r->dikti_f1746);
				$objset->setCellValue("DE".$baris,$r->dikti_f1747);
				$objset->setCellValue("DF".$baris,$r->dikti_f1748);
				$objset->setCellValue("DG".$baris,$r->dikti_f1749);
				$objset->setCellValue("DH".$baris,$r->dikti_f1750);
				$objset->setCellValue("DI".$baris,$r->dikti_f1751);
				$objset->setCellValue("DJ".$baris,$r->dikti_f1752);
				$objset->setCellValue("DK".$baris,$r->dikti_f1753);
				$objset->setCellValue("DL".$baris,$r->dikti_f1754);
				$objset->setCellValue("DM".$baris,$r->dikti_f1755);
				$objset->setCellValue("DN".$baris,$r->dikti_f1756);
				$objset->setCellValue("DO".$baris,$r->dikti_f1757);
				$objset->setCellValue("DP".$baris,$r->dikti_f1758);
				$baris++; //looping untuk barisny
			}
           	
           	/*$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');           	
           	ob_end_clean();

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="dataallkuesioner.xlsx"');
			header('Cache-Control: max-age=0');						               
            $objWriter->save('php://output');
            exit;*/
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);            
            $date = date('Y-m-d');
            $time = time();
			$objWriter->save('download/dataallkuesioner_'.$date.'_'.$time.'.xlsx');
			redirect(base_url('download/dataallkuesioner_'.$date.'_'.$time.'.xlsx'));
	}

	public function exportbyprogdi() {		
		$objPHPExcel = new PHPExcel();
		// Set properties
        $objPHPExcel->getProperties()
			     	->setCreator("Alumni.umk.ac.id") //creator
        	        ->setTitle("Data Export Tabel Kuesioner");  //file title

		$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

		$objget->setTitle('Sheet Data by ID'); //sheet title
		//$objset->setCellValue('A1',"This is Sample Excel File"); //insert cell value
		//$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
		//		->setSize(15);    //set font size

		//table header
		$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
			"AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW",
			"AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT",
			"BU","BV","BW","BX","BY","BZ","CA","CB","CC","CD","CE","CF","CG","CH","CI","CJ","CK","CL","CM","CN","CO","CP","CQ",
			"CR","CS","CT","CU","CV","CW","CX","CY","CZ","DA","DB","DC","DD","DE","DF","DG","DH","DI","DJ","DK","DL","DM","DN",
			"DO","DP");

        $val = array("kdptimsmh","kdpstmsmh","nimhsmsmh","nmmhsmsmh","telpomsmh","emailmsmh","f301","f302","f303",
                	"f401","f402","f403","f404","f405","f406","f407","f408","f409","f410","f411","f412","f413","f414",
                	"f415","f416","f500","f501","f502","f6","f7","f7a","f8","f901","f902","f903","f904","f905","f906",
                	"f1001","f1002","f1101","f1102","f12","f1301","f1301","f1303","f14","f15","f1601","f1602","f1603",
                	"f1604","f1605","f1606","f1607","f1608","f1609","f1610","f1611","f1612","f1613","f1614","f171",
                	"f172","f173","f174","f175","f176","f177","f178","f179","f1710","f1711","f1712","f1713","f1714","f1715",
                	"f1716","f1717","f1718","f1719","f1720","f1721","f1722","f1723","f1724","f1725","f1726","f1727","f1728",
                	"f1729","f1730","f1731","f1732","f1733","f1734","f1735","f1736","f1737","f1738","f1739","f1740","f1741",
                	"f1742","f1743","f1744","f1745","f1746","f1747","f1748","f1749","f1750","f1751","f1752","f1753","f1754",
                	"f1755","f1756","f1757","f1758");
		for ($a=0; $a<120; $a++) 
        {
            $objset->setCellValue($cols[$a].'1', $val[$a]);
            //set borders
			$objget->getStyle($cols[$a].'1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			//$objget->getStyle($cols[$a].'1')->getBorders,"f1301"(),""->getBottom()(-,"f1303">setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($cols[$a].'1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($cols[$a].'1')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

			//set alignment
			$objget->getStyle($cols[$a].'1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			//set font weight
			$objget->getStyle($cols[$a].'1')->getFont()->setBold(true) ;
		}
                
            //taruh baris data disini
			$Progdi 	= $this->uri->segment(4);
			$Tahun1 	= $this->uri->segment(5);
			$Tahun2 	= $this->uri->segment(6);

			$data = array(
					'Progdi' => $Progdi,
					'Tahun1' => $Tahun1,
					'Tahun2' => $Tahun2
				);		

			$datakuesioner = $this->laporan_model->export_progdi_kuesioner()->result();
			$baris  = 2; // Awal isi Data / Record
			foreach ($datakuesioner as $r) {
			 	$objset->setCellValue("A".$baris,''); //mengisi data untuk nomor urut
				$objset->setCellValue("B".$baris,''); //mengisi data untuk nama
				$objset->setCellValue("C".$baris,$r->alumni_nim); //mengisi data untuk alamat
				$objset->setCellValue("D".$baris,$r->alumni_nama); //mengisi data untuk TELP
				$objset->setCellValue("E".$baris,$r->alumni_hp); //mengisi data untuk TELP
				$objset->setCellValue("F".$baris,$r->alumni_email); //mengisi data untuk TELP
				$objset->setCellValue("G".$baris,$r->dikti_f301);
				$objset->setCellValue("H".$baris,$r->dikti_f302);
				$objset->setCellValue("I".$baris,$r->dikti_f303);
				$objset->setCellValue("J".$baris,$r->dikti_f401);
				$objset->setCellValue("K".$baris,$r->dikti_f402);
				$objset->setCellValue("L".$baris,$r->dikti_f403);
				$objset->setCellValue("M".$baris,$r->dikti_f404);
				$objset->setCellValue("N".$baris,$r->dikti_f405);
				$objset->setCellValue("O".$baris,$r->dikti_f406);
				$objset->setCellValue("P".$baris,$r->dikti_f407);
				$objset->setCellValue("Q".$baris,$r->dikti_f408);
				$objset->setCellValue("R".$baris,$r->dikti_f409);
				$objset->setCellValue("S".$baris,$r->dikti_f410);
				$objset->setCellValue("T".$baris,$r->dikti_f411);
				$objset->setCellValue("U".$baris,$r->dikti_f412);
				$objset->setCellValue("V".$baris,$r->dikti_f413);
				$objset->setCellValue("W".$baris,$r->dikti_f414);
				$objset->setCellValue("X".$baris,$r->dikti_f415);
				$objset->setCellValue("Y".$baris,$r->dikti_f416);
				$objset->setCellValue("Z".$baris,$r->dikti_f500);
				$objset->setCellValue("AA".$baris,$r->dikti_f501);				
				$objset->setCellValue("AB".$baris,$r->dikti_f502);
				$objset->setCellValue("AC".$baris,$r->dikti_f6);
				$objset->setCellValue("AD".$baris,$r->dikti_f7);
				$objset->setCellValue("AE".$baris,$r->dikti_f7a);
				$objset->setCellValue("AF".$baris,$r->dikti_f8);
				$objset->setCellValue("AG".$baris,$r->dikti_f901);
				$objset->setCellValue("AH".$baris,$r->dikti_f902);
				$objset->setCellValue("AI".$baris,$r->dikti_f903);
				$objset->setCellValue("AJ".$baris,$r->dikti_f904);
				$objset->setCellValue("AK".$baris,$r->dikti_f905);
				$objset->setCellValue("AL".$baris,$r->dikti_f906);
				$objset->setCellValue("AM".$baris,$r->dikti_f1001);
				$objset->setCellValue("AN".$baris,$r->dikti_f1002);
				$objset->setCellValue("AO".$baris,$r->dikti_f1101);
				$objset->setCellValue("AP".$baris,$r->dikti_f1102);
				$objset->setCellValue("AQ".$baris,$r->dikti_f12);
				$objset->setCellValue("AR".$baris,$r->dikti_f1301);
				$objset->setCellValue("AS".$baris,$r->dikti_f1302);
				$objset->setCellValue("AT".$baris,$r->dikti_f1303);
				$objset->setCellValue("AU".$baris,$r->dikti_f14);
				$objset->setCellValue("AV".$baris,$r->dikti_f15);
				$objset->setCellValue("AW".$baris,$r->dikti_f1601);
				$objset->setCellValue("AX".$baris,$r->dikti_f1602);
				$objset->setCellValue("AY".$baris,$r->dikti_f1603);
				$objset->setCellValue("AZ".$baris,$r->dikti_f1604);
				$objset->setCellValue("BA".$baris,$r->dikti_f1605);
				$objset->setCellValue("BB".$baris,$r->dikti_f1606);
				$objset->setCellValue("BC".$baris,$r->dikti_f1607);
				$objset->setCellValue("BD".$baris,$r->dikti_f1608);
				$objset->setCellValue("BE".$baris,$r->dikti_f1609);
				$objset->setCellValue("BF".$baris,$r->dikti_f1610);
				$objset->setCellValue("BG".$baris,$r->dikti_f1611);
				$objset->setCellValue("BH".$baris,$r->dikti_f1612);
				$objset->setCellValue("BI".$baris,$r->dikti_f1613);
				$objset->setCellValue("BJ".$baris,$r->dikti_f1614);
				$objset->setCellValue("BK".$baris,$r->dikti_f171);
				$objset->setCellValue("BL".$baris,$r->dikti_f172);
				$objset->setCellValue("BM".$baris,$r->dikti_f173);
				$objset->setCellValue("BN".$baris,$r->dikti_f174);
				$objset->setCellValue("BO".$baris,$r->dikti_f175);
				$objset->setCellValue("BP".$baris,$r->dikti_f176);
				$objset->setCellValue("BQ".$baris,$r->dikti_f177);
				$objset->setCellValue("BR".$baris,$r->dikti_f178);
				$objset->setCellValue("BS".$baris,$r->dikti_f179);
				$objset->setCellValue("BT".$baris,$r->dikti_f1710);
				$objset->setCellValue("BU".$baris,$r->dikti_f1711);
				$objset->setCellValue("BV".$baris,$r->dikti_f1712);
				$objset->setCellValue("BW".$baris,$r->dikti_f1713);
				$objset->setCellValue("BX".$baris,$r->dikti_f1714);
				$objset->setCellValue("BY".$baris,$r->dikti_f1715);
				$objset->setCellValue("BZ".$baris,$r->dikti_f1716);
				$objset->setCellValue("CA".$baris,$r->dikti_f1717);
				$objset->setCellValue("CB".$baris,$r->dikti_f1718);
				$objset->setCellValue("CC".$baris,$r->dikti_f1719);
				$objset->setCellValue("CD".$baris,$r->dikti_f1720);
				$objset->setCellValue("CE".$baris,$r->dikti_f1721);
				$objset->setCellValue("CF".$baris,$r->dikti_f1722);
				$objset->setCellValue("CG".$baris,$r->dikti_f1723);
				$objset->setCellValue("CH".$baris,$r->dikti_f1724);
				$objset->setCellValue("CI".$baris,$r->dikti_f1725);
				$objset->setCellValue("CJ".$baris,$r->dikti_f1726);
				$objset->setCellValue("CK".$baris,$r->dikti_f1727);
				$objset->setCellValue("CL".$baris,$r->dikti_f1728);
				$objset->setCellValue("CM".$baris,$r->dikti_f1729);
				$objset->setCellValue("CN".$baris,$r->dikti_f1730);
				$objset->setCellValue("CO".$baris,$r->dikti_f1731);
				$objset->setCellValue("CP".$baris,$r->dikti_f1732);
				$objset->setCellValue("CQ".$baris,$r->dikti_f1733);
				$objset->setCellValue("CR".$baris,$r->dikti_f1734);
				$objset->setCellValue("CS".$baris,$r->dikti_f1735);
				$objset->setCellValue("CT".$baris,$r->dikti_f1736);
				$objset->setCellValue("CU".$baris,$r->dikti_f1737);
				$objset->setCellValue("CV".$baris,$r->dikti_f1738);
				$objset->setCellValue("CW".$baris,$r->dikti_f1739);
				$objset->setCellValue("CX".$baris,$r->dikti_f1740);
				$objset->setCellValue("CY".$baris,$r->dikti_f1741);
				$objset->setCellValue("CZ".$baris,$r->dikti_f1742);
				$objset->setCellValue("DA".$baris,$r->dikti_f1743);
				$objset->setCellValue("DB".$baris,$r->dikti_f1744);
				$objset->setCellValue("DC".$baris,$r->dikti_f1745);
				$objset->setCellValue("DD".$baris,$r->dikti_f1746);
				$objset->setCellValue("DE".$baris,$r->dikti_f1747);
				$objset->setCellValue("DF".$baris,$r->dikti_f1748);
				$objset->setCellValue("DG".$baris,$r->dikti_f1749);
				$objset->setCellValue("DH".$baris,$r->dikti_f1750);
				$objset->setCellValue("DI".$baris,$r->dikti_f1751);
				$objset->setCellValue("DJ".$baris,$r->dikti_f1752);
				$objset->setCellValue("DK".$baris,$r->dikti_f1753);
				$objset->setCellValue("DL".$baris,$r->dikti_f1754);
				$objset->setCellValue("DM".$baris,$r->dikti_f1755);
				$objset->setCellValue("DN".$baris,$r->dikti_f1756);
				$objset->setCellValue("DO".$baris,$r->dikti_f1757);
				$objset->setCellValue("DP".$baris,$r->dikti_f1758);
				$baris++; //looping untuk barisny
			}           	           

			/*$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');
			ob_end_clean(); 
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="DataKuesionerProgdi.xlsx"');
			header('Cache-Control: max-age=0');			               
            $objWriter->save('php://output');
            exit;*/
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$date = date('Y-m-d');
            $time = time();
			$objWriter->save('download/datakuesionerprogdi_'.$date.'_'.$time.'.xlsx');
			redirect(base_url('download/datakuesionerprogdi_'.$date.'_'.$time.'.xlsx'));			    			
	}

	public function cetak_by_kegiatan($kegiatan = '') {
		$kegiatan 	= $this->uri->segment(4);
		$tgl1 		= $this->uri->segment(5);
		$tgl2 		= $this->uri->segment(6);
		
		$data = array(
				'lstKegiatan' => $kegiatan,
				'tgl1' => $tgl1,
				'tgl2' => $tgl2
			);

		$data['preview'] = $this->laporan_model->cetak_kegiatan_alumni($data);
		$this->load->view('panel/r_print_alumni_html', $data); 
	}

	public function cetak_by_progdi($progdi = '') {
		$progdi 	= $this->uri->segment(4);
		$tgl1 		= $this->uri->segment(5);
		$tgl2 		= $this->uri->segment(6);
		
		$data = array(
				'lstProgdi' => $progdi,
				'tgl1' => $tgl1,
				'tgl2' => $tgl2
			);

		$data['preview'] = $this->laporan_model->cetak_progdi_alumni($data);
		$this->load->view('panel/r_print_alumni_html', $data); 
	}

	public function cetak_by_id($progdi = '', $kegiatan = '') {
		$progdi 	= $this->uri->segment(4);
		$kegiatan 	= $this->uri->segment(5);
		$tgl1 		= $this->uri->segment(6);
		$tgl2 		= $this->uri->segment(7);
		
		$data = array(
				'lstProgdi' => $progdi,
				'lstKegiatan' => $kegiatan,
				'tgl1' => $tgl1,
				'tgl2' => $tgl2
			);

		$data['preview'] = $this->laporan_model->cetak_alumni_by_id($data);
		$this->load->view('panel/r_print_alumni_html', $data); 
	}
}
/* Location: ./application/controllers/panel/lap_kuesioner.php */
?>