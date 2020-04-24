<?php
class profil extends ci_controller{
	function __construct(){
		parent::__construct();
        
        if($this->session->userdata('hakakses') != 'admin'){
            redirect('login');
        }
        
        date_default_timezone_set('Asia/Jakarta');
	}

	function index(){
		if($this->input->post('profil')){
			$data=array(
					'id' => '1',
					'profil' => $this->input->post('profil'),
				);
			$this->db->where(array('id'=>'1'));
			$hasil=$this->db->update('t_profil',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/profil/index');
		}
		else{
				$data['title'] = 'Edit Profil';
				$data['profil'] = $this->db->query("select profil from t_profil where id='1'")->row()->profil;
				$data['file']='admin/profil/index';
				$this->load->view('admin/main',$data);	

		}
	}
	
	
}
?>