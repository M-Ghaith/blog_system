
<?php if($post['post_image'] == 'noimage.png'){?>
    <dir>
        <h2 class=".text-primary" style="color: #0075ea"><?=$post['title'];?></h2>
        <small>Posted on: <?= $post['created_at'];?> in <strong><?=$post['name']?></strong> &nbsp; <?=$post['edited'];?></small>
        <hr> 
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
<?php }else{?>
    <dir>
        <h2 class=".text-primary" style="color: #0075ea"><?=$post['title'];?></h2>
        <small>Posted on: <?= $post['created_at'];?> in <strong><?=$post['name']?></strong> &nbsp; <?=$post['edited'];?></small>
        <hr>
        <div class="row" style="height: 60%; width:60%; margin:0 auto;">
            <img src="<?= site_url();?>assets/images/posts/<?=$post['post_image'];?>" style="margin:0 auto">
        </div> 
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
            <input type="hidden" name="post_image_delete" value=" <?=$post['post_image']?>">
            <input type="submit" value="Delete" class="p-2 btn btn-outline-danger" >
        </form> 
    </div>
</dir>
<?php }?>
