<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_notifikasi extends CI_Model {

	function __construct(){
			parent::__construct();
			//$this->tbl = "tb_pengguna";
			$this->tbl = "berita";
	}
	
	public function getNotifikasiCount($kategori){
	$sql="SELECT idberita FROM berita WHERE kategori='$kategori' and status_read=0 and status_berita != 0";
		$query = $this->db->query($sql);
		$count = $query->num_rows;
			return $count;
	}
	public function getNotifikasiUnread($kategori){
	$sql="SELECT idberita FROM berita WHERE kategori='$kategori' and status_read=0 and status_berita != 0";
		$query = $this->db->query($sql);
		
			return $query->result();
	}

	
	public function getNotifikasi($kategori){
		
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('user','user.iduser=berita.user_iduser');
		$this->db->join('status_berita','status_berita.idstatus_berita=berita.status_berita');
		$this->db->where('berita.kategori',$kategori);
		// $where="status_berita='0' ";
		 $this->db->where('berita.status_read','0');
		$this->db->order_by('time_create', 'desc');
		$query = $this->db->get();
		return $query->result_array();

		
	}
	
	}
?>
