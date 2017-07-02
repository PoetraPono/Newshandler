<?php
	class Gfp extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		}

		public function index()
	    {
	      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
	      if ($this->form_validation->run() == FALSE)
	      {
	      	$this->load->view('lupa_passwd');
	      }
	      else
	      {
	         //please see Codeigniter : Get your forgotten Password . Part-2
	      	$email = $this->input->post('email');
	      	$this->load->helper('string');
	      	$rs = random_string('alnum', 12);
	      	$data = array('rs'=>$rs);
	      	$this->db->where('email', $email);
	      	$this->db->update('user', $data);

	      	//send email
	      	$confi['protocol']='smtp';
	      	$config['smtp_host']='ssl://smtp.googlemail.com';
	      	$config['smtp_port']=465;
	      	$config['smtp_user'] = 'khoirina.safitri@gmail.com';
            $config['smtp_pass'] = '********';

            $this->load->library('email', $config);
            $this->email->from('khoirina.safitri@gmail.com', 'fifi');
            $this->email->to($email);

            $this->email->subject('Get your forgotten Password');
            $this->email->message('Please go to this link to get your password. http://localhost/KP/get_password/index/'.$rs );

            $this->email->send();
            //echo "Please check your email address.";
            $this->load->view('gp_form');
        	}
        }

		public function email_check($str){
			$query = $this->db->get_where('user', array('email'=>$str),1);
			if($query->num_rows()==1){
				return true;
			}
			else{
				$this->form_validation->set_message('lupa_passwd', 'This email does not exist');
				return false;
			}
		}
	}
?>