<?php
class laporan extends ci_controller{
	function __construct(){
		parent::__construct();
        
        if($this->session->userdata('hakakses') != 'admin'){
            redirect('login');
        }
        
        date_default_timezone_set('Asia/Jakarta');
	}
	
	function laporan_industri(){
		$data['title'] = 'Laporan Data Mitra Industri';
		$data['industri'] = $this->db->query("select i.*,p.*,k.*,b.* from t_industri i inner join t_provinsi p on i.id_prov=p.id_prov inner join t_kabupaten k on i.id_kabkot=k.id_kabkot inner join t_bidang b on i.id_bidang=b.id_bidang order by i.id_industri")->result();
		$data['file']='admin/laporan/laporan_industri';
		$this->load->view('admin/main',$data);		
	}
	
	function laporan_loker(){
		$data['title'] = 'Laporan Lowongan Kerja';
		$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri order by id_loker")->result();
		$data['file']='admin/laporan/laporan_loker';
		$this->load->view('admin/main',$data);		
	}
	
	function laporan_belum_bekerja(){
		if(!empty($this->input->post('tahun_keluar'))){
			$tahun_keluar=$this->input->post('tahun_keluar');
			if($tahun_keluar=='1'){
				$sql="select * from t_siswa where status='1'";
			}else{
				$sql="select * from t_siswa where status='1' and tahun_keluar='".$tahun_keluar."'";
			}

			$data['tahun_keluar'] = $tahun_keluar;
			$data['title'] = 'Laporan Data Siswa Belum Bekerja';
			$data['data_tahun']=$this->db->query("select distinct tahun_keluar from t_siswa order by tahun_keluar desc")->result();
			$data['data_jurusan'] = $this->db->query("select * from t_jurusan order by id_jurusan")->result();
			$data['lap']=$this->db->query($sql)->result();
			$data['file']='admin/laporan/laporan_belum_bekerja';
			//$data['pesan']=$test;
			$this->load->view('admin/main',$data);
		}
		else{
			$data['title'] = 'Laporan Data Siswa Belum Bekerja';
			$data['data_tahun']=$this->db->query("select distinct tahun_keluar from t_siswa order by tahun_keluar desc")->result();
			$data['data_jurusan'] = $this->db->query("select * from t_jurusan order by id_jurusan")->result();
			$data['file']='admin/laporan/laporan_belum_bekerja';
			$this->load->view('admin/main',$data);
		}
		
	}
	
	function laporan_pelamar(){
		if(!empty($this->input->post('id_loker'))){
			$id_loker=$this->input->post('id_loker');
			if($id_loker=='1'){
				$sql="select p.nisn,s.jk,s.tahun_keluar,i.nama as nama_industri,s.nama as nama_siswa,l.judul,p.status from t_pelamar p inner join t_siswa s on p.nisn=s.nisn inner join t_loker l on l.id_loker=p.id_loker inner join t_industri i on i.id_industri=l.id_industri";
			}else{
				$sql="select p.nisn,s.jk,s.tahun_keluar,i.nama as nama_industri,s.nama as nama_siswa,l.judul,p.status from t_pelamar p inner join t_siswa s on p.nisn=s.nisn inner join t_loker l on l.id_loker=p.id_loker inner join t_industri i on i.id_industri=l.id_industri where p.id_loker='$id_loker'";
			}

			$data['title'] = 'Laporan Pelamar';
			$data['id_loker'] = $id_loker;
			$data['data_loker']=$this->db->query("select *,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri order by id_loker desc")->result();
			$data['lap']=$this->db->query($sql)->result();
			$data['file']='admin/laporan/laporan_pelamar';
			$this->load->view('admin/main',$data);
		}
		else{
			$data['title'] = 'Laporan Pelamar';
			$data['data_loker']=$this->db->query("select *,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri order by id_loker desc")->result();
			$data['file']='admin/laporan/laporan_pelamar';
			$this->load->view('admin/main',$data);
		}
		
	}
	
