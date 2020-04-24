<?php
class loker extends ci_controller{
	function __construct(){
		parent::__construct();
        
        if($this->session->userdata('hakakses') != 'admin'){
            redirect('login');
        }
        
        date_default_timezone_set('Asia/Jakarta');
	}
	
	// untuk update status loker dan jadwal berdasarkan tanggal hari ini
	function UpdateStatusLokerDanJadwal(){
		$loker=$this->db->query("select * from t_loker")->result();
		foreach ($loker as $row) :
		if(date("Y-m-d")>$row->tgl_tutup){
			$data=array(
				'status' => '2'
			);
			$this->db->where(array('id_loker'=>$row->id_loker));
			$hasil=$this->db->update('t_loker',$data);
		}
		endforeach;
		
		$jadwal=$this->db->query("select * from t_jadwal")->result();
		foreach ($jadwal as $row) :
		if(date("Y-m-d")>$row->tgl_selesai){
			$data=array(
				'status' => '2'
			);
			$this->db->where(array('id_jadwal'=>$row->id_jadwal));
			$hasil=$this->db->update('t_jadwal',$data);
		}
		endforeach;
		
	}
	
	
	function index(){
		//update status loker dan jadwal
		$this->UpdateStatusLokerDanJadwal();
		
		$data['title'] = 'Data Mitra loker';
		$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri order by id_loker")->result();
		$data['file']='admin/loker/index';
		$this->load->view('admin/main',$data);
	}
	
	
	function import_loker(){
		$data['title'] = 'Import Data loker';
		$data['file']='admin/loker/loker_import';
		$this->load->view('admin/main',$data);
	}
	
	
	function delete_loker($id){
		if($id != null){
			$this->db->where(array('id_loker'=>$id));
			$hasil=$this->db->delete('t_loker');
		}
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/loker');
	}
	function add_loker(){
		if($this->input->post('judul')){
			$data=array(
					'id_industri' => $this->input->post('id_industri'),
					'deskripsi' => $this->input->post('deskripsi'),
					'judul' => $this->input->post('judul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gaji' => $this->input->post('gaji'),
					'tgl_buka' => $this->input->post('tgl_buka'),
					'tgl_tutup' => $this->input->post('tgl_tutup'),
					'tujuan' => $this->input->post('tujuan'),
					'id_prov' => $this->input->post('id_prov'),
					'kategori_jk' => $this->input->post('kategori_jk'),
					'kategori_jumlah' => $this->input->post('kategori_jumlah'),
					'kategori_tinggi_badan' => $this->input->post('kategori_tinggi_badan'),
					'kategori_berat_badan' => $this->input->post('kategori_berat_badan'),
					'kategori_berat_badan' => $this->input->post('kategori_berat_badan'),
					'kategori_umur' => $this->input->post('kategori_umur'),
					'kategori_lowongan' => $this->input->post('kategori_lowongan'),
					'kategori_jurusan' => $this->input->post('kategori_jurusan'),
					'status' => $this->input->post('status'),
				);
			$hasil=$this->db->insert('t_loker',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/loker');
		}
		else{
			$data['title'] = 'Tambah Data loker';
			$data['industri']=$this->db->get("t_industri")->result();
			$data['prov']=$this->db->get("t_provinsi")->result();
			$data['bidang']=$this->db->get("t_bidang")->result();
			$data['jurusan']=$this->db->get("t_jurusan")->result();
			$data['file']='admin/loker/loker_form';
			$this->load->view('admin/main',$data);
		}
	}
	
	function edit_loker($id){
		if($this->input->post('id')){
			$data=array(
					'id_industri' => $this->input->post('id_industri'),
					'deskripsi' => $this->input->post('deskripsi'),
					'judul' => $this->input->post('judul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gaji' => $this->input->post('gaji'),
					'tgl_buka' => $this->input->post('tgl_buka'),
					'tgl_tutup' => $this->input->post('tgl_tutup'),
					'tujuan' => $this->input->post('tujuan'),
					'id_prov' => $this->input->post('id_prov'),
					'kategori_jk' => $this->input->post('kategori_jk'),
					'kategori_jumlah' => $this->input->post('kategori_jumlah'),
					'kategori_tinggi_badan' => $this->input->post('kategori_tinggi_badan'),
					'kategori_berat_badan' => $this->input->post('kategori_berat_badan'),
					'kategori_umur' => $this->input->post('kategori_umur'),
					'kategori_lowongan' => $this->input->post('kategori_lowongan'),
					'kategori_jurusan' => $this->input->post('kategori_jurusan'),
					'status' => $this->input->post('status'),
				);
			$this->db->where(array('id_loker'=>$this->input->post('id')));
			$hasil=$this->db->update('t_loker',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/loker');
		}
		else{
			if($id != null){
				$data['title'] = 'Edit Data loker';
				$cek = $this->db->get_where('t_loker',array('id_loker'=>$id));
				if($cek->num_rows() > 0 ){
					$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where l.id_loker='".$id."'")->row();
					$data['file']='admin/loker/loker_form';
					$data['prov']=$this->db->get("t_provinsi")->result();
					$data['industri']=$this->db->get("t_industri")->result();
					$data['bidang']=$this->db->get("t_bidang")->result();
					$data['jurusan']=$this->db->get("t_jurusan")->result();
					$this->load->view('admin/main',$data);	
				}
				else{
					redirect('admin/loker');
				}
			}
			else redirect('admin/loker');
		}
	}
	
	/*
	function import_loker_proses(){
				$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
				delete_files('./assets/files/temp/',TRUE);
				$config['upload_path'] = './assets/files/temp/';
				$config['allowed_types'] = '*';
				$config['file_name']='loker';
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
						//import data loker
						$cek = $this->db->query("select * from t_loker where npsn='".$npsn."'");
                        if($cek->num_rows() == 0){
                            $hasil=$this->db->insert("t_loker",$data);
                        }
                        else{
                            $this->db->where(array('npsn'=>$npsn));
                            $hasil=$this->db->update('t_loker',$data);
                        }
						
						
                    }
				}
						$this->session->set_flashdata('alert',$hasil);
						redirect('admin/loker/index');
	}
	*/
	/*
	function excel_kosong(){
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator('yaqub')
                                     ->setTitle("export")
                                     ->setDescription("none");
        
        /* pengaturan font 
        $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Calibri');
        $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(11);

        /** 
         * judul daftar 
         

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
        header('Content-Disposition: attachment;filename="Template Data loker.xlsx"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
    }
	*/
}
?>