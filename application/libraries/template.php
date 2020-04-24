<?php
class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
    }
    
    function displayAdmin($template,$data=null){
        $data['_content']=$this->_CI->load->view($template,$data,true);
        $data['_header']=$this->_CI->load->view('admin/template/header',$data,true);
        $data['_sidebar']=$this->_CI->load->view('admin/template/sidebar',$data,true);
        $this->_CI->load->view('admin/template.php',$data);
    }
    

}