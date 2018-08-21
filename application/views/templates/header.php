<html>
    <head>
        <title>Blog system</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
        <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
    </head>
    <nav class="navbar navbar-inverse" style="background-color: #90e0ed">
            <div class="container" >
                <div class="navbar-header">
                    <h1><a class="navbar-brand" href="<?= base_url();?>posts">Galaxy blog</a></h1>
                </div>
                <div class="nav" >

                    <?php if(!$this->session->userdata('logged_in')){?>
                        <li><a href="<?= base_url();?>about">About</a></li>&nbsp; &nbsp;
                        <li><a href="<?= base_url();?>posts">Blog</a></li>&nbsp; &nbsp;	
                        <li><a href="<?= base_url();?>users/login">Login</a></li>&nbsp;&nbsp;
                        <li><a href="<?= base_url();?>users/register">Register</a></li>

                    <?php }else{?>
                        <li><a href="<?= base_url();?>users/logout">Logout</a></li>&nbsp;&nbsp;
                        <li><a href="<?= base_url();?>posts">Blog</a></li>&nbsp; &nbsp;
                        <li><a href="<?= base_url();?>posts/create">Create post</a></li>&nbsp;&nbsp;
                        <li><a href="<?= base_url();?>categories">Categories</a></li>&nbsp;&nbsp;
                    <?php }?>
                </div>
            </div>
        </nav>
    <body>
    <div class="container">
        <dir>
            <?php if($this->session->flashdata('user_loggedin')): ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
            <?php endif;?>
            <?php if($this->session->flashdata('login_failed')): ?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
            <?php endif;?>
            <?php if($this->session->flashdata('user_registered')): ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
            <?php endif;?>
            <?php if($this->session->flashdata('post_submitted')): ?>
                <p class="alert alert-success><?php echo $this->session->flashdata('post_submitted');?></p>
            <?php endif;?>
            <?php if($this->session->flashdata('post_updated')): ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
            <?php endif;?>
            <?php if($this->session->flashdata('category_submitted')): ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_submitted').'</p>'; ?>
            <?php endif;?>
            <?php if($this->session->flashdata('post_deleted')): ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
            <?php endif;?>
            <?php if($this->session->flashdata('control_create_post')): ?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('control_create_post').'</p>'; ?>
            <?php endif;?>
            <?php if($this->session->flashdata('user_loggedout')): ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
            <?php endif;?>
  
        </dir>