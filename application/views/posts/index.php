<dir>
    <?php foreach($posts as $post) : ?>
        <h3 style="color: #0075ea"><?= $post['title']; ?></h3>
        <small>Posted on: <?= $post['created_at'];?> &nbsp; <?=$post['edited'];?></small>
        <p><?= $post['body'];?></p>
        <a href="<?php echo site_url('/posts/'.$post['slug']);?>">Read more</a>
        <br><hr><br>
    <?php endforeach?>
</dir>