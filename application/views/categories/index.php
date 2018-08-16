<dir>
    <h2>Categories</h2>
    <ul class="list-gorup">
        <?php foreach($categories as $categroy):?>
            <li class="list-group-item"> 
                <a href="<?php echo site_url('/categories/posts/'.$categroy['id'])?>">
                <?=$categroy['name'];?></a>
            </li>
        <?php endforeach;?>
    </ul>
    <hr>
    <a href="<?= base_url();?>categories/create">Create new category?</a>
</dir>