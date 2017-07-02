<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_berita extends CI_Model {

	function __construct(){
			parent::__construct();
			//$this->tbl = "tb_pengguna";
			$this->tbl = "berita";
	}
	public function get_all_berita(){
		//$query = $this->db->get('tb_pengguna ');
		$query = $this->db->get('v_berita');
		//$query = $this->db->get('user');
		return $query->result();

	}

public function get_all_berita_pending_a(){
		
		$sql="SELECT * FROM v_berita WHERE status_berita=5 ";
		$query = $this->db->query($sql);
			return $query->result();

	}
	
	public function get_all_berita_pending_cw($kategori){
		
		$sql="SELECT * FROM v_berita WHERE status_berita=5 or status_berita=3 and kategori='$kategori'";
		$query = $this->db->query($sql);
			return $query->result();

	}
	public function get_all_berita_approved_a(){
		
		$sql="SELECT * FROM v_berita WHERE status_berita=1 ";
		$query = $this->db->query($sql);
			return $query->result();

	}
	public function get_all_berita_rejected_a(){
		
		$sql="SELECT * FROM v_berita WHERE status_berita=2 ";
		$query = $this->db->query($sql);
			return $query->result();
	}

	public function get_all_berita_pending($kategori){
		
		$sql="SELECT * FROM v_berita WHERE status_berita=5 or status_berita=3 and kategori='$kategori' ";
		$query = $this->db->query($sql);
			return $query->result();

	}
	public function get_all_berita_approved_cw($kategori){
		
		$sql="SELECT * FROM v_berita WHERE status_berita=1 or status_berita=7 and kategori='$kategori' ORDER BY idberita DESC";
		$query = $this->db->query($sql);
			return $query->result();

	}
	public function get_all_berita_approved_rd($kategori){
		
		$sql="SELECT * FROM v_berita WHERE status_berita=1 or status_berita=8 and kategori='$kategori' ORDER BY idberita DESC";
		$query = $this->db->query($sql);
			return $query->result();

	}
	public function get_all_berita_rejected($kategori){
		
		$sql="SELECT * FROM v_berita WHERE status_berita=2 and kategori='$kategori' ";
		$query = $this->db->query($sql);
			return $query->result();

	}
	public function get_all_berita_user_pending($uname){
		
		$sql="SELECT * FROM v_berita WHERE username='$uname' and status_berita=5 or status_berita=3";
		$query = $this->db->query($sql);
			return $query->result();

	}
	//RedakturPending
	public function get_all_berita_redaktur_pending($uname,$kategori){
		
		$sql="SELECT * FROM v_berita WHERE kategori='$kategori' and status_berita=0 or status_berita=5 or status_berita=3";
		$query = $this->db->query($sql);
			return $query->result();

	}
	//Redaktur-layouter final
	//status 6 -> sudaAH final
	public function get_all_berita_final($kategori){
		
		$sql="SELECT * FROM v_berita WHERE status_berita=6 and kategori='$kategori' ";
		$query = $this->db->query($sql);
			return $query->result();

	}
	public function get_all_berita_user_approved($uname){
		
		$sql="SELECT * FROM v_berita WHERE username='$uname' and status_berita=1 ORDER BY idberita DESC";
		$query = $this->db->query($sql);
			return $query->result();

	}
	public function get_all_berita_user_rejected($uname){
		
		$sql="SELECT * FROM v_berita WHERE username='$uname' and status_berita=2";
		$query = $this->db->query($sql);
			return $query->result();

	}
	public function get_all_berita_user_save($uname){
		//status save 4
		$sql="SELECT * FROM v_berita WHERE username='$uname' and status_berita=0 or status_berita=9 or status_berita=3";
		$query = $this->db->query($sql);
			return $query->result();

	}

	public function insert_berita($data){
		//return $this->db->insert('tb_pengguna', $data);
		//return $this->db->insert('berita', $data);
		$this->db->insert('berita', $data);
		$idberita=$this->db->insert_id();
		return $idberita;

	}
	
	public function getBerita($idberita){
		$this->db->where('idberita',$idberita);
		$query= $this->db->get('v_berita');
		return $query->row_array();
	}

	public function getById($idberita){
		//$query = $this->db->get_where('tb_pengguna',array('id'=>$id_user));
		// $query = $this->db->get_where('user',array('id'=>$iduser));
		// return $query->row_array();
		$this->db->from($this->tbl);
		$this->db->where('idberita',$idberita);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete_berita($idberita){
		// $this->db->where('tb_pengguna.id_user',$id_user);
		// return $this->db->delete('tb_pengguna');
		$this->db->where('berita.idberita',$idberita);
		return $this->db->delete('berita');
	}


	public function update_berita($data,$idberita){
		//$this->db->where('tb_pengguna.id_user',$id_user);
		//return $this->db->update('tb_pengguna', $data);
		$this->db->where('berita.idberita',$idberita);
		return $this->db->update('berita', $data);
	}
public function update_status_final($idberita){
		$sql="UPDATE berita SET status_berita=6 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}
//update_status_send_cw
	public function update_status_send_cw($idberita){
		$sql="UPDATE berita SET status_berita=7 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}

	public function update_status_send_wartawan($idberita){
		$sql="UPDATE berita SET status_berita=9 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}

	//update_status_send_to_rd($idberita)
	public function update_status_send_to_rd($idberita){
		$sql="UPDATE berita SET status_berita=8 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}

public function update_status_save($idberita){
		$sql="UPDATE berita SET status_berita=4 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}
	public function update_status_send($idberita){
		$sql="UPDATE berita SET status_berita=5 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}
	public function getIdBerita(){
		return $this->db->insert_id();
	}

	public function update_status_approve($idberita){
		$sql="UPDATE berita SET status_berita=1 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}

	public function update_status_reject($idberita){
		$sql="UPDATE berita SET status_berita=2 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}

	public function approve_from_reject($idberita){
		$sql="UPDATE berita SET status_berita=5 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}
	public function update_status_edit($idberita){
		$sql="UPDATE berita SET status_berita=3 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}
	public function update_status_read($idberita){
		$sql="UPDATE berita SET status_read=1 WHERE idberita='$idberita'";
		return $this->db->query($sql);
			//return $query->result();
	}

	public function tampil_dari_tgl_pending($tgl_awal){
		$sql="SELECT * from v_berita where status_berita=0 and time_create like '%$tgl_awal%'";
		$a = $this->db->query($sql);
		return $a->result();
	}

	public function tampil_dari_tgl_approved($tgl_awal){
		$sql="SELECT * from v_berita where status_berita=1 and time_create like '%$tgl_awal%'";
		$a = $this->db->query($sql);
		return $a->result();
	}

	public function tampil_dari_tgl_rejected($tgl_awal){
		$sql="SELECT * from v_berita where status_berita=2 and time_create like '%$tgl_awal%'";
		$a = $this->db->query($sql);
		return $a->result();
	}

	public function tampil_dari_tgl_saved($tgl_awal){
		$sql="SELECT * from v_berita where status_berita=4 and time_create like '%$tgl_awal%'";
		$a = $this->db->query($sql);
		return $a->result();
	}

	public function tampil_dari_search_pending($cari){
		$sql="SELECT * from v_berita where status_berita=0 and judul like '%$cari%'";
		$a = $this->db->query($sql);
		return $a->result();
	}

	public function tampil_dari_search_approved($cari){
		$sql="SELECT * from v_berita where status_berita=1 and judul like '%$cari%'";
		$a = $this->db->query($sql);
		return $a->result();
	}

	public function tampil_dari_search_rejected($cari){
		$sql="SELECT * from v_berita where status_berita=2 and judul like '%$cari%'";
		$a = $this->db->query($sql);
		return $a->result();
	}
}

?>