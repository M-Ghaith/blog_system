<?php 
    class Users extends CI_Controller{

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
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return FALSE;
            }
        }
         //check_email_exists
         function check_email_exists($email){
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
               $this->session->set_flashdata('user_loggedin' , 'logged in...');
               redirect('posts');
            }
            
        }
    }