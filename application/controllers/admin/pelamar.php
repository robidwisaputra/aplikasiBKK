<?php
class pelamar extends ci_controller{
	function __construct(){
		parent::__construct();
        
        if($this->session->userdata('hakakses') == ''){
            redirect('login');
        }
        
        date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		$data['title'] = 'Management Pelamar';
		$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where l.status='1'")->result();
		$data['file']='admin/pelamar/index';
		$this->load->view('admin/main',$data);
	}
	
	
	function kelola_pelamar($id){
		if($id != null){
			$data['title'] = 'Management Pelamar';
			$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where l.id_loker=".$id)->row();
			$data['pelamar']=$this->db->query("select p.*,s.*,p.status as status_pelamar from t_pelamar p inner join t_siswa s on p.nisn=s.nisn where p.id_loker='".$id."'")->result();
			$data['file']='admin/pelamar/pelamar_kelola';
			$hasil=true;
			$this->session->set_flashdata('alert', $hasil);
			$this->load->view('admin/main',$data);
		}else{
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/pelamar');
		}
	}
	
	
	function delete_pelamar(){
		if($this->input->post('id_pelamar')){
			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->delete('t_pelamar');
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
		}
		
		//redirect('admin/pelamar');
	}
	function add_pelamar($id_loker=null){
		if($this->input->post('nisn')){
			$data=array(
					'id_loker' => $this->input->post('id_loker'),
					'nisn' => $this->input->post('nisn'),
					'tanggal_daftar' => date("Y-m-d"),
					'status' => '1',
				);
			$hasil=$this->db->insert('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
			//redirect('admin/pelamar/kelola_pelamar');
		}
		else{
			$data['title'] = 'Tambah Data pelamar';
			$data['siswa']=$this->db->get("t_siswa")->result();
			$data['id_loker']= $id_loker;
			$data['file']='admin/pelamar/pelamar_cari';
			$this->load->view('admin/main',$data);
		}
	}
	
	function edit_dokumen(){
		if($this->input->post('proses')){
			
			//upload gambar
			$config['upload_path'] = './assets/files/alumni/';
				$config['allowed_types'] = '*';
				$config['file_name']=$this->input->post('id_pelamar');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('dokumen')){
					$message='Tidak Berhasil : '.$this->upload->display_errors();
					$this->session->set_flashdata('alert', $message);
					$this->kelola_pelamar($this->input->post('id_loker'));
				}
				else{
					$file=$this->upload->data('dokumen');
					$dokumen = $file['file_name'];
					ini_set('memory_limit', '-1');
					ini_set('max_execution_time', 1000);
					ini_set('post_max_size', '128M');
					ini_set('upload_max_filesize', '128M');
					
				$data=array(
					'dokumen' => $dokumen,
					);
			

			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->update('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
		}
		}
		else{
				$data['title'] = 'Edit Data Pelamar';
				$cek = $this->db->get_where('t_siswa',array('nisn'=>$this->input->post('nisn')));
				$data['data_jurusan']=$this->db->get("t_jurusan")->result();
				if($cek->num_rows() > 0 ){
					$data['siswa'] = $cek->row();
					$data['id_loker']=$this->input->post('id_loker');
					$data['id_pelamar']=$this->input->post('id_pelamar');
					$data['file']='admin/pelamar/edit_dokumen';					
				}
			$this->load->view('admin/main',$data);	
		}
	}
	
	function edit_status(){
		if($this->input->post('proses')){
				$data=array(
					'status' => $this->input->post('status'),
					);
			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->update('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
		}
		else{
				$data['title'] = 'Edit Data Pelamar';
				$cek = $this->db->get_where('t_siswa',array('nisn'=>$this->input->post('nisn')));
				$data['data_jurusan']=$this->db->get("t_jurusan")->result();
				$id_pelamar=$this->input->post('id_pelamar');
				if($cek->num_rows() > 0 ){
					$data['siswa'] = $cek->row();
					$data['id_loker']=$this->input->post('id_loker');
					$data['id_pelamar']=$this->input->post('id_pelamar');
					$data['status']=$this->db->query("select status from t_pelamar where id_pelamar='$id_pelamar'")->row()->status;
					$data['file']='admin/pelamar/edit_status';					
				}
			$this->load->view('admin/main',$data);	
		}
	}
	
	function cari_loker(){
	if($this->input->post('cari')){	
		$cari=$this->input->post('cari');
		$data['title'] = 'Management Pelamar';
		$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where i.nama like '%".$cari."%' or l.judul like '%".$cari."%'")->result();
		$data['file']='admin/pelamar/index';
		$this->load->view('admin/main',$data);
	}else{
		redirect('admin/pelamar/index');
	}
	}
	
	function loker_pribadi($nisn=null){
		$data['title'] = 'Loker yang diikuti';
		$data['loker'] = $this->db->query("select l.*,i.nama,l.status as status_loker, p.status as status_lamaran,p.id_pelamar from t_loker l inner join t_industri i on l.id_industri=i.id_industri inner join t_pelamar p on p.id_loker=l.id_loker where p.nisn='$nisn' order by id_loker")->result();
		$data['file']='admin/loker/loker_pribadi';
		$this->load->view('admin/main',$data);
	}
	
	function loker_pribadi_cari(){
		$cari='';
		if($this->input->post('cari')){	
			$cari=$this->input->post('cari');
		}
		$data['title'] = 'Cari Loker';
		$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where i.nama like '%".$cari."%' or l.judul like '%".$cari."%'")->result();
		$data['file']='admin/loker/loker_cari';
		$this->load->view('admin/main',$data);

	}
	
	function loker_pribadi_add($id_loker=null){
			$data=array(
					'id_loker' => $id_loker,
					'nisn' => $this->session->userdata('username'),
					'tanggal_daftar' => date("Y-m-d"),
					'status' => '1',
				);
			$hasil=$this->db->insert('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/pelamar/loker_pribadi/'.$this->session->userdata('username'));
	}
	
	function loker_pribadi_delete($id_pelamar=null){
			$this->db->where(array('id_pelamar'=>$id_pelamar));
			$hasil=$this->db->delete('t_pelamar');
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/pelamar/loker_pribadi/'.$this->session->userdata('username'));
	}
	
	function loker_pribadi_upload_dokumen(){
		if($this->input->post('upload')){
			
			//upload gambar
			$config['upload_path'] = './assets/files/alumni/';
				$config['allowed_types'] = '*';
				$config['file_name']=$this->session->userdata('username');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('dokumen')){
					$message='Tidak Berhasil : '.$this->upload->display_errors();
					$this->session->set_flashdata('alert', $message);
					$this->kelola_pelamar($this->input->post('id_loker'));
				}
				else{
					$file=$this->upload->data('dokumen');
					$dokumen = $file['file_name'];
					ini_set('memory_limit', '-1');
					ini_set('max_execution_time', 1000);
					ini_set('post_max_size', '128M');
					ini_set('upload_max_filesize', '128M');
					
				$data=array(
					'dokumen' => $dokumen,
					);
			

			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->update('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
			}
				
		}
				$data['title'] = 'Upload Berkas';
				$data['file']='admin/loker/loker_upload';					
				$this->load->view('admin/main',$data);	
	}
}
?>