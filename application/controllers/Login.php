<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{	
        $session = $this->session->userdata('isLogin');

        if($session == FALSE) {
            $this->load->view('view_login');
        } else {
            redirect('admin/dashboard');
        }
	}
        
       
	public function signup()
	{	
        $session = $this->session->userdata('isLogin');

        if($session == FALSE) {
            $this->load->view('view_register');
        } else {
            redirect('admin/dashboard');
        }
	}

    public function register(){
        if($_POST){
        $firstname = $this->input->post("firstname");
        $lastname = $this->input->post("lastname");
        $phone_number = $this->input->post("phone_number");
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $postData = array(
            "su"    =>  1,
            "type"  =>  "employee",
            "position" =>   "Car Dealer",
            "email" =>  $email,
            "password"  =>  md5($password),
            "first_name"    =>  $firstname,
            "last_name" =>  $lastname,
            "mobile"  =>  $phone_number,
            "gender"  =>    "",
            "birthday"  => "",
            "address"   => ""
        );

$this->db->insert("users", $postData);
        redirect("login?msg=1");
    }else{
        redirect("signup?msg=2");
    }
    }

    //just to check if empty, if not then verify function call and verified hoile returns to this function
    public function checklogin() {   // fields name, Boxes name to show, the checks functions
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_verifylogin');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('view_login');
        } 
        else {
            redirect('admin/dashboard');
        }
    }
        
        
    public function verifylogin() {
        $email= $this->input->post('email');
        $password= md5($this->input->post('password'));
        
        //Load the Login model for database check
        $this->load->model('model_login');
        $result= $this->model_login->login($email,$password);
        
        if($result){
            foreach ($result as $user){
                $s = array();
                $s['id'] = $user->id;
                $s['first_name'] = $user->first_name;
                $s['last_name'] = $user->last_name;
                $s['email'] = $user->email;
                $s['position'] = $user->position;
                $s['type'] = $user->type;
                $s['isLogin'] = 'true';

                $this->session->set_userdata($s);
            }

            return true;
        
        } else {
            $this->form_validation->set_message('verifylogin', 'Incorrect Login credentials');
            return false;
        }
    }
}