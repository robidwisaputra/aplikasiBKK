<?php
class user extends ci_controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('admin/m_user'));
		if($this->session->userdata('hakakses') == ''){
            redirect('login');
        }
	}
	function index(){
		$data['title'] = 'Data User';
		$data['user'] = $this->m_user->getUser();
		$data['file']='admin/user/index';
		$this->load->view('admin/main',$data);
		//$this->load->view('admin/user/index',$data);
	}
	function edit($id=null){
			$data['title'] = 'Edit User';
			if($id != null){
				$cek = $this->m_user->getUserSatu($id);
				if($cek->num_rows() > 0){
					$data=array(
						'id'=>$id,
						'username'=>$cek->row()->username,
						'password'=>md5($cek->row()->username),
						'hakakses'=>'admin',
					);
					$this->db->where(array('id'=>$id));
					$hasil=$this->db->update('t_user',$data);
					if($hasil==1){
						$hasil=2;
					}else{}
					$this->session->set_flashdata('alert', $hasil);
					redirect('admin/user/index');
					
					;
					//$this->load->view('admin/user/edit',$data);
				}
				else{
					redirect('admin/user/index');
				}
			}
		}
	
	
	function editpass($id=null){
		if($this->input->post('password')){
			$id=$this->session->userdata('id');
			
			if($this->input->post('password')!=$this->input->post('cpassword'))	{
					$this->session->set_flashdata('alert', '0');
					redirect('admin/user/editpass');
			}else{
					$data=array(
					'password' => md5($this->input->post('password')),
					);
					$this->db->where(array('id'=>$id));
					$hasil=$this->db->update('t_user',$data);
					$this->session->set_flashdata('alert', $hasil);
					redirect('admin/user/editpass');
			}
					
					
			
		}
		else{
			$data['title'] = 'Ubah Kata Sandi';
			$id=$this->session->userdata('id');
			if($id != null){
				$cek = $this->m_user->getUserSatu($id);
				if($cek->num_rows() > 0){
					$data['user'] = $cek->row();
					$data['file']='admin/user/editpass';
					$this->load->view('admin/main',$data);
					//$this->load->view('admin/user/edit',$data);
				}
				else{
					redirect('admin/user/editpass');
				}
			}
		}
	}
	
	function edit_pass_pribadi(){
		$id=$this->session->userdata('id');
		if($this->input->post('password')){	
			if($this->input->post('password')!=$this->input->post('cpassword'))	{
					$this->session->set_flashdata('alert', '0');
					redirect('admin/user/editpass');
			}else{
					$data=array(
					'password' => md5($this->input->post('password')),
					);
					$this->db->where(array('id'=>$id));
					$hasil=$this->db->update('t_user',$data);
					$this->session->set_flashdata('alert', $hasil);
					$id=$this->session->userdata('id');
					redirect('admin/user/edit_pass_pribadi');
			}				
		}
		else{
			$id=$this->session->userdata('id');
			$cek = $this->db->get_where('t_user',array('id'=>$id));
			if($cek->num_rows() > 0 ){
				$data['user'] = $cek->row();	
			}
			$data['title'] = 'Ubah Kata Sandi';
			$data['file']='admin/user/edit_pass_pribadi';
			$this->load->view('admin/main',$data);
			
		}
	}
	
	function tambah($nip = null){
		if($this->input->post('username')){
			
			$jml=$this->db->query("select * from t_user where username='".$this->input->post('username')."'")->num_rows();
			if($jml>0){
				$this->session->set_flashdata('alert', '3');
					redirect('admin/user/tambah');
			}else if($this->input->post('password')!=$this->input->post('cpassword'))	{
					$this->session->set_flashdata('alert', '2');
					redirect('admin/user/tambah');
			}else{
				
			$data=array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'hakakses' => 'admin',
	
				);
			$hasil=$this->db->insert('t_user',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/user/index');
			}
		
		}else{
			$data['title'] = 'Add User';
			$data['file']='admin/user/tambah';
			$this->load->view('admin/main',$data);
        	//if($this->session->userdata('hakakses') == 'admin' or $this->session->userdata('hakakses') == 'adminsms') $this->load->view('admin/user/tambah',$data);
			//else $this->load->view('admin/user/tambah',$data);
		}
	}
    function pencarianNip(){
    	$cari=$this->input->post('nama');
        $data['pegawai']=$this->m_pegawai->cari($cari)->result();
		$data['file']='admin/user/pencarianNip';
		$this->load->view('admin/main',$data);
        //$this->load->view('admin/user/pencarianNip',$data);
    }
    function pencarianNipEdit(){
    	$cari=$this->input->post('nama');
    	$id=$this->input->post('id');
    	$data['id'] = $id;
        $data['pegawai']=$this->m_pegawai->cari($cari)->result();
		$data['file']='admin/user/pencarianNipEdit';
		$this->load->view('admin/main',$data);
        //$this->load->view('admin/user/pencarianNipEdit',$data);
    }
	function hapus($id){
		if($id != null){
			$hasil=$this->m_user->hapus($id);
			$this->session->set_flashdata('alert', $hasil);
		}
		redirect('admin/user');
	}
}
?>