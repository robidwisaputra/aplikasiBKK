<?php
class beranda extends ci_controller{
	function __construct(){
		parent::__construct();
        
        date_default_timezone_set('Asia/Jakarta');
	}
	
	// untuk update status loker dan jadwal berdasarkan tanggal hari ini
	function UpdateStatusLokerDanJadwal(){
		$loker=$this->db->query("select * from t_loker")->result();
		foreach ($loker as $row) :
		if(date("Y-m-d")>$row->tgl_tutup){
			$data['status']=2;
			$this->db->where(array('id_loker'=>$row->id_loker));
			$hasil=$this->db->update('t_loker',$data);
		}
		endforeach;
		
		$jadwal=$this->db->query("select * from t_jadwal")->result();
		foreach ($jadwal as $row) :
		if(date("Y-m-d")>$row->tgl_selesai){
			$data['status']=2;
			$this->db->where(array('id_jadwal'=>$row->id_jadwal));
			$hasil=$this->db->update('t_jadwal',$data);
		}
		endforeach;
		
	}
	
	function index(){
		//update status loker dan jadwal
		$this->UpdateStatusLokerDanJadwal();
		
		$data['title'] = 'Beranda';
		$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where l.status='1'")->result();
		
		$data['jadwal']=$this->db->query("SELECT j.id_loker,j.judul,j.tgl_mulai,j.tgl_selesai,j.lokasi_alamat,i.nama from t_jadwal j inner join t_loker l on j.id_loker=l.id_loker inner join t_industri i on i.id_industri=l.id_industri where j.status=1;")->result();
		
		$data['jmlindustri']=$this->db->get("t_industri")->num_rows();
		$data['jmlaffiliate']=$this->db->get("t_affiliate")->num_rows();
		$data['jmlloker']=$this->db->get("t_loker")->num_rows();
		$data['jmllulusan']=$this->db->get("t_siswa")->num_rows();
		
		$data['file']='beranda';
		$this->load->view('main',$data);
	}
	
	
}
?>