<h1>Posts</h1>
<?php foreach($posts as $post) : ?>
    <h3><?= $post['title']; ?></h3>
    <small>Posted on: <?= $post['created_at'];?></small>
    <p><?= $post['body'];?></p>
    <?php endforeach?>