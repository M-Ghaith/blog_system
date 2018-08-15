<dir>
    <h2><?=$title?></h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('posts/update');?>
    <input type="hidden" name="id" value="<?php echo $post['ID'];?>">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" value="<?php echo $post['title'] ?>" class="form-control" name="title" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleTextarea">Post</label>
        <textarea  name="body" class="form-control" id="exampleTextarea" rows="3"><?php echo $post['body'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    <script>CKEDITOR.replace( 'body' );</script>
</dir>