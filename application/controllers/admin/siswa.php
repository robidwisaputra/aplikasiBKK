<?php
class siswa extends ci_controller{
	function __construct(){
		parent::__construct();
        
        if($this->session->userdata('hakakses') == ''){
            redirect('login');
        }
        
        date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		$data['title'] = 'Data Alumni';
		$data['siswa'] = $this->db->query("select * from t_siswa order by nisn")->result();
		$data['file']='admin/siswa/index';
		$this->load->view('admin/main',$data);
	}
	
	function import_siswa(){
		$data['title'] = 'Import Data Alumni';
		$data['file']='admin/siswa/siswa_import';
		$this->load->view('admin/main',$data);
	}
	
	function import_siswa_proses(){
				$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
				delete_files('./assets/files/temp/',TRUE);
				$config['upload_path'] = './assets/files/temp/';
				$config['allowed_types'] = '*';
				$config['file_name']='siswa';
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
                    
                        $nisn=$rowData[0][0] == null?' ':$rowData[0][0];
						$nama=$rowData[0][1] == null?' ':$rowData[0][1];
						$jk=$rowData[0][2] == null?' ':$rowData[0][2];
						$tahun_keluar=$rowData[0][3] == null?' ':$rowData[0][3];
						$status=$rowData[0][4] == null?' ':$rowData[0][4];
						$data = array(
                                    'nisn'=> strtoupper($nisn),
                                    'nama'=> strtoupper($nama),
									'jk'=> strtoupper($jk),
									'tahun_keluar'=> strtoupper($tahun_keluar),
									'status'=> strtoupper($status),
                        );
                        
						//import data siswa
						$cek = $this->db->query("select * from t_siswa where nisn='".$nisn."'");
                        if($cek->num_rows() == 0){
                            $hasil=$this->db->insert("t_siswa",$data);
                        }
                        else{
                            $this->db->where(array('nisn'=>$nisn));
                            $hasil=$this->db->update('t_siswa',$data);
                        }
						
						
                    }
				}
						$this->session->set_flashdata('alert',$hasil);
						redirect('admin/siswa/index');
	}
	
	function delete_siswa($id){
		if($id != null){
			$this->db->where(array('nisn'=>$id));
			$hasil=$this->db->delete('t_siswa');
		}
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/siswa');
	}
	function add_siswa(){
		if($this->input->post('nisn')){
			//hapus foto jika ada
			//delete_files('./assets/images/alumni/'.,TRUE);
			//upload gambar
			$config['upload_path'] = './assets/images/alumni/';
				$config['allowed_types'] = '*';
				$config['file_name']=$this->input->post('nisn');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('foto')){
					$message='Tidak Berhasil : '.$this->upload->display_errors();
					$this->session->set_flashdata('alert', $message);
					redirect('admin/siswa');
				}
				else{
					$file=$this->upload->data('foto');
					$foto = $file['file_name'];
					ini_set('memory_limit', '-1');
					ini_set('max_execution_time', 1000);
					ini_set('post_max_size', '128M');
					ini_set('upload_max_filesize', '128M');
					
				$data=array(
					'nisn' => $this->input->post('nisn'),
					'nama' => $this->input->post('nama'),
					'jk' => $this->input->post('jk'),
					'tahun_keluar' => $this->input->post('tahun_keluar'),
					'status' => $this->input->post('status'),
					'id_jurusan' => $this->input->post('id_jurusan'),
					'alamat' => $this->input->post('alamat'),
					'nohp' => $this->input->post('nohp'),
					'perusahaan' => $this->input->post('perusahaan'),
					'pendidikan' => $this->input->post('pendidikan'),
					'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
					'fakultas' => $this->input->post('fakultas'),
					'foto' => $foto,
					);
			
			$hasil=$this->db->insert('t_siswa',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/siswa');
		}
		}
		else{
			$data['title'] = 'Tambah Data Alumni';
			$data['data_jurusan']=$this->db->get("t_jurusan")->result();
			$data['file']='admin/siswa/siswa_form';
			$this->load->view('admin/main',$data);
		}
	}
	
	function edit_siswa($id){
		if($this->input->post('nisn')){
			
			//upload gambar
			$config['upload_path'] = './assets/images/alumni/';
				$config['allowed_types'] = '*';
				$config['file_name']=$this->input->post('nisn');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('foto')){
					$data=array(
					'nisn' => $this->input->post('nisn'),
					'nama' => $this->input->post('nama'),
					'jk' => $this->input->post('jk'),
					'tahun_keluar' => $this->input->post('tahun_keluar'),
					'status' => $this->input->post('status'),
					'id_jurusan' => $this->input->post('id_jurusan'),
					'alamat' => $this->input->post('alamat'),
					'nohp' => $this->input->post('nohp'),
					'perusahaan' => $this->input->post('perusahaan'),
					'pendidikan' => $this->input->post('pendidikan'),
					'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
					'fakultas' => $this->input->post('fakultas'),
					);
				}
				else{
					$file=$this->upload->data('foto');
					$foto = $file['file_name'];
					ini_set('memory_limit', '-1');
					ini_set('max_execution_time', 1000);
					ini_set('post_max_size', '128M');
					ini_set('upload_max_filesize', '128M');
					
				$data=array(
					'nisn' => $this->input->post('nisn'),
					'nama' => $this->input->post('nama'),
					'jk' => $this->input->post('jk'),
					'tahun_keluar' => $this->input->post('tahun_keluar'),
					'status' => $this->input->post('status'),
					'id_jurusan' => $this->input->post('id_jurusan'),
					'alamat' => $this->input->post('alamat'),
					'nohp' => $this->input->post('nohp'),
					'perusahaan' => $this->input->post('perusahaan'),
					'pendidikan' => $this->input->post('pendidikan'),
					'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
					'fakultas' => $this->input->post('fakultas'),
					'foto' => $foto,
					);	
		}
			$hasil=$this->M_barang->ubah($data,$id);
			$this->db->where(array('nisn'=>$this->input->post('nisn')));
			$hasil=$this->db->update('t_siswa',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/siswa');
		}
		else{
			if($id != null){
				$data['title'] = 'Edit Data Alumni';
				$data['data_jurusan']=$this->db->get("t_jurusan")->result();
				$cek = $this->db->get_where('t_siswa',array('nisn'=>$id));
				if($cek->num_rows() > 0 ){
					$data['siswa'] = $cek->row();
					$data['file']='admin/siswa/siswa_form';
					$this->load->view('admin/main',$data);	
				}
				else{
					redirect('admin/siswa');
				}
			}
			else redirect('admin/siswa');
		}
	}
	
	function edit_siswa_pribadi($id){
		if($this->input->post('nisn')){
			
			//upload gambar
			$config['upload_path'] = './assets/images/alumni/';
				$config['allowed_types'] = '*';
				$config['file_name']=$this->input->post('nisn');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('foto')){
					$data=array(
					'nisn' => $this->input->post('nisn'),
					'nama' => $this->input->post('nama'),
					'jk' => $this->input->post('jk'),
					'tahun_keluar' => $this->input->post('tahun_keluar'),
					'status' => $this->input->post('status'),
					'id_jurusan' => $this->input->post('id_jurusan'),
					'alamat' => $this->input->post('alamat'),
					'nohp' => $this->input->post('nohp'),
					'perusahaan' => $this->input->post('perusahaan'),
					'pendidikan' => $this->input->post('pendidikan'),
					'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
					'fakultas' => $this->input->post('fakultas'),
					);
				}
				else{
					$file=$this->upload->data('foto');
					$foto = $file['file_name'];
					ini_set('memory_limit', '-1');
					ini_set('max_execution_time', 1000);
					ini_set('post_max_size', '128M');
					ini_set('upload_max_filesize', '128M');
					
					$data=array(
					'nisn' => $this->input->post('nisn'),
					'nama' => $this->input->post('nama'),
					'jk' => $this->input->post('jk'),
					'tahun_keluar' => $this->input->post('tahun_keluar'),
					'status' => $this->input->post('status'),
					'id_jurusan' => $this->input->post('id_jurusan'),
					'alamat' => $this->input->post('alamat'),
					'nohp' => $this->input->post('nohp'),
					'perusahaan' => $this->input->post('perusahaan'),
					'pendidikan' => $this->input->post('pendidikan'),
					'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
					'fakultas' => $this->input->post('fakultas'),
					'foto' => $foto,
					);
				}	
				
			$this->db->where(array('nisn'=>$this->input->post('nisn')));
			$hasil=$this->db->update('t_siswa',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/siswa/edit_siswa_pribadi/'.$this->input->post('nisn'));
			
		}else{
			$cek = $this->db->get_where('t_siswa',array('nisn'=>$id));
			if($cek->num_rows() > 0 ){
				$data['siswa'] = $cek->row();	
			}
			$data['title'] = 'Edit Data Alumni';
			$data['data_jurusan']=$this->db->get("t_jurusan")->result();
			$data['file']='admin/siswa/siswa_pribadi_form';
			$this->load->view('admin/main',$data);
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
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A1:E7");

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'NISN');
 
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'nama');
        
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Jns Kelamin');
      
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Tahun Keluar');
     
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Status');
       

        $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->getFont()->setSize(12)->setBold(true);

         //Set Width
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        

        $objPHPExcel->setActiveSheetIndex(0);
 
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Template Data Alumni.xlsx"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
    }
	
}
?>