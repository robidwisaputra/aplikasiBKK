<?php
class sebaran extends ci_controller{
	function __construct(){
		parent::__construct();
        
       
        date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		
		if(!empty($this->input->post('status'))){
			$status=$this->input->post('status');
			$tahun_keluar=$this->input->post('tahun_keluar');
			$id_jurusan=$this->input->post('id_jurusan');
		}
		else{
			$status=2;
			$tahun_keluar=1;
			$id_jurusan=1;
		}
		
					
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
				
		$data['title'] = 'Sebaran Lulusan';
		$data['data_tahun']=$this->db->query("select distinct tahun_keluar from t_siswa order by tahun_keluar desc")->result();
		$data['data_jurusan'] = $this->db->query("select * from t_jurusan order by id_jurusan")->result();
		$data['lap']=$this->db->query($sql)->result();
		
		$data['jmlindustri']=$this->db->get("t_industri")->num_rows();
		$data['jmlaffiliate']=$this->db->get("t_affiliate")->num_rows();
		$data['jmlloker']=$this->db->get("t_loker")->num_rows();
		$data['jmllulusan']=$this->db->get("t_siswa")->num_rows();
		
		$data['file']='sebaran';
		$this->load->view('main',$data);
	}
	
	
	
}
?>