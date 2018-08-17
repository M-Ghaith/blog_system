<dir>
  <h2>Craete new post</h2>
  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart('posts/create');?>
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text"  required="" value="<?php echo set_value('title'); ?>" class="form-control" name="title" id="exampleInputEmail1">
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Post</label>
      <textarea name="body"  required="" value="<?php echo set_value('body'); ?>" class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
    <!-- Select an category -->
    <div class="form-group">
    <label>Which category your post belong to! </label>&nbsp;
      <select name="category_id" class="form_control">
        <?php foreach($categories as $category): ?>
        <option value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php endforeach?>
      </select>&nbsp;&nbsp;or create <a href="<?= base_url();?>categories/create">new one!</a>
    </div>
    <!-- upload image -->
    <div class="form-group" >
      <input type="file" name="userfile" size="20" />
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
  <!-- include CKeditor for post text formating -->
  <script>CKEDITOR.replace( 'body' );</script>
</dir>