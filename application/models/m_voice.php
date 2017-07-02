<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_voice extends CI_Model {

	function __construct(){
			parent::__construct();
			//$this->tbl = "tb_pengguna";
			$this->tbl = "materi";
	}
	
	public function getMateri($idmateri){

		$sql="SELECT * FROM materi WHERE idmateri='$idmateri'";
		$query = $this->db->query($sql);
			return $query->result();
	}


}

?>