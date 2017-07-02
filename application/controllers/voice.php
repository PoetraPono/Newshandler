<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Voice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model(array('m_user'));
        $this->load->model('m_voice');
        $this->load->model('m_login'); 
        $this->load->model('m_kategori'); 
        $this->load->model('m_level'); 
        if ($this->session->userdata('username')) {
            redirect('dashboard');
     }
    }

    public function ambil(){
            $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
            $data = array(
                'user'  => $ambil_akun,
                );
            $stat = $this->session->userdata('lvl');
            
                $data['page']="coba";
               // $data['user_list'] = $this->m_user->get_all_user();
                $this->load->view("dashboard_user",$data);
        }
 
    
 }

 