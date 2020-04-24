<?php
class m_sms extends ci_model{	
	function getInbox(){
		return $this->db->order_by('ID','desc')->get('inbox')->result();
	}
	function getSatuInbox($id){
		return $this->db->get_where('inbox',array('ID'=>$id))->row();
	}
	function readSms($id){
		$cek = $this->db->get_where('inbox',array('ID'=>$id))->row();
		if($cek->newComing == 0 ){
			$data=array('newComing'=>1);
			$this->db->where('ID',$id)
					 ->update('inbox',$data);
		}
	}
	function deleteInbox(){
		foreach ($this->input->post('pilih') as $pilih) {
			$hasil=$this->db->where('ID',$pilih)->delete('inbox');
		}
		return $hasil;
	}
	function deleteOutbox(){
		foreach ($this->input->post('pilih') as $pilih) {
			$hasil=$this->db->where('ID',$pilih)->delete('outbox');
		}
		return $hasil;
	}
	function deleteSentbox(){
		foreach ($this->input->post('pilih') as $pilih) {
			$hasil=$this->db->where('ID',$pilih)->delete('sentitems');
		}
		return $hasil;
	}
	function getOutbox(){
		return $this->db->order_by('ID','desc')->get('outbox')->result();
	}
	function getGroup(){
		return $this->db->get('pbk_groups')->result();
	}
	function getSatuOutbox($id){
		return $this->db->get_where('outbox',array('ID'=>$id))->row();
	}
	function getSentbox(){
		return $this->db->order_by('ID','desc')->get('sentitems')->result();
	}

	function getSatuSentbox($id){
		return $this->db->get_where('sentitems',array('ID'=>$id))->row();
	}
	
	function send($data){
		return $this->db->insert('outbox',$data);
	}
	
	
	//jumlah count
	function jmlInboxNoRead(){
		return $this->db->from('inbox')
						->where('newComing','0')
						->count_all_results();
	}
	
	//pegawai
	function getpegawai(){
		return $this->db->get('pegawai')->result();
	}
	function getSatupegawai($id){
		return $this->db->get_where('pegawai',array('id'=>$id));
	}
	function addpegawai($data){
		return $this->db->insert('pegawai',$data);
	}
	function editpegawai($data,$id){
		return $this->db->where('id',$id)->update('pegawai',$data);
	}
	function deletepegawai($id){
		return $this->db->where('id',$id)->delete('pegawai');
	}
	
	
	//phone book
	function getPhonebook(){
		return $this->db->get('pbk')->result();
	}
	function getSatuPhonebook($id){
		return $this->db->get_where('pbk',array('ID'=>$id));
	}
	function addPhonebook($data){
		return $this->db->insert('pbk',$data);
	}
	function editPhonebook($data,$id){
		return $this->db->where('ID',$id)->update('pbk',$data);
	}
	function deletePhonebook($id){
		return $this->db->where('ID',$id)->delete('pbk');
	}
	
	//cari phone book per group
	function getPhonebookPerGroup($id){
		return $this->db->get_where('pbk',array('GroupID'=>$id))->result();
	}
	
	
	//group phone
	function getGroupPhonebook(){
		return $this->db->get('pbk_groups')->result();
	}
	function getSatuGroupPhonebook($id){
		return $this->db->get_where('pbk_groups',array('ID'=>$id));
	}
	function deleteGroupPhonebook($id){
		return $this->db->where('ID',$id)->delete('pbk_groups');
	}
	function addGroupPhonebook($data){
		return $this->db->insert('pbk_groups',$data);
	}
	function editGroupPhonebook($data,$id){
		return $this->db->where('ID',$id)->update('pbk_groups',$data);
	}
	
	
	function carinomor($id){
		// $this->db->like('nama',$id);
		// $this->db->or_like('hp',$id);
		//return $this->db->query('SELECT p.name,p.number,pg.name FROM pbk p inner join pbk_groups pg on p.GroupID=pg.ID WHERE name like "%'.$id.'%" or pg.name like "%'.$id.'%" and p.status="aktif" and pg.status="aktif"');
		return $this->db->query("SELECT * from pbk where name like '$id%'");
	}
	
	
	//modem
	function getModem(){
		return $this->db->get('modem')->result();
	}
	function getSatuModem($id){
		return $this->db->get_where('modem',array('id'=>$id));
	}
	function deleteModem($id){
		return $this->db->where('id',$id)->delete('modem');
	}
	function addModem($data){
		return $this->db->insert('modem',$data);
	}
	function editModem($data,$id){
		return $this->db->where('id',$id)->update('modem',$data);
	}
	
	//template
	function gettempsms(){
		return $this->db->get('tempsms')->result();
	}
	function getSatutempsms($id){
		return $this->db->get_where('tempsms',array('id'=>$id));
	}
	function deletetempsms($id){
		return $this->db->where('id',$id)->delete('tempsms');
	}
	function addtempsms($data){
		return $this->db->insert('tempsms',$data);
	}
	function edittempsms($data,$id){
		return $this->db->where('id',$id)->update('tempsms',$data);
	}
	
	//requestsms
	function getrequestsms(){
		return $this->db->get('requestsms')->result();
	}
	function getSaturequestsms($id){
		return $this->db->get_where('requestsms',array('id'=>$id));
	}
	function deleterequestsms($id){
		return $this->db->where('id',$id)->delete('requestsms');
	}
	function addrequestsms($data){
		return $this->db->insert('requestsms',$data);
	}
	function editrequestsms($data,$id){
		return $this->db->where('id',$id)->update('requestsms',$data);
	}
	
	//requestsms
	function getautosms(){
		return $this->db->get('autosms')->result();
	}
	function getSatuautosms($id){
		return $this->db->get_where('autosms',array('id'=>$id));
	}
	function deleteautosms($id){
		return $this->db->where('id',$id)->delete('autosms');
	}
	function addautosms($data){
		return $this->db->insert('autosms',$data);
	}
	function editautosms($data,$id){
		return $this->db->where('id',$id)->update('autosms',$data);
	}
	
	//jadwalsms
	function getjadwalsms(){
		return $this->db->get('jadwalsms')->result();
	}
	function getSatujadwalsms($id){
		return $this->db->get_where('jadwalsms',array('id'=>$id));
	}
	function deletejadwalsms($id){
		return $this->db->where('id',$id)->delete('jadwalsms');
	}
	function addjadwalsms($data){
		return $this->db->insert('jadwalsms',$data);
	}
	function editjadwalsms($data,$id){
		return $this->db->where('id',$id)->update('jadwalsms',$data);
	}
	function getjadwalsmsIndex(){
		return $this->db->query("select j.id,j.nama,j.tglmulai,j.tglberakhir,j.pukul,g.name as groupPenerima,j.isi,j.status from jadwalsms j inner join pbk_groups g on j.groupPenerima=g.ID")->result();
		
	}
}
?>