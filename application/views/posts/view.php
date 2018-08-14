<h2><?=$post['title'];?></h2>
<small>Posted on: <?= $post['created_at'];?></small>
<div>
    <p><?=$post['body'];?></p>
</div>
<a href="<?= base_url();?>posts"><- Back</a>
