
    <dir>
        <h2 class=".text-primary" style="color: #1eaabc"><?=$post['title'];?></h2>
        <small>Posted on: <?= $post['created_at'];?> in <strong><?=$post['name']?></strong> &nbsp; <?=$post['edited'];?></small>
        <hr>
        <?php if(!($post['post_image'] == 'noimage.png')):?>
            <div class="row" style="height: 60%; width:60%; margin:0 auto;">
                <img src="<?= site_url();?>assets/images/posts/<?=$post['post_image'];?>" style="margin:0 auto">
            </div> 
        <?php endif;?>
        <div>
            <p><?=$post['body'];?></p>
        </div>
        <hr>
        <div class="d-flex flex-row">
            <a class=" p-2 btn btn-outline-info" href="<?= base_url();?>posts">
                Back to posts
            </a>
            <?php if($this->session->userdata('user_id') == $post['user_id']):?>
                <a class=" p-2 btn btn-outline-dark" href="edit/<?=$post['slug'];?>">
                    Edit post
                </a>
                <?php echo form_open('posts/delete/'.$post['ID'])?>
                    <input type="submit" value="Delete post" class="p-2 btn btn-outline-danger" >
                </form> 
            <?php endif;?>
        </div>
        <?php if($comments) :?>
            <hr>
         <dir>
            <?php foreach($comments as $comment) :?>
                <small>Commented by <strong><?=$comment['name']?> </strong> at <strong><?=$comment['created_at']?></strong></small> 
                <p><?=$comment['body']?></p>
                <hr>
            <?php endforeach;?>
        <?php else :?>
            <?=""?>
        <?php endif;?>
         </dir>
         <?php if($this->session->userdata('logged_in')):?>
            <?=validation_errors();?>
            <?=form_open('comments/create/'.$post['ID']);?>
                <div class="form-group" >
                    <input type="text" name="name" class="" placeholder="Your name">
                </div>
                <div class="form-group" >
                    <input type="text" name="email" class="" placeholder="Your email">
                </div>
                <div class="form-group" >
                    <textarea type="text" name="body" placeholder="Comment" class="form-control" ></textarea>
                </div>
                <input type="hidden" name="slug" value="<?=$post['slug']?>">
                <button class="btn btn-primary" type="submit">Add comment</button>
            </from>
        <?php endif;?>
    </dir>