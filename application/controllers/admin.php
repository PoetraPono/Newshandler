<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->auth->cek_auth(); //ngambil auth dari library
		$this->load->model('m_user');
		$this->load->model('m_berita');
		$this->load->model('m_kategori');
		$this->load->model('m_level');

	}

	////------------------------- USER ------------------------------------------///
	public function ajax_add()
	{
		$data = array(
				'Nama' => $this->input->post('Nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'level_idlevel' => $this->input->post('level'),
				'kategori_idkategori' => $this->input->post('kategori'),
			);
		$this->m_user->insert_user($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_list()
	{
		$list = $this->m_user->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			//$row[] = $person->iduser;
			$row[] = $person->Nama;
			//$row[] = $person->password;
			$row[] = $person->level;
			$row[] = $person->kategori;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->iduser."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
			$row[] = '	  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->iduser."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_user->count_all(),
						"recordsFiltered" => $this->m_user->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_update()
	{
		$iduser = $_POST['iduser'];
		$data = array(
				'iduser'=>$this->input->post('iduser'),
				'Nama' => $this->input->post('Nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_idlevel' => $this->input->post('level'),
				'kategori_idkategori' => $this->input->post('kategori'),
			);
		$hasil=$this->m_user->update($iduser, $data);
		if($hasil){
			echo json_encode(array("status" => TRUE));
		}else{
			console.log("gagal");
		}

	}


	public function ajax_edit($iduser)
	{
		$data = $this->m_user->getById($iduser);
		echo json_encode($data);

	}

	public function ajax_delete($iduser)
	{
		$this->m_user->delete_by_id($iduser);
		echo json_encode(array("status" => TRUE));
	}

	public function list_user(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin
			$data['page']="list_user";
			$data['kategori_list'] = $this->m_kategori->getSemuaKategori();
			$data['level_list']=$this->m_level->getAllLevel_user();
			$data['user_list'] = $this->m_user->get_all_user();
    		$this->load->view("dashboard_admin",$data);
		}else{ //user
			$this->load->view('index',$data);
		}
    }


    public function add_user(){

		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');

		if($stat==4){//admin
			$data['page']="add_user";
			$data['kategori']=$this->m_kategori->getAllKategori();
    		$data['level_user']=$this->m_level->getAllLevel_user();
			$this->load->view('dashboard_admin',$data);
		}else{ //user
			$this->load->view('index',$data);
		}
    }
    ///--------------------------------------- BERITA --------------------------------------------------///

    public function list_berita(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$uname=$this->session->userdata('uname');
        $stat = $this->session->userdata('lvl');
        $kategori= $this->session->userdata('kategori');
		if($stat==4){//admin
			$data['page']="list_berita";
            $data['berita_list_saved'] = $this->m_berita->get_all_berita_user_save($uname);
            $data['berita_list_pending'] = $this->m_berita->get_all_berita_pending_a($uname);
            $data['berita_list_approved'] = $this->m_berita->get_all_berita_approved_a($uname);
            $data['berita_list_rejected'] = $this->m_berita->get_all_berita_rejected_a($uname);
            $this->load->view("dashboard_admin",$data);
    	}else{ //user
			$this->load->view('index',$data);
		}
    }

    public function edit_berita(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin
	    	$idberita=$this->uri->segment(3);
	    	$data['result']=$this->m_berita->getBerita($idberita);
	    	$result=$this->m_berita->getBerita($idberita);
	    	$data['judul']=$result['judul'];
	    	$data['isi']=$result['isi'];
	    	$this->load->view("dashboard_admin",$data);
		}else{ //user
			$this->load->view('index',$data);
		}
    }

    public function update_status_approve(){
    	 $idberita=$this->uri->segment(3);
    	 if ($this->m_berita->update_status_approve($idberita)){
				redirect('admin/list_berita');
			}
	}

	public function update_status_reject(){
    	 $idberita=$this->uri->segment(3);
    	 if ($this->m_berita->update_status_reject($idberita)){
				redirect('admin/list_berita');
			}
	}

	public function approve_from_reject(){
    	 $idberita=$this->uri->segment(3);
    	 if ($this->m_berita->approve_from_reject($idberita)){
				redirect('admin/list_berita');
			}
	}

	public function tampil_dari_tgl(){
		$a = $this->input->post("tgl_awal");
		//echo $a;
		$time =str_replace("/", "-", $a);
		//echo $time;

		//$time = "2016-08-20 04:42:14";
		//echo time;
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin

			$data['page']="list_berita";
			$data['berita_list_pending'] = $this->m_berita->tampil_dari_tgl_pending($time);
			$data['berita_list_approved'] = $this->m_berita->tampil_dari_tgl_approved($time);
			$data['berita_list_rejected'] = $this->m_berita->tampil_dari_tgl_rejected($time);
			$data['berita_list_saved'] = $this->m_berita->tampil_dari_tgl_saved($time);
    		$this->load->view("dashboard_admin",$data);
    	}
	}

	public function tampil_dari_search(){
		$a = $this->input->post("cari");
		//echo $a;
		// $time =str_replace("/", "-", $a);
		//echo $time;

		//$time = "2016-08-20 04:42:14";
		//echo time;
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin

			$data['page']="list_berita";
			$data['berita_list_pending'] = $this->m_berita->tampil_dari_search_pending($a);
			$data['berita_list_approved'] = $this->m_berita->tampil_dari_search_approved($a);
			$data['berita_list_rejected'] = $this->m_berita->tampil_dari_search_rejected($a);

    		$this->load->view("dashboard_admin",$data);
    	}
	}

    /// ---------------------------------------- KATEGORI ---------------------------------------------////

    public function add_kategori(){

		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');

		if($stat==4){//admin
			$data['page']="add_kategori";
			$this->load->view('dashboard_admin',$data);
		}else{ //user
			$this->load->view('index',$data);
		}
    }

	function add_data_kategori(){
			$udata['kategori'] = $this->input->post('kategori');

			if ($this->m_kategori->insert_kategori($udata)) {
				redirect('admin/list_kategori');
			}

	}

	public function list_kategori(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');

		if($stat==4){//admin
			$data['page']="list_kategori";
			$data['kategori_list'] = $this->m_kategori->getSemuaKategori();
    		$this->load->view("dashboard_admin",$data);
		}else{ //user
			$this->load->view('index',$data);
		}
    }

    public function delete_kategori($idkategori){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin

			$data['page']="list_kategori";
			$this->m_kategori->delete_kategori($idkategori);
			//$this->list_user();
    		//$this->load->view("dashboard_admin",$data);
    		redirect('admin/list_kategori');
		}else{ //user
			$this->load->view('index',$data);
		}
    }

    public function ajax_add_kategori()
	{
		$data = array(
				'kategori' => $this->input->post('kategori'),
			);
		$this->m_kategori->insert_kategori($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_list_kategori()
	{
		$list = $this->m_kategori->get_datatables();
		$data = array();
		//$no = $_POST['start'];
		foreach ($list as $person) {
			//$no++;
			$row = array();
			$row[] = $person->kategori;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kategori('."'".$person->idkategori."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
			$row[] = '	  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kategori('."'".$person->idkategori."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						// /"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_kategori->count_all(),
						"recordsFiltered" => $this->m_kategori->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit_kategori($idkategori)
	{
		$data = $this->m_kategori->getById($idkategori);
		echo json_encode($data);

	}

	public function ajax_update_kategori()
	{
		//$list = $this->m_kategori->get_datatables();
		$data = array(
				//'idkategori' => $this->input->post('idkategori'),
				'kategori' => $this->input->post('kategori')
			);
		$idkategori=$this->input->post('idkategori');

		$this->m_kategori->update($idkategori,$data);
			// $udata['idkategori'] = $_POST['idkategori'];
			// $udata['kategori'] = $_POST['kategori'];

			// $this->m_kategori->update($udata,$_POST['idkategori']);
		// $this->m_kategori->update(array('idkategori' => $this->input->post('idkategori')), $data);

		echo json_encode(array("status" => TRUE));

	}

	public function ajax_delete_kategori($idkategori)
	{
		$this->m_kategori->delete_by_id($idkategori);
		echo json_encode(array("status" => TRUE));
	}

    /// ---------------------------------------- LEVEL ---------------------------------------------////

    public function list_level(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');

		if($stat==4){//admin
			$data['page']="list_kategori";
			$data['level_list'] = $this->m_level->getAllLevel_user();
    		$this->load->view("dashboard_admin",$data);
		}else{ //user
			$this->load->view('index',$data);
		}
    }

    //-------------------------------------------ISI MODAL BERITA---------------------------//
    public function ajax_edit_modal_berita($idberita)
	{
		$data = $this->m_berita->getById($idberita);
		echo json_encode($data);
	}

	//-------------------------------------------Grafik Monitoring---------------------------//

    public function grafik_monitoring(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$uname=$this->session->userdata('uname');
        $stat = $this->session->userdata('lvl');
        $kategori= $this->session->userdata('kategori');
		if($stat==4){//admin
			$data['page']="grafik_monitoring";

            $this->load->view("dashboard_admin",$data);
    	}else{ //user
			$this->load->view('index',$data);
		}
}
}
