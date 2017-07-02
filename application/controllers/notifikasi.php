<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model(array('m_user'));
        $this->load->model('m_berita');
        $this->load->model('m_login'); 
         $this->load->model('m_kategori'); 
          $this->load->model('m_level'); 
          $this->load->model('m_history'); 
          $this->load->model('m_notifikasi');  
        if ($this->session->userdata('username')) {
            redirect('dashboard');
     }
    }
 
    // function index()
    // {
    // 	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
    //     $data = array(
    //         'user'  => $ambil_akun,
    //         );

    //         $data['notifikasi_count']=$this->m_notifikasi->getNotifikasiCount();
    //         $this->load->view('dashboard_admin',$data);
    // }

// function updateNotifikasi()
//   {
//     $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
//     $data = array(
//       'user'  => $ambil_akun,
//       );
//     $kategori=$this->session->userdata('kategori');
//      $udata['notifikasi_count']=$this->m_notifikasi->updateNotifikasiCount();
//     //$udata['notifikasi_count']=1;

//     echo $udata['notifikasi_count'];
//      //redirect('dashboard');
//   }

//     function getNotifikasi()
//   {
//     $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
//     $data = array(
//       'user'  => $ambil_akun,
//       );
//     $kategori=$this->session->userdata('kategori');
//      $udata['listNotifikasi']=$this->m_notifikasi->get_all_Notifikasi($kategori);
//     //$udata['notifikasi_count']=1;

//    $this->load->view("dashboard_admin",$udata);
//      //redirect('dashboard');
//   }

public function update_status_read(){
 $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
    $data = array(
      'user'  => $ambil_akun,
      );
  
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->update_status_read($idberita)){
                $this->m_berita->update_status_read($idberita);
                redirect('user/list_berita');
            }
    }

// function tampilkan()
//   {
//     $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
//     $data = array(
//       'user'  => $ambil_akun,
//         );
//     $kategori=$this->session->userdata('kategori');
//     $udata['konten-info']=$this->m_notifikasi->tampilkan_notifikasi($kategori);

//      echo $udata['notifikasi_count'];


//   }

public function cek(){
 $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
    $data = array(
      'user'  => $ambil_akun,
      );
        $kategori=$this->session->userdata('kategori');
         $udata['notifikasi_count']=$this->m_notifikasi->getNotifikasiCount($kategori);
        echo $udata['notifikasi_count'];
         



}
public function lihat_notifikasi(){
 $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
    $data = array(
      'user'  => $ambil_akun,
      );
        $kategori=$this->session->userdata('kategori');
         $udata['konten']=$this->m_notifikasi->getNotifikasi($kategori);

       foreach($udata['konten'] AS $row) {
                 echo "<li> <b>",$row['Nama'],"</b> melakukan <b>",$row['status'],"</b> pada Berita <b>",$row['judul'],"</b><br> pada ",$row['time_create'],"</li><br>";
                 
             }

        
   }
   public function notif(){
 $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
    $data = array(
      'user'  => $ambil_akun,
      );
        $kategori=$this->session->userdata('kategori');
         return $udata['notifikasi_count']=$this->m_notifikasi->getNotifikasiUnread($kategori);

}
 }

 //<a href=pesan.php?no=".$p['idberita'].">