<?php
    class Posts extends CI_Controller{
        public function index(){
            $data['posts'] = $this->post_model->get_posts();
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        //Get all post for single page viwe 
        public function view($slug = NULL){
            $data['post'] = $this->post_model->get_posts($slug);
            if(empty($data['post'])){
                show_404();
            }
            $data['title'] = $data['post']['title'];
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        // Create Post and upload image method
        public function create(){
            $data['title'] = "This creata Methods";
            $data['categories'] = $this->post_model->get_categories();

            //Validate the form of creating new post
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Post', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            }else{
               $config['upload_path']   = './assets/images/posts';
               $config['allowed_types'] = 'gif|jpg|png';
               $config['max_size']      = 2048;
               $config['max_width']     = 1024;
               $config['max_height']    = 768;

               $this->load->library('upload', $config);

               if(!$this->upload->do_upload('userfile')){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.png';
               }else{
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
               }
               $this->post_model->create_post($post_image);
                redirect('posts');
            }
        }

        //Delete post method
        public function delete($id){
            $this->post_model->delete_post($id);
            redirect('posts');
        }

        //Edit post method using Slug as identifier
        public function edit($slug){
            $data['post'] = $this->post_model->get_posts($slug);
            if(empty($data['post'])){
                show_404();
            }
            $data['categories'] = $this->post_model->get_categories();
            $data['title'] = "Edit post";
            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        //After editing this method will update the post 
        public function update(){
            $config['upload_path']   = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 2048;
            $config['max_width']     = 1024;
            $config['max_height']    = 768;

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('userfile')){
                 $errors = array('error' => $this->upload->display_errors());
                 $post_image = 'noimage.png';
            }else{
                 $data = array('upload_data' => $this->upload->data());
                 $post_image = $_FILES['userfile']['name'];
            }
            $this->post_model->update_post($post_image);
            redirect('posts');
        }
    }

?>