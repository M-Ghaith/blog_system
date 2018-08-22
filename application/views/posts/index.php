<dir>

    <?php if(!empty($posts)){?>
    <?php foreach($posts as $post) : ?>
    <?php if($post['post_image'] == 'noimage.png'){?>
        <div class="row">
            <div class="col-sm-12">
                <h3 style="color: #1eaabc"><?= $post['title']; ?></h3>
                <small>Posted on: <?= $post['created_at'];?> in <a href="<?php echo site_url('/categories/posts/'.$post['id'])?>"><strong><?=$post['name']?></strong></a> &nbsp; <?=$post['edited'];?></small>
                <p><?=word_limiter($post['body'],40);?></p>
                <a href="<?php echo site_url('/posts/'.$post['slug']);?>">Read more</a>
            </div>
        </div>
        <hr>
     <?php }else{?>
        <h3 style="color: #1eaabc"><?= $post['title']; ?></h3>
        <div class="row">
            <div class="col-sm-2">
                <img src="<?= site_url();?>assets/images/posts/<?=$post['post_image'];?>"  height="120" width="120">    
            </div>
            <div class="col-sm-10">
                <small>Posted on: <?= $post['created_at'];?> in <a href="<?php echo site_url('/categories/posts/'.$post['id'])?>"><strong><?=$post['name']?></strong></a> &nbsp; <?=$post['edited'];?></small>
                <p><?=word_limiter($post['body'],40);?></p>
                <a href="<?php echo site_url('/posts/'.$post['slug']);?>">Read more</a>
            </div>
        </div>
        <hr>
     <?php }?>
    <?php endforeach?>
     <?php } else{?>
        <dir>
            <div class="row">
                <div class="col-md-12">
                    <h3>It seems there is no posts has been added in <strong><?=$title?></strong> category yet! </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="https://media.giphy.com/media/d48ub7FBCesSKzHq/source.gif" alt="">
                </div>
            </div>

        </dir>
     <?php }?>
     <div class="pagination-links">
        <?php echo $this->pagination->create_links();?>
     </div>
</dir>