	function laporan_pelamar_diterima(){
		if(!empty($this->input->post('id_loker'))){
			$id_loker=$this->input->post('id_loker');
			if($id_loker=='1'){
				$sql="select p.nisn,s.jk,s.tahun_keluar,i.nama as nama_industri,s.nama as nama_siswa,l.judul,p.status from t_pelamar p inner join t_siswa s on p.nisn=s.nisn inner join t_loker l on l.id_loker=p.id_loker inner join t_industri i on i.id_industri=l.id_industri where p.status='2'";
			}else{
				$sql="select p.nisn,s.jk,s.tahun_keluar,i.nama as nama_industri,s.nama as nama_siswa,l.judul,p.status from t_pelamar p inner join t_siswa s on p.nisn=s.nisn inner join t_loker l on l.id_loker=p.id_loker inner join t_industri i on i.id_industri=l.id_industri where p.status='2' and p.id_loker='$id_loker'";
			}

			$data['title'] = 'Laporan Pelamar Diterima';
			$data['id_loker'] = $id_loker;
			$data['data_loker']=$this->db->query("select *,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri order by id_loker desc")->result();
			$data['lap']=$this->db->query($sql)->result();
			$data['file']='admin/laporan/laporan_pelamar_diterima';
			$this->load->view('admin/main',$data);
		}
		else{
			$data['title'] = 'Laporan Pelamar Diterima';
			$data['data_loker']=$this->db->query("select *,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri order by id_loker desc")->result();
			$data['file']='admin/laporan/laporan_pelamar_diterima';
			$this->load->view('admin/main',$data);
		}
		
	}
	
	function laporan_keterserapan_lulusan(){
		if(!empty($this->input->post('status'))){
			$status=$this->input->post('status');
			$tahun_keluar=$this->input->post('tahun_keluar');
			$id_jurusan=$this->input->post('id_jurusan');
			
			if(($id_jurusan=='1')&&($tahun_keluar=='1')){
				//$data['lap']=$this->db->query("select * from t_siswa where status='".$status."'")->result();
				$sql="select * from t_siswa where status='".$status."'";
				$test='masuk 1';
			}else if($id_jurusan=='1'){
				//$data['lap']=$this->db->query("select * from t_siswa where status='".$status."' and tahun_keluar='".$tahun_keluar."'")->result();
				$sql="select * from t_siswa where status='".$status."' and tahun_keluar='".$tahun_keluar."'";
				$test='masuk 2';
			}else{
				if($tahun_keluar=='1'){
					$sql="select * from t_siswa where status='".$status."' and id_jurusan='".$id_jurusan."'";
				}else{
					$sql="select * from t_siswa where status='".$status."' and tahun_keluar='".$tahun_keluar."' and id_jurusan='".$id_jurusan."'";
				}

			}
				//$test='tidak masuk : status='.$status.' tahun='.$tahun_keluar.' jurusan='.$id_jurusan;
			$data=array(
					'status' => $status,
					'tahun_keluar' => $tahun_keluar,
					'id_jurusan' => $id_jurusan,				
				);
			$data['title'] = 'Laporan Keterserapan Lulusan';
			$data['data_tahun']=$this->db->query("select distinct tahun_keluar from t_siswa order by tahun_keluar desc")->result();
			$data['data_jurusan'] = $this->db->query("select * from t_jurusan order by id_jurusan")->result();
			$data['lap']=$this->db->query($sql)->result();
			$data['file']='admin/laporan/laporan_keterserapan_lulusan';
			//$data['pesan']=$test;
			$this->load->view('admin/main',$data);
		}
		else{
			$data['title'] = 'Laporan Keterserapan Lulusan';
			$data['data_tahun']=$this->db->query("select distinct tahun_keluar from t_siswa order by tahun_keluar desc")->result();
			$data['data_jurusan'] = $this->db->query("select * from t_jurusan order by id_jurusan")->result();
			$data['file']='admin/laporan/laporan_keterserapan_lulusan';
			$this->load->view('admin/main',$data);
		}
		
	}
	
}
?>