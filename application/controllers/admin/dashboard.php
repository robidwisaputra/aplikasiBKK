<?php

class dashboard extends ci_controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('hakakses') == ''){
            redirect('login');
        }
	}

	function index(){
		$data['title'] = 'Dasbor';
		$data['file']='admin/dashboard/index';
		$this->load->view('admin/main',$data);
	}
}
?>