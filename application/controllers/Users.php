<?php 
    class Users extends CI_Controller{
        public function register(){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('username', 'UserName', 'required');
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
    }