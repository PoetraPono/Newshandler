<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {
	var $table = 'v_user';
	var $column_order = array('Nama', 'kategori', 'level'); //set column field database for datatable orderable
	var $column_search = array('iduser','Nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('iduser' => 'desc'); // default order

	function __construct(){
			parent::__construct();
			//$this->tbl = "tb_pengguna";
			$this->tbl = "user";

	}
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_by("iduser", "username"); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				// if(count($this->column_search) - 1 == $i) //last loop
					//$this->db->group_end(); //close bracket
			
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function save($data)
	{
		$this->db->insert($this->tbl, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		// // $this->db->update($this->tbl, $data, $where);
		// $this->db->update('user', $data, $where);
		// return $this->db->affected_rows();
		$this->db->where('user.iduser',$where);
		return $this->db->update('user', $data);
		

	}
	
	public function get_all_user(){
		//$query = $this->db->get('tb_pengguna ');
		$query = $this->db->get('v_user');
		//$query = $this->db->get('user');
		return $query->result();
	}
		
	public function insert_user($data){
		//return $this->db->insert('tb_pengguna', $data);
		return $this->db->insert('user', $data);

	}
	//public function getById($id_user){
	public function getById($iduser){
		//$query = $this->db->get_where('tb_pengguna',array('id'=>$id_user));
		// $query = $this->db->get_where('user',array('id'=>$iduser));
		// return $query->row_array();
		$this->db->from($this->table);
		$this->db->where('iduser',$iduser);
		$query = $this->db->get();

		return $query->row();
	}

	public function delete_by_id($iduser)
	{
		$this->db->where('iduser', $iduser);
		$this->db->delete($this->tbl);
	}

	
	
	//public function delete_user($id_user){
	public function delete_user($iduser){
		// $this->db->where('tb_pengguna.id_user',$id_user);
		// return $this->db->delete('tb_pengguna');
		$this->db->where('user.iduser',$iduser);
		return $this->db->delete('user');
	}

	public function getUser($iduser){
		$this->db->where('iduser',$iduser);
		$query= $this->db->get('user');
		return $query->row_array();
	}

}

?>