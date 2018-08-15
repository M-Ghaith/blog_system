<dir>
    <h2 class=".text-primary" style="color: #0075ea"><?=$post['title'];?></h2>
    <small>Posted on: <?= $post['created_at'];?> in <strong><?=$post['name']?></strong> &nbsp; <?=$post['edited'];?></small>
    <div>
        <p><?=$post['body'];?></p>
    </div>
    <a href="<?= base_url();?>posts"><- Back</a>
    <hr>
    <div class="d-flex flex-row">
        <a class=" p-2 btn btn-outline-dark" href="edit/<?=$post['slug'];?>">
            Edit
        </a>
        <?php echo form_open('posts/delete/'.$post['ID'])?>
            <input type="submit" value="Delete" class="p-2 btn btn-outline-danger" >
        </form> 
    </div>
</dir>