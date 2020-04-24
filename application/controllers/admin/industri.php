<?php
class industri extends ci_controller{
	function __construct(){
		parent::__construct();
        
        if($this->session->userdata('hakakses') != 'admin'){
            redirect('login');
        }
        
        date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		$data['title'] = 'Data Mitra Industri';
		$data['industri'] = $this->db->query("select i.*,p.*,k.*,b.* from t_industri i inner join t_provinsi p on i.id_prov=p.id_prov inner join t_kabupaten k on i.id_kabkot=k.id_kabkot inner join t_bidang b on i.id_bidang=b.id_bidang order by i.id_industri")->result();
		$data['file']='admin/industri/index';
		$this->load->view('admin/main',$data);
	}
	
	function cari_isi_kabkot(){
		$id_prov=$this->input->post('cariisi');
        $data=$this->db->query("select id_kabkot,nama_kabkot from t_kabupaten where id_prov='".$id_prov."'")->result();
		$temp="<option value=''>- Pilih Kabupaten -</option>";
		foreach($data as $d){
			$temp=$temp."<option value='".$d->id_kabkot."'>".$d->nama_kabkot."</option>";
		}
			echo $temp;
	}
	
	function import_Industri(){
		$data['title'] = 'Import Data Industri';
		$data['file']='admin/industri/industri_import';
		$this->load->view('admin/main',$data);
	}
	
	function getKabkot($t){
		$text="";
		if(!empty($t)){		
			$cek=$this->db->query("select id_kabkot from t_kabupaten where nama_kabkot like '%".$t."%'");
			if($cek->num_rows()>0){
				$text=$cek->row()->id_kabkot;
			}
		}
		return $text;
	}
	
	function getProv($t){
		$text="";
		if(!empty($t)){
			$cek=$this->db->query("select id_prov from t_provinsi where nama_prov like '%".$t."%'");
			if($cek->num_rows()>0){
				$text=$cek->row()->id_prov;
			}
			
		}
		return $text;
		
	}
	
	function getBidang($t){
		$text="";
		if(!empty($t)){
			$cek=$this->db->query("select id_bidang from t_bidang where nama_bidang like '%".$t."%'");
			if($cek->num_rows()>0){
				$text=$cek->row()->id_bidang;
			}
		}
		return $text;
	}
	
	function import_industri_proses(){
				$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
				delete_files('./assets/files/temp/',TRUE);
				$config['upload_path'] = './assets/files/temp/';
				$config['allowed_types'] = '*';
				$config['file_name']='industri';
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
                    
                        $nama=$rowData[0][0] == null?'':$rowData[0][0];
						$id_prov=$rowData[0][1] == null?'':$rowData[0][1];
						$id_prov=$this->getProv($id_prov);
						$id_kabkot=$rowData[0][2] == null?'':$rowData[0][2];
						$id_kabkot=$this->getKabkot($id_kabkot);
						$id_bidang=$rowData[0][3] == null?'':$rowData[0][3];
						$id_bidang=$this->getBidang($id_bidang);
						$alamat=$rowData[0][4] == null?'':$rowData[0][4];
						$notlp=$rowData[0][5] == null?'':$rowData[0][5];
						$nohp=$rowData[0][6] == null?'':$rowData[0][6];
						$email=$rowData[0][7] == null?'':$rowData[0][7];
						$data = array(
                                    'nama'=> $nama,
                                    'id_prov'=> strtoupper($id_prov),
                                    'id_kabkot'=> strtoupper($id_kabkot),
									'id_bidang'=> strtoupper($id_bidang),
									'alamat'=> strtoupper($alamat),
									'notlp'=> strtoupper($notlp),
									'nohp'=> strtoupper($nohp),
									'email'=> strtoupper($email),
                        );    
						//import data industri
						$cek = $this->db->query("select * from t_industri where nama='".$nama."'");
                        if($cek->num_rows() == 0){
                            $hasil=$this->db->insert("t_industri",$data);
                        }
                        else{
                            $this->db->where(array('nama'=>$nama));
                            $hasil=$this->db->update('t_industri',$data);
                        }
						
						
                    }
				}
						$this->session->set_flashdata('alert',$hasil);
						redirect('admin/industri/index');
	}
	
	function delete_industri($id){
		if($id != null){
			$this->db->where(array('id_industri'=>$id));
			$hasil=$this->db->delete('t_industri');
		}
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/industri');
	}
	function add_industri(){
		if($this->input->post('nama')){
			$data=array(
					'nama' => $this->input->post('nama'),
					'id_prov' => $this->input->post('id_prov'),
					'id_kabkot' => $this->input->post('id_kabkot'),
					'id_bidang' => $this->input->post('id_bidang'),
					'alamat' => $this->input->post('alamat'),
					'notlp' => $this->input->post('notlp'),
					'nohp' => $this->input->post('nohp'),
					'email' => $this->input->post('email'),
				);
			$hasil=$this->db->insert('t_industri',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/industri');
		}
		else{
			$data['title'] = 'Tambah Data Industri';
			$data['prov']=$this->db->get("t_provinsi")->result();
			$data['bidang'] = $this->db->query("select * from t_bidang order by id_bidang")->result();
			$data['file']='admin/industri/industri_form';
			$this->load->view('admin/main',$data);
		}
	}
	
	function edit_industri($id){
		if($this->input->post('id')){
			$data=array(
					'nama' => $this->input->post('nama'),
					'id_prov' => $this->input->post('id_prov'),
					'id_kabkot' => $this->input->post('id_kabkot'),
					'id_bidang' => $this->input->post('id_bidang'),
					'alamat' => $this->input->post('alamat'),
					'notlp' => $this->input->post('notlp'),
					'nohp' => $this->input->post('nohp'),
					'email' => $this->input->post('email'),
				);
			$this->db->where(array('id_industri'=>$this->input->post('id')));
			$hasil=$this->db->update('t_industri',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/industri');
		}
		else{
			if($id != null){
				$data['title'] = 'Edit Data industri';
				$cek = $this->db->get_where('t_industri',array('id_industri'=>$id));
				if($cek->num_rows() > 0 ){
					$data['industri'] = $cek->row();
					$data['prov']=$this->db->get("t_provinsi")->result();
					$data['kabkot'] = $this->db->query("select * from t_kabupaten where id_prov='".$cek->row()->id_prov."' order by id_kabkot")->result();
					$data['bidang'] = $this->db->query("select * from t_bidang order by id_bidang")->result();
					$data['file']='admin/industri/industri_form';
					$this->load->view('admin/main',$data);	
				}
				else{
					redirect('admin/industri');
				}
			}
			else redirect('admin/industri');
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
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A1:H7");

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Nama Industri');
 
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Provinsi');
        
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Kabupaten');
      
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Bidang');
     
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Alamat');
       
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'No TLP');

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'No HP');
     
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Email');

 
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setSize(12)->setBold(true);

         //Set Width
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        

        $objPHPExcel->setActiveSheetIndex(0);
 
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Template Data industri.xlsx"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
    }
	
}
?>