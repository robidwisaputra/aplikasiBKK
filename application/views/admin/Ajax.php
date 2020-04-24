<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends Fback 
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function cmbSiswaByKelas($kelas){
		/*
		$tmp 	= '';
		$tapel 	= $this->db->query("select ifnull(tapel,0) as tapel from tapel where status='1'")->row()->tapel;		
		$kelas_siswa = $this->db->query("select NIS from kelas_siswa where tapel='".$tapel."' and kelas='".$kelas."'");
		
		if($kelas_siswa->num_rows() > 0) 
		{
			$hasil = $kelas_siswa->result();
		}
		
		if( !empty($hasil) )
		{
			$tmp .= "<option value=''>- Pilih Siswa -</option>";
			
			foreach($hasil as $v)
			{
				$v2 = $this->db->query("select * from siswa where NIS='".$v->NIS."'")->row();
				$tmp .= "<option value='".$v->NIS."'>".$v2->nama."</option>";
			}
		}
		else 
		{
			$tmp .= "<option value=''>- Siswa Tidak Ditemukan -</option>";
		}
		
		die($tmp);
		*/
		echo "masuk";
	}
	
	
}