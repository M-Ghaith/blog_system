<?php
    class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_posts($slug = FALSE){
            if($slug === FALSE){
                $this->db->order_by('posts.created_at', 'DESC');
                $this->db->join('categories', 'categories.id = posts.categorie_id');
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            $this->db->join('categories', 'categories.id = posts.categorie_id');
            $query = $this->db->get_where('posts', array('slug'=> $slug));
            return $query->row_array();
        }

        public function create_post($post_image){
            $slug = url_title($this->input->post('title')); 
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'created_at' => date('Y/m/d h:i:sa'),
                'categorie_id' => $this->input->post('category_id'),
                'post_image' => $post_image
            );
            return $this->db->insert('posts', $data);
        }

        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            $path = './assets/images/posts/'.$this->input->post('post_image_delete');
            $this->load->helper('file');
            delete_files($path);          
            return true;
        }

        public function update_post($post_image){
            $id = $this->input->post('id');
            $slug = url_title($this->input->post('title'));
            $edited = '(Edited)';

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'created_at' => date('Y/m/d h:i:sa'),
                'edited' => $edited,
                'categorie_id' => $this->input->post('category_id'),
                'post_image' => $post_image
            );
            $this->db->where('id', $id);
            return $this->db->update('posts', $data);
        }
        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }
        
    }