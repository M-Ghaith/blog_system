<?php 
    class Users extends CI_Controller{

        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }

        public function register(){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('username', 'UserName', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'ConfirmPassword', 'matches[password]');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('users/register');
                $this->load->view('templates/footer');
            } else {
               $enc_password = md5($this->input->post('password'));
               $this->user_model->register($enc_password);

               $this->session->set_flashdata('user_registered' , 'Successfuly submitted! Please login to confirm you registeration.');
               redirect('posts');
            }
            
        }
       //check_username_exists
        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return FALSE;
            }
        }
         //check_email_exists
        public  function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'You are already regitered! Please login');
            if($this->user_model->check_email_exists($email)){
                return true;
            }else{
                return FALSE;
            }
        }
        public function login(){
            $this->form_validation->set_rules('username', 'UserName', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('users/login');
                $this->load->view('templates/footer');
            } else {

                $username = $this->security->xss_clean($this->input->post('username'));               
                $password = $this->security->xss_clean(md5($this->input->post('password')));
              
                $user_id = $this->user_model->login($username, $password);

                if($user_id){
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    );
                    $this->load->library('session');
                    $this->session->set_userdata($user_data);

                    $this->session->set_flashdata('user_loggedin' , 'Welcome back champ ;)');
                    redirect('posts');

                }else{
                    $this->session->set_flashdata('login_failed' , 'Failed to login, your username or password is not correct.');
                    redirect('users/login');
                }  
            }
        }

        public function logout()
        {
            $user_data = array (
                'username',
                'user_id',
                'logged_in'
            );
            $this->session->unset_userdata($user_data);
            $this->session->set_flashdata('user_loggedout' , 'Bye, see you soon!');
            redirect('home');
        }
    }