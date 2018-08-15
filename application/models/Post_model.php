<?php
    class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function get_posts($slug = FALSE){
            if($slug === FALSE){
                $this->db->order_by('ID', 'DESC');
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            $query = $this->db->get_where('posts', array('slug'=> $slug));
            return $query->row_array();
        }
        public function create_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'created_at' => date('Y/m/d h:i:sa')
            );
            return $this->db->insert('posts', $data);
        }
        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }
        public function update_post(){
            $id = $this->input->post('id');
            $slug = url_title($this->input->post('title'));
            $edited = 'Edited';

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'created_at' => date('Y/m/d h:i:sa'),
                'edited' => $edited
            );
            $this->db->where('id', $id);
            return $this->db->update('posts', $data);
        }
    }