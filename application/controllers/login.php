<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
       // $this->load->model('m_login'); //memasukkan file model m_login.php ke dalam controller
        //MenLoad model yang berada di Folder Model dan File'nya m_login
        $this->load->model('m_login');
        // Meload Library form_validasi dan session 
        //$this->load->library(array('form_validation','session'));
        ////Meload database
        //$this->load->database();
        //Meload url 
       // $this->load->helper('url');
    }
    function index()
    {
        $session = $this->session->userdata('isLogin'); //mengabil dari session apakah sudah login atau belum
        if($session == FALSE) //jika session false maka akan menampilkan halaman login
        {
            $this->load->view('login');
        }else //jika session true maka di redirect ke halaman dashboard
        {
            redirect('dashboard');
        }
    }
    function do_login()
    {
        $username = $this->input->post("uname");
        $password = $this->input->post("pass");
        
        $cek = $this->m_login->cek_user($username,md5($password)); //melakukan persamaan data dengan database
        //$jml = $cek->num_rows();
        if(count($cek) == 1){ //cek data berdasarkan username & pass
            foreach ($cek as $cek) {
                //$level = $cek['level']; //mengambil data(level/hak akses) dari database
                $level = $cek['level_idlevel'];
                $iduser=$cek['iduser'];
                $kategori=$cek['kategori'];

            }
            $this->session->set_userdata(array(
                'isLogin'   => TRUE, //set data telah login
                'uname'  => $username, //set session username
                'lvl'      => $level, //set session hak akses
                'iduser'    =>$iduser,
                'kategori'  =>$kategori
                
            ));
                
           redirect('dashboard','refresh');  //redirect ke halaman dashboard
        }else{ //jika data tidak ada yng sama dengan database
            echo "<script>alert('Gagal Login!')</script>";
            redirect('login','refresh');
        }
        
    }
     function lupa_password(){
        $this->load->view('lupa_passwd');
    }
    
} 