<?php
class profil extends ci_controller{
	function __construct(){
		parent::__construct();
        
        
        date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		$data['title'] = 'Profil BKK';
		$data['profil'] = $this->db->query("select profil from t_profil where id='1'")->row()->profil;
		
		$data['jmlindustri']=$this->db->get("t_industri")->num_rows();
		$data['jmlaffiliate']=$this->db->get("t_affiliate")->num_rows();
		$data['jmlloker']=$this->db->get("t_loker")->num_rows();
		$data['jmllulusan']=$this->db->get("t_siswa")->num_rows();
		
		$data['file']='profil';
		$this->load->view('main',$data);
	}
	
	
}
?>