<?php
class affiliate extends ci_controller{
	function __construct(){
		parent::__construct();
        
        if($this->session->userdata('hakakses') != 'admin'){
            redirect('login');
        }
        
        date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		$data['title'] = 'Data Mitra affiliate';
		$data['affiliate'] = $this->db->query("select * from t_affiliate order by id_affiliate")->result();
		$data['file']='admin/affiliate/index';
		$this->load->view('admin/main',$data);
	}
	
	
	function import_affiliate(){
		$data['title'] = 'Import Data affiliate';
		$data['file']='admin/affiliate/affiliate_import';
		$this->load->view('admin/main',$data);
	}
	
	
	function import_affiliate_proses(){
				$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
				delete_files('./assets/files/temp/',TRUE);
				$config['upload_path'] = './assets/files/temp/';
				$config['allowed_types'] = '*';
				$config['file_name']='affiliate';
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('userfile')){
					$hasil=0;
				}
				else{
					$file=$this->upload->data('userfile');
					$dbName = $file['full_path'];
					ini_set('memory_limit', '-1');
					ini_set('max_execution_time', 1000);
					ini_set('post_max_size', '128M');
					ini_set('upload_max_filesize', '128M');
					if (!file_exists($dbName)) {
						die("Could not find database file.");
					}else{
						$hasil=1;
					}
					//baca data excel
					try {
						$inputFileType = IOFactory::identify($dbName);
						$objReader = IOFactory::createReader($inputFileType);
						$objPHPExcel = $objReader->load($dbName);
					} catch(Exception $e) {
						die('Error loading file "'.pathinfo($dbName,PATHINFO_BASENAME).'": '.$e->getMessage());
					}
					
					//  Get worksheet dimensions
						$sheet = $objPHPExcel->getSheet(0);
						$highestRow = $sheet->getHighestRow();
						$highestColumn = $sheet->getHighestColumn();
						
					//  Loop through each row of the worksheet in turn
                for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                    NULL,
                                                    TRUE,
                                                    FALSE);
                    
                        $npsn=$rowData[0][0] == null?'':$rowData[0][0];
						$nama=$rowData[0][1] == null?'':$rowData[0][1];
						$alamat=$rowData[0][2] == null?'':$rowData[0][2];
						$notlp=$rowData[0][3] == null?'':$rowData[0][3];
						$email=$rowData[0][4] == null?'':$rowData[0][4];
						$website=$rowData[0][5] == null?'':$rowData[0][5];
						$status=$rowData[0][6] == null?'':$rowData[0][6];
						$data = array(
                                    'npsn'=> strtoupper($npsn),
                                    'nama_sekolah'=> strtoupper($nama),
                                    'alamat'=> strtoupper($alamat),
									'notlp'=> strtoupper($notlp),
									'email'=> strtoupper($email),
									'website'=> strtoupper($website),
									'status'=> strtoupper($status),
                        );    
						//import data affiliate
						$cek = $this->db->query("select * from t_affiliate where npsn='".$npsn."'");
                        if($cek->num_rows() == 0){
                            $hasil=$this->db->insert("t_affiliate",$data);
                        }
                        else{
                            $this->db->where(array('npsn'=>$npsn));
                            $hasil=$this->db->update('t_affiliate',$data);
                        }
						
						
                    }
				}
						$this->session->set_flashdata('alert',$hasil);
						redirect('admin/affiliate/index');
	}
	
	function delete_affiliate($id){
		if($id != null){
			$this->db->where(array('id_affiliate'=>$id));
			$hasil=$this->db->delete('t_affiliate');
		}
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/affiliate');
	}
	function add_affiliate(){
		if($this->input->post('npsn')){
			$data=array(
					'npsn' => $this->input->post('npsn'),
					'nama_sekolah' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'notlp' => $this->input->post('notlp'),
					'email' => $this->input->post('email'),
					'website' => $this->input->post('website'),
					'status' => $this->input->post('status'),
				);
			$hasil=$this->db->insert('t_affiliate',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/affiliate');
		}
		else{
			$data['title'] = 'Tambah Data affiliate';
			$data['file']='admin/affiliate/affiliate_form';
			$this->load->view('admin/main',$data);
		}
	}
	
	function edit_affiliate($id){
		if($this->input->post('id')){
			$data=array(
					'npsn' => $this->input->post('npsn'),
					'nama_sekolah' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'notlp' => $this->input->post('notlp'),
					'email' => $this->input->post('email'),
					'website' => $this->input->post('website'),
					'status' => $this->input->post('status'),
				);
			$this->db->where(array('id_affiliate'=>$this->input->post('id')));
			$hasil=$this->db->update('t_affiliate',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/affiliate');
		}
		else{
			if($id != null){
				$data['title'] = 'Edit Data affiliate';
				$cek = $this->db->get_where('t_affiliate',array('id_affiliate'=>$id));
				if($cek->num_rows() > 0 ){
					$data['affiliate'] = $cek->row();
					$data['file']='admin/affiliate/affiliate_form';
					$this->load->view('admin/main',$data);	
				}
				else{
					redirect('admin/affiliate');
				}
			}
			else redirect('admin/affiliate');
		}
	}

	function excel_kosong(){
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator('yaqub')
                                     ->setTitle("export")
                                     ->setDescription("none");
        
        /* pengaturan font */
        $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Calibri');
        $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(11);

        /** 
         * judul daftar 
         */

        // memberikan garis  dan background untuk cell 
        $sharedStyle2 = new PHPExcel_Style();
        $sharedStyle2->applyFromArray(array('borders' => array(
                                            'bottom'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                                            'right'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                                            'left'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                                            'top'     => array('style' => PHPExcel_Style_Border::BORDER_THIN)
                                    )
                 ));
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A1:G7");

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'NPSN');
 
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Nama Sekolah');
        
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Alamat');
      
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'No Telephone');
     
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Email');
       
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Web Site');

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Status');
     
 
        $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getFont()->setSize(12)->setBold(true);

         //Set Width
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);        

        $objPHPExcel->setActiveSheetIndex(0);
 
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Template Data affiliate.xlsx"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
    }
	
}
?>