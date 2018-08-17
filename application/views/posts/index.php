<dir>
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
</dir>
