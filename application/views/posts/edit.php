<dir>
    <h2><?=$title?></h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('posts/update');?>
    <input type="hidden" name="id" value="<?php echo $post['ID'];?>">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" value="<?php echo $post['title'] ?>" class="form-control" name="title" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleTextarea">Post</label>
        <textarea  name="body" class="form-control" id="exampleTextarea" rows="3"><?php echo $post['body'] ?></textarea>
    </div>

    <div class="form-group">
    <label>Which category your post belong to! </label>
      <select name="category_id" class="form_control">
        <?php foreach($categories as $category): ?>
        <option value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php endforeach?>
      </select>
    </div>
     <!-- upload image -->
     <div class="form-group" >
      <input type="file" name="userfile" size="20" value="<?= site_url();?>assets/images/posts/<?=$post['post_image'];?>" />
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    <script>CKEDITOR.replace( 'body' );</script>
</dir>