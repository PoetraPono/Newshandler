<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->auth->cek_auth(); //ngambil auth dari library
		
	}
	function index()
	{
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin
			$this->load->view('dashboard_admin',$data);
		}elseif($stat==1){ //wartawan
			$this->load->view('dashboard_wartawan',$data);
		}elseif ($stat==2) { //redaktur
			$this->load->view('dashboard_redaktur',$data);
		}elseif ($stat==3) {
			$this->load->view('dashboard_cw',$data);
		}else {
			$this->load->view('dashboard_layouter',$data);
		}
		
	}


	function login()
	{
		$session = $this->session->userdata('isLogin');
    	if($session == FALSE)
    	{
      		$this->load->view('login');
    	}else
    	{
      		redirect('dashboard');
    	}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	function notifikasi()
	{
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$kategori=$this->session->userdata('kategori');
		 $udata['notifikasi_count']=$this->m_notifikasi->getNotifikasiCount($kategori);
		//$udata['notifikasi_count']=1;

		echo $udata['notifikasi_count'];
		 //redirect('dashboard');
	}

	function updateNotifikasi()
  {
    $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
    $data = array(
      'user'  => $ambil_akun,
      );
    $kategori=$this->session->userdata('kategori');
     $udata['notifikasi_count']=$this->m_notifikasi->updateNotifikasiCount();
    //$udata['notifikasi_count']=1;

    echo $udata['notifikasi_count'];
     //redirect('dashboard');
  }

    function getNotifikasi()
  {
    $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
    $data = array(
      'user'  => $ambil_akun,
      );
    $kategori=$this->session->userdata('kategori');
     $udata['listNotifikasi']=$this->m_notifikasi->getNotifikasi();
    //$udata['notifikasi_count']=1;

    echo $udata['listNotifikasi'];
     //redirect('dashboard');
  }
	
}