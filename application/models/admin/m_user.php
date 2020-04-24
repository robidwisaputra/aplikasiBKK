<?php
class m_user extends ci_model{
	function getUser(){
		return $this->db->get('t_user')->result();
	}
	function getUserSatu($id){
		return $this->db->get_where('t_user',array('id'=>$id));
	}
	function hapus($id){
		return $this->db->where('id',$id)->delete('t_user');
	}
	function tambah($data){
		return $this->db->insert('t_user',$data);
	}
	function edit($data,$id){
		return $this->db->where('id',$id)->update('t_user',$data);
	}
}
?>