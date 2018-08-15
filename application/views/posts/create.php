<dir>
  <h2>Craete new post</h2>
  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart('posts/create');?>
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" value="<?php echo set_value('title'); ?>" class="form-control" name="title" id="exampleInputEmail1">
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Post</label>
      <textarea name="body" value="<?php echo set_value('body'); ?>" class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
    <!-- Select an category -->
    <div class="form-group">
    <label>Which category your post belong to! </label>
      <select name="category_id" class="form_control">
        <?php foreach($categories as $category): ?>
        <option value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php endforeach?>
      </select>
    </div>
    <div class="form-group" >
      <input type="file" name="userfile" size="20" />
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
  <script>CKEDITOR.replace( 'body' );</script>
</dir>