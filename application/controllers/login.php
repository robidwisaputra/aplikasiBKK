<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	
	public function __construct(){
	    parent::__construct();
	   
	} 
	 
	public function index(){
		
		if($this->session->userdata('hakakses') == 'admin'){
			redirect('admin/dashboard');
		}
        else {
			$data['action']='login/getLogin';
			$this->load->view('V_login',$data);
		}
			
			
	}
	
	public function getLogin(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('username','username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message',"<div class='alert alert-danger alert-dismissible'>Username dan password harus diisi</div>");
            redirect('login');
        }else{
            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));
            $data=$this->db->query("SELECT * from t_user where username='$username' and password='$password'");
            if($data->num_rows()>0){
                //login berhasil, buat session

				foreach($data->result() as $d){
					$s=array(
							'id' => $d->id,
							'username' => $d->username,
							'hakakses' => $d->hakakses,
						);
					$this->session->set_userdata($s);
				}
				
				
			
				if(($this->session->userdata('hakakses') == 'admin') || ($this->session->userdata('hakakses') == 'operator') || ($this->session->userdata('hakakses') == 'alumni')){
					//echo "harusnya masuk menu admin";
					redirect('admin/dashboard');
				}else{
						$this->session->set_flashdata('message',"<div class='alert alert-danger alert-dismissible'>Hakakses yang anda gunakan tidak ada</div>");
						redirect('login');
				}
            }else{
						//login gagal
						$this->session->set_flashdata('message',"<div class='alert alert-danger alert-dismissible'>Username atau password salah</div>");
						redirect('login');
						
			 
            }
		
		}
	
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */