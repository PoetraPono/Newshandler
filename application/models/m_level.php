<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_level extends CI_Model {

	function __construct(){
			parent::__construct();
			//$this->tbl = "tb_pengguna";
			$this->tbl = "level_user";
	}
	
	// public function getAllLevel_user(){
	// $level_user= $this->db->get('level_user');
	// return $level_user->result_array();
	
	// }

	public function getAllLevel_user(){
		//$query = $this->db->get('tb_pengguna ');
		$query = $this->db->get('level_user');
		//$query = $this->db->get('user');
		return $query->result();
	}
}
?>