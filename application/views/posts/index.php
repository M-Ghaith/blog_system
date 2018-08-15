<dir>
<!-- <?=var_dump($posts);?> -->
    <?php foreach($posts as $post) : ?>
        <h3 style="color: #0075ea"><?= $post['title']; ?></h3>
        <small>Posted on: <?= $post['created_at'];?> in <strong><?=$post['name']?></strong> &nbsp; <?=$post['edited'];?></small>
        <p><?=word_limiter($post['body'],40);?></p>
        <a href="<?php echo site_url('/posts/'.$post['slug']);?>">Read more</a>
        <br><hr><br>
    <?php endforeach?>
</dir>