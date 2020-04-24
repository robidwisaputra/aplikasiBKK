<?php
class jadwal extends ci_controller{
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
			$data['status']="2";
			$this->db->where(array('id_loker'=>$row->id_loker));
			$hasil=$this->db->update('t_loker',$data);
		}
		endforeach;
		
		$jadwal=$this->db->query("select * from t_jadwal")->result();
		foreach ($jadwal as $row) :
		if(date("Y-m-d")>$row->tgl_selesai){
			$data['status']="2";
			$this->db->where(array('id_jadwal'=>$row->id_jadwal));
			$hasil=$this->db->update('t_jadwal',$data);
		}
		endforeach;
		
	}
	
	
	function index(){
		//update status loker dan jadwal
		$this->UpdateStatusLokerDanJadwal();
		
		$data['title'] = 'Data jadwal';
		$data['jadwal'] = $this->db->query("select j.id_jadwal,j.judul as judul_test,l.judul as judul_loker,j.tgl_mulai,j.tgl_selesai,j.status from t_jadwal j inner join t_loker l on j.id_loker=l.id_loker")->result();
		$data['file']='admin/jadwal/index';
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
	
	
	function delete_jadwal($id){
		if($id != null){
			$this->db->where(array('id_jadwal'=>$id));
			$hasil=$this->db->delete('t_jadwal');
		}
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/jadwal');
	}
	function add_jadwal(){
		if($this->input->post('judul')){
			$data=array(
					'id_loker' => $this->input->post('id_loker'),
					'judul' => $this->input->post('judul'),
					'tgl_mulai' => $this->input->post('tgl_mulai'),
					'tgl_selesai' => $this->input->post('tgl_selesai'),
					'lokasi_prov' => $this->input->post('id_prov'),
					'lokasi_kabkot' => $this->input->post('id_kabkot'),
					'lokasi_alamat' => $this->input->post('alamat'),	
					'status' => $this->input->post('status'),
				);
			$hasil=$this->db->insert('t_jadwal',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/jadwal');
		}
		else{
			$data['title'] = 'Tambah Jadwal Test';
			$data['prov']=$this->db->get("t_provinsi")->result();
			$data['loker']=$this->db->query("select l.id_loker,l.judul,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri")->result();
			$data['file']='admin/jadwal/jadwal_form';
			$this->load->view('admin/main',$data);
		}
	}
	
	function edit_jadwal($id){
		if($this->input->post('id')){
			$data=array(
					'id_loker' => $this->input->post('id_loker'),
					'judul' => $this->input->post('judul'),
					'tgl_mulai' => $this->input->post('tgl_mulai'),
					'tgl_selesai' => $this->input->post('tgl_selesai'),
					'lokasi_prov' => $this->input->post('id_prov'),
					'lokasi_kabkot' => $this->input->post('id_kabkot'),
					'lokasi_alamat' => $this->input->post('alamat'),	
					'status' => $this->input->post('status'),					
				);
			$this->db->where(array('id_jadwal'=>$this->input->post('id')));
			$hasil=$this->db->update('t_jadwal',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/jadwal');
		}
		else{
			if($id != null){
				$data['title'] = 'Edit Data jadwal';
				$cek = $this->db->get_where('t_jadwal',array('id_jadwal'=>$id));
				if($cek->num_rows() > 0 ){
					$data['jadwal'] = $cek->row();
					$data['loker']=$this->db->query("select l.id_loker,l.judul,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri")->result();
					$data['prov']=$this->db->get("t_provinsi")->result();
					$data['kabkot'] = $this->db->query("select * from t_kabupaten where id_prov='".$cek->row()->lokasi_prov."' order by id_kabkot")->result();
					$data['file']='admin/jadwal/jadwal_form';
					$this->load->view('admin/main',$data);	
				}
				else{
					redirect('admin/jadwal');
				}
			}
			else redirect('admin/jadwal');
		}
	}

	
}
?>