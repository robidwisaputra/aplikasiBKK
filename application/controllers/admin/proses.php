<?php
class proses extends ci_controller{
	function __construct(){
		parent::__construct();
        
        if($this->session->userdata('hakakses') != 'admin'){
            redirect('login');
        }
        
        date_default_timezone_set('Asia/Jakarta');
	}
	function rules(){
		$data['title'] = 'rules / Pohon Keputusan';
		$data['rules'] = $this->db->query("select * from t_rules order by id")->result();
		$data['file']='admin/proses/rules';
		$this->load->view('admin/main',$data);
	}
	
	
	function delete_rules(){
		$hasil=$this->db->query("TRUNCATE t_rules");
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/proses/rules');
	}
	function add_rules(){
		$data['title'] = 'Pembuatan Decision tree';
		$data['file']='admin/proses/add_rules';
		$this->load->view('admin/main',$data);
	}
	
	function prediksi(){
		$data['title'] = 'Prediksi Kelulusan Siswa';
		$data['prediksi'] = $this->db->query("select * from t_prediksi order by NIS")->result();
		$data['file']='admin/proses/prediksi';
		$this->load->view('admin/main',$data);
		
	}
	
	function proses_prediksi(){
		$hasil=$this->db->query("TRUNCATE t_prediksi");
		$rules=$this->db->query("select * from t_rules")->result();
		foreach ($rules as $row1) :
			if ($row1->parent != '') {
				$datasiswa=$this->db->query("select * from t_siswa where $row1->parent and $row1->akar")->result();
			} else {
				$datasiswa=$this->db->query("select * from t_siswa where $row1->akar")->result();
			}
			
			foreach ($datasiswa as $row2) :
				$data=array(
					'NIS' => $row2->NIS,
					'nama' => $row2->nama,
					'n1' => $row2->n1,
					'n2' => $row2->n2,
					'n3' => $row2->n3,
					'n4' => $row2->n4,
					'n5' => $row2->n5,
					'n6' => $row2->n6,
					'hasil'=> $row1->keputusan,
					'id_rule'=> $row1->id,
				);
				$hasil=$this->db->insert('t_prediksi',$data);
			endforeach;
		endforeach;
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/proses/prediksi');
	}

	function delete_prediksi(){
		$hasil=$this->db->query("TRUNCATE t_prediksi");
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/proses/prediksi');
		
	}
	
	function akurasi(){
		$hasil=$this->db->query("TRUNCATE t_uji");
		$dp=$this->db->query("select * from t_prediksi order by NIS")->result();
		foreach ($dp as $row1) :
				if($row1->hasil==$row1->hasil){
						$ketepatan='BENAR';
				}else{
						$ketepatan='SALAH';
				}
			$data=array(
					'NIS' => $row1->NIS,
					'nama' => $row1->nama,
					'n1' => $row1->n1,
					'n2' => $row1->n2,
					'n3' => $row1->n3,
					'n4' => $row1->n4,
					'n5' => $row1->n5,
					'n6' => $row1->n6,
					'data_asli'=> $row1->hasil,
					'prediksi'=> $row1->hasil,
					'ketepatan'=> $ketepatan,
				);
				$hasil=$this->db->insert('t_uji',$data);
		
			/*
			$datasiswa=$this->db->query("select * from t_datamining where n1='$row1->n1' and n2='$row1->n2' and n3='$row1->n3' and n4='$row1->n4' and n5='$row1->n5' and n6='$row1->n6'")->result();
			
			foreach ($datasiswa as $row2) :
				
				if($row2->hasil==$row1->hasil){
						$ketepatan='BENAR';
				}else{
						$ketepatan='SALAH';
				}
				
				$data=array(
					'NIS' => $row1->NIS,
					'nama' => $row1->nama,
					'n1' => $row1->n1,
					'n2' => $row1->n2,
					'n3' => $row1->n3,
					'n4' => $row1->n4,
					'n5' => $row1->n5,
					'n6' => $row1->n6,
					'data_asli'=> $row2->hasil,
					'prediksi'=> $row1->hasil,
					'ketepatan'=> $ketepatan,
				);
				$hasil=$this->db->insert('t_uji',$data);
				
			endforeach;*/
		endforeach;
		
		$data['title'] = 'Uji Akurasi';
		$data['uji'] = $this->db->query("select * from t_uji order by NIS")->result();
		$data['file']='admin/proses/akurasi';
		$this->load->view('admin/main',$data);
	}

	
}
?>