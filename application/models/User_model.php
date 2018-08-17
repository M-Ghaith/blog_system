<?php 
    class User_model extends CI_Model{
        public function register($enc_password)
        {
            $data = array (
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $enc_password,
                'registerd_at' => date('Y/m/d h:i:sa')
            );
            return $this->db->insert('users', $data);

        }
    }