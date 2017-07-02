<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_history extends CI_Model {

	function __construct(){
			parent::__construct();
			//$this->tbl = "tb_pengguna";
			$this->tbl = "history_edit";
	}
	
	public function getHistoryBerita($idberita){
		// $this->db->where('idberita',$idberita);
		// $query= $this->db->get('history_edit');
		
		// return $query->row_array();

		$sql="SELECT * FROM history_edit WHERE idberita='$idberita'";
		$query = $this->db->query($sql);
			return $query->result();
	}

	public function insert_berita_to_history($data){
		//return $this->db->insert('tb_pengguna', $data);
		return $this->db->insert('history_edit', $data);

	}
	public function update_history($data,$idberita){
		//$this->db->where('tb_pengguna.id_user',$id_user);
		//return $this->db->update('tb_pengguna', $data);
		$this->db->where('history_edit.idberita',$idberita);
		return $this->db->update('history_edit', $data);
	}



}

?>