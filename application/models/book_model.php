<?php

class Book_model extends CI_Model {

	function __construct(){
			parent::__construct();
			$this->load->database("perpus");
	}
	public function get_all_buku(){
		$query = $this->db->get('buku');
		return $query->result();
	}
		
	public function insert_buku_to_db($data){
		return $this->db->insert('buku', $data);

	}
	public function getById($id){
		$query = $this->db->get_where('buku',array('id'=>$id));
		return $query->row_array();
	}

	public function update_info($data,$id){
		$this->db->where('buku.id',$id);
		return $this->db->update('buku', $data);
	}
	
	public function delete_a_buku($id){
		$this->db->where('buku.id',$id);
		return $this->db->delete('buku');
	}


}

?>
