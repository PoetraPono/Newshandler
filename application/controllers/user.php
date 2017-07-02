<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends CI_Controller
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
        if ($this->session->userdata('username')) {
            redirect('dashboard');
    }
 
    function index()
    {
    	
    	$this->load->view('login');
    }

    function main()
    {

        $this->load->view('main');
    }

    function proses() {
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = mysql_real_escape_string($usr);
            $p = md5(mysql_real_escape_string($psw));
            $cek = $this->m_user->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['role'] = $qad->role;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
        }
    }


     function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
    
    }

///--------------------------------------- BERITA --------------------------------------------------///

     public function list_berita(){
       $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
        $uname=$this->session->userdata('uname');
        $stat = $this->session->userdata('lvl');
        $kategori= $this->session->userdata('kategori');
        
        if($stat==1){//wartawan


            $data['page']="list_berita_wartawan";
           //$data['berita_list'] = $this->m_berita->get_all_berita();
            $data['berita_list_saved'] = $this->m_berita->get_all_berita_user_save($uname);
            $data['berita_list_pending'] = $this->m_berita->get_all_berita_user_pending($uname);
            $data['berita_list_approved'] = $this->m_berita->get_all_berita_user_approved($uname);
            $data['berita_list_rejected'] = $this->m_berita->get_all_berita_user_rejected($uname);
            $this->load->view("dashboard_wartawan",$data);
            
        }elseif($stat==4){//admin
            $data['page']="list_berita";
            $data['berita_list_saved'] = $this->m_berita->get_all_berita_user_save($uname);
            $data['berita_list_pending'] = $this->m_berita->get_all_berita_pending_a();
            $data['berita_list_approved'] = $this->m_berita->get_all_berita_approved_a();
            $data['berita_list_rejected'] = $this->m_berita->get_all_berita_rejected_a();
            $this->load->view("dashboard_admin",$data);
        }elseif($stat==2){//redaktur
            $data['page']="list_berita_redaktur";
            //$data['berita_list_saved'] = get_all_berita_redaktur_pending($uname,$kategori);
            $data['berita_list_pending'] = $this->m_berita->get_all_berita_redaktur_pending($uname,$kategori);
            $data['berita_list_approved'] = $this->m_berita->get_all_berita_approved_rd($kategori);
            $data['berita_list_rejected'] = $this->m_berita->get_all_berita_rejected($kategori);
            $data['berita_list_final'] = $this->m_berita->get_all_berita_final($kategori);
            $this->load->view("dashboard_redaktur",$data);
        }elseif($stat==3){//cw
            $data['page']="list_berita_cw";
            // $data['berita_list_saved'] = $this->m_berita->get_all_berita_user_save($uname);
            $data['berita_list_pending'] = $this->m_berita->get_all_berita_pending_cw($kategori);
            $data['berita_list_approved'] = $this->m_berita->get_all_berita_approved_cw($kategori);
            // $data['berita_list_rejected'] = $this->m_berita->get_all_berita_rejected($kategori);
            $this->load->view("dashboard_cw",$data);
        }elseif($stat==5){//layouter
            $data['page']="list_berita_layouter";
            // $data['berita_list_saved'] = $this->m_berita->get_all_berita_user_save($uname);
            // $data['berita_list_pending'] = $this->m_berita->get_all_berita_pending($kategori);
            // $data['berita_list_approved'] = $this->m_berita->get_all_berita_approved($kategori);
            // $data['berita_list_rejected'] = $this->m_berita->get_all_berita_rejected($kategori);
             $data['berita_list_final'] = $this->m_berita->get_all_berita_final($kategori);
            $this->load->view("dashboard_layouter",$data);
        }
    }

    public function edit_berita(){
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
        $stat = $this->session->userdata('lvl');
        if($stat==1){
            $idberita=$this->uri->segment(3);
            $data['result']=$this->m_berita->getBerita($idberita);
            $result=$this->m_berita->getBerita($idberita);
            $data['judul']=$result['judul'];
            $data['isi']=$result['isi'];
            $this->load->view("dashboard_wartawan",$data);
        }elseif($stat==2){
            $idberita=$this->uri->segment(3);
            $data['result']=$this->m_berita->getBerita($idberita);
            $result=$this->m_berita->getBerita($idberita);
            $data['judul']=$result['judul'];
            $data['isi']=$result['isi'];
            $this->load->view("dashboard_redaktur",$data);
        }elseif($stat==3){
            $idberita=$this->uri->segment(3);
            $data['result']=$this->m_berita->getBerita($idberita);
            $result=$this->m_berita->getBerita($idberita);
            $data['judul']=$result['judul'];
            $data['isi']=$result['isi'];
            $this->load->view("dashboard_cw",$data);
        }elseif($stat==5){
            $idberita=$this->uri->segment(3);
            $data['result']=$this->m_berita->getBerita($idberita);
            $result=$this->m_berita->getBerita($idberita);
            $data['judul']=$result['judul'];
            $data['isi']=$result['isi'];
            $this->load->view("dashboard_layouter",$data);
        }else{ //user
            $this->load->view('index',$data);
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
            'user'  => $ambil_akun,
            );
        $stat = $this->session->userdata('lvl');
        if($stat==4){//admin

            $data['page']="list_berita";
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_tgl_pending($time);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_tgl_approved($time);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_tgl_rejected($time);
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_tgl_rejected($time);
    
            $this->load->view("dashboard_admin",$data);
        }elseif($stat==1){
            $data['page']="list_berita_wartawan";
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_tgl_pending($time);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_tgl_approved($time);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_tgl_rejected($time);
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_tgl_rejected($time);
    
            $this->load->view("dashboard_wartawan",$data);
        }elseif ($stat==2) {
            $data['page']="list_berita_redaktur";
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_tgl_pending($time);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_tgl_approved($time);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_tgl_rejected($time);
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_tgl_rejected($time);
    
            $this->load->view("dashboard_redaktur",$data);
        }elseif ($stat==3) {
            $data['page']="list_berita_cw";
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_tgl_pending($time);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_tgl_approved($time);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_tgl_rejected($time);
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_tgl_rejected($time);
    
            $this->load->view("dashboard_cw",$data);
        }elseif ($stat==5) {
            $data['page']="list_berita_layouter";
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_tgl_pending($time);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_tgl_approved($time);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_tgl_rejected($time);
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_tgl_rejected($time);
    
            $this->load->view("dashboard_layouter",$data);
        }
    }

    public function tampil_dari_search(){
        $a = $this->input->post("cari");
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
        $stat = $this->session->userdata('lvl');
        if($stat==4){//admin

            $data['page']="list_berita";
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_search_saved($a);
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_search_pending($a);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_search_approved($a);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_search_rejected($a);
    
            $this->load->view("dashboard_admin",$data);
        }elseif ($stat==1) {
            $data['page']="list_berita_wartawan";
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_search_saved($a);
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_search_pending($a);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_search_approved($a);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_search_rejected($a);
    
            $this->load->view("dashboard_wartawan",$data);
        }elseif ($stat==2) {
            $data['page']="list_berita_redaktur";
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_search_saved($a);
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_search_pending($a);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_search_approved($a);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_search_rejected($a);
    
            $this->load->view("dashboard_redaktur",$data);
        }elseif ($stat==3) {
            $data['page']="list_berita_cw";
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_search_saved($a);
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_search_pending($a);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_search_approved($a);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_search_rejected($a);
    
            $this->load->view("dashboard_cw",$data);
        }elseif ($stat==5) {
            $data['page']="list_berita_layouter";
            $data['berita_list_saved'] = $this->m_berita->tampil_dari_search_saved($a);
            $data['berita_list_pending'] = $this->m_berita->tampil_dari_search_pending($a);
            $data['berita_list_approved'] = $this->m_berita->tampil_dari_search_approved($a);
            $data['berita_list_rejected'] = $this->m_berita->tampil_dari_search_rejected($a);
    
            $this->load->view("dashboard_layouter",$data);
        }
    }

    public function add_berita(){

        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
        $stat = $this->session->userdata('lvl');
        $uname=$this->session->userdata('uname');
       //$user_iduser= $this->m_user->get_id_user($uname);

        if($stat==1){//redaktur-wartawan
            $data['page']="add_berita";

            //$result=$this->m_user->get_id_user($uname);
             $data['user_iduser']=$this->session->userdata('iduser');
            //$data['user_iduser']=$this->m_user->get_id_user($uname);
             
            $this->load->view('dashboard_wartawan',$data);

        }elseif($stat==2){
             $data['page']="add_berita";

            //$result=$this->m_user->get_id_user($uname);
             $data['user_iduser']=$this->session->userdata('iduser');
            //$data['user_iduser']=$this->m_user->get_id_user($uname);
             
            $this->load->view('dashboard_redaktur',$data);

        }elseif($stat==3){ //admin writer
            $data['page']="denied_add_berita";
            $this->load->view('dashboard_cw',$data);
        }elseif($stat==4){ //admin writer
            $data['page']="denied_add_berita";
            $this->load->view('dashboard_admin',$data);
        }elseif($stat==5){ //admin writer
            $data['page']="denied_add_berita";
            $this->load->view('dashboard_layouter',$data);
        }   
    }

    function add_data_berita(){
         $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
            
            $udata['judul'] = $this->input->post('judul');
            $udata['isi'] = $this->input->post('isi');
            $udata['user_iduser']=$this->input->post('user_iduser');

            $udata['status_berita']=$this->input->post('0');
            $udata['status_read']=$this->input->post('0');
            $udata['kategori']=$this->session->userdata('kategori');

            $idberita=$this->m_berita->insert_berita($udata);
            $data1['idberita'] =$idberita;
            $data1['judul'] = $this->input->post('judul');
            $data1['isi'] = $this->input->post('isi');
            $data1['userid']=$this->input->post('user_iduser');
            $data1['status_berita']=$this->input->post('0');
                 //mendapatkan data berita untuk Nama
            $data['result']=$this->m_berita->getBerita($idberita);
            $result=$this->m_berita->getBerita($idberita);
            $data1['Nama']=$this->session->userdata('uname');
            // $data1['Nama']=$result['Nama'];
            
            if ($this->m_history->insert_berita_to_history($data1)) {
                redirect('user/list_berita');
               }
    }

        public function lihat_notifikasi(){
            $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
            $data = array(
                'user'  => $ambil_akun,
                );
            $stat = $this->session->userdata('lvl');
            
                $data['page']="notifikasi";
               // $data['user_list'] = $this->m_user->get_all_user();
                $this->load->view("dashboard_user",$data);
        }

        public function delete_berita($idberita){
            $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
            $data = array(
                'user'  => $ambil_akun,
                );
            $stat = $this->session->userdata('lvl');
            if($stat==1){//wartawan

                $data['page']="list_berita_wartawan";
                $this->m_berita->delete_berita($idberita);
                //$this->list_user();
                //$this->load->view("dashboard_admin",$data);
                redirect('user/list_berita');
            }elseif ($stat==2) {
                $data['page']="list_berita_redaktur";
                $this->m_berita->delete_berita($idberita);
                //$this->list_user();
                //$this->load->view("dashboard_admin",$data);
                redirect('user/list_berita');
            }elseif($stat==3){
                $data['page']="list_berita_cw";
                $this->m_berita->delete_berita($idberita);
                //$this->list_user();
                //$this->load->view("dashboard_admin",$data);
                redirect('user/list_berita');
            }elseif($stat==5){
                $data['page']="list_berita_layouter";
                $this->m_berita->delete_berita($idberita);
                //$this->list_user();
                //$this->load->view("dashboard_admin",$data);
                redirect('user/list_berita');
            }else{ //user
                $this->load->view('index',$data);
            }   
        }

        function download_berita(){
            $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
            $data = array(
                 'user'  => $ambil_akun,
                 );

            $stat = $this->session->userdata('lvl');
            $idberita=$this->uri->segment(3);

            // //mendapatkan data berita
            $data['result']=$this->m_berita->getBerita($idberita);
            $result=$this->m_berita->getBerita($idberita);
            $data['idberita']=$result['idberita'];
            $data['judul']=$result['judul'];
            $data['isi']=$result['isi'];
            $udata['isi'] = $this->input->post('isi');
            $data['username']=$result['username'];
            $data['user_iduser']=$this->session->userdata('iduser');

            require_once APPPATH."/third_party/getrtf.php";
        $data['judul']=$result['judul'];
        $filename = $data['judul'];
        header("Content-Type: text/enriched\n");
        header("Content-Disposition: attachment; filename=".$filename.'.rtf');
        //$data['page']="download_preview";
           // $data['user_list'] = $this->m_user->get_all_user();
            $this->load->view("download_view",$data);
        }

        public function download($idberita){
            # load download helper
            $this->load->helper('download');
            # search for filename by id
            $this->db->select('filename');
            $this->db->where('idberita', $idberita);
            $q = $this->db->get('v_berita');
            # if exists continue
            
            if($q->num_rows() > 0)
            {
                $u_key  = $q->row();
                $file = FCPATH . 'files/'. $u_key->filename;
                if(file_exists($file))
                    force_download($file, NULL);
            }
            else
                show_404();
        }
        

        public function lihat_berita(){
            $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
            $data = array(
                'user'  => $ambil_akun,
                );
            $stat = $this->session->userdata('lvl');
            $idberita=$this->uri->segment(3);

            //mendapatkan data berita
            $data['result']=$this->m_berita->getBerita($idberita);
            $result=$this->m_berita->getBerita($idberita);
            $data['idberita']=$result['idberita'];
            $data['judul']=$result['judul'];
            $data['isi']=$result['isi'];
            $data['username']=$result['username'];
            $data['user_iduser']=$this->session->userdata('iduser');

        //mendapatkan data history
            $data['result2']=$this->m_history->getHistoryBerita($idberita);
            $result2=$this->m_history->getHistoryBerita($idberita);
            // $data['idhistory_edit']=$result2['idhistory_edit'];
            // $data['judul']=$result2['judul'];
            // $data['Nama']=$result2['Nama'];
            // $data['time_edit']=$result2['time_edit'];

             //$data['list_history'] = $this->m_history->getHistoryBerita($idberita);
            
            $data['page']="lihat_berita";
               // $data['user_list'] = $this->m_user->get_all_user();
            if($stat==1){
                  $this->load->view("dashboard_wartawan",$data);
            }elseif($stat==2){
                 $this->load->view("dashboard_redaktur",$data);
            }elseif($stat==3){
                 $this->load->view("dashboard_cw",$data);
            }elseif($stat==4){
                 $this->load->view("dashboard_admin",$data);
            }else{
                 $this->load->view("dashboard_layouter",$data);
            }
        }

        function data_edit_berita(){
            $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
            $data = array(
                'user'  => $ambil_akun,
                );
            $stat = $this->session->userdata('lvl');
            $iduserberita= $this->input->post('user_iduser');
            $idusersession=$this->session->userdata('iduser');
            
            if($stat==1 || $stat==2){
                $udata['judul'] = $this->input->post('judul');
                $udata['isi'] = $this->input->post('isi');
                $udata['user_iduser']=$this->input->post('user_iduser');
                $udata['status_berita']=3;
                $this->m_berita->update_berita($udata,$_POST['idberita']);

                $idberita=$this->input->post('idberita');
                $hdata['idberita'] = $this->input->post('idberita');
                $hdata['judul'] = $this->input->post('judul');
                $hdata['isi'] = $this->input->post('isi');
                $hdata['userid']=$this->input->post('user_iduser');
                $hdata['status_berita']=3;
                 //mendapatkan data berita untuk Nama
                $data['result']=$this->m_berita->getBerita($idberita);
                $result=$this->m_berita->getBerita($idberita);
               
                     $hdata['Nama']=$result['Nama'];
          
               if($this->m_history->insert_berita_to_history($hdata)){
                    //$this->m_berita->update_status_send_wartawan($idberita);
                         redirect('user/list_berita');
               }
        }elseif($stat==3){
            $udata['judul'] = $this->input->post('judul');
                $udata['isi'] = $this->input->post('isi');
                $udata['user_iduser']=$this->input->post('user_iduser');
                $udata['status_berita']=1;
                $this->m_berita->update_berita($udata,$_POST['idberita']);
                $idberita=$this->input->post('idberita');
                $hdata['idberita'] = $this->input->post('idberita');
                $hdata['judul'] = $this->input->post('judul');
                $hdata['isi'] = $this->input->post('isi');
                $hdata['userid']=$this->input->post('user_iduser');
                $hdata['status_berita']=1;
                 //mendapatkan data berita untuk Nama
                $data['result']=$this->m_berita->getBerita($idberita);
                $result=$this->m_berita->getBerita($idberita);
               
                     $hdata['Nama']=$result['Nama'];
          
               if($this->m_history->insert_berita_to_history($hdata)){
                    //$this->m_berita->update_status_send_wartawan($idberita);
                         redirect('user/list_berita');
               }

        }else{
            $udata['judul'] = $this->input->post('judul');
                $udata['isi'] = $this->input->post('isi');
                $udata['user_iduser']=$this->input->post('user_iduser');
                $udata['status_berita']=$this->input->post('status_berita');
                $this->m_berita->update_berita($udata,$_POST['idberita']);
                $idberita=$this->input->post('idberita');
                $hdata['idberita'] = $this->input->post('idberita');
                $hdata['judul'] = $this->input->post('judul');
                $hdata['isi'] = $this->input->post('isi');
                $hdata['userid']=$this->input->post('user_iduser');
                $hdata['status_berita']=$this->input->post('status_berita');
                 //mendapatkan data berita untuk Nama
                $data['result']=$this->m_berita->getBerita($idberita);
                $result=$this->m_berita->getBerita($idberita);
               
                     $hdata['Nama']=$result['Nama'];
          
               if($this->m_history->insert_berita_to_history($hdata)){
                    //$this->m_berita->update_status_send_wartawan($idberita);
                         redirect('user/list_berita');
               }
        }

                
                    
        }



    

     //------------------ Status Berita---------------------------------------------//
public function update_status_save(){
    
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->update_status_save($idberita)){
                redirect('user/list_berita');
            }
    }
    public function update_status_final(){
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->update_status_final($idberita)){
                redirect('user/list_berita');
            }
    }
    public function update_status_send(){
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->update_status_send($idberita)){
                redirect('user/list_berita');
            }
    }
    public function update_status_send_cw(){
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->update_status_send_cw($idberita)){
                redirect('user/list_berita');
            }
    }
    public function update_status_send_wartawan(){
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->update_status_send_wartawan($idberita)){
                redirect('user/list_berita');
            }
    }
    public function update_status_approve(){
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->update_status_approve($idberita)){
                redirect('user/list_berita');
            }
    }

    public function update_status_reject(){
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->update_status_reject($idberita)){
                redirect('user/list_berita');
            }
    }

    public function approve_from_reject(){
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->approve_from_reject($idberita)){
                redirect('user/list_berita');
            }
    }

 public function update_status_send_to_rd(){
         $idberita=$this->uri->segment(3);
         if ($this->m_berita->update_status_send_to_rd($idberita)){
                redirect('user/list_berita');
            }
    }
    


}