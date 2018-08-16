<dir>
    <h2><?=$title?></h2><hr>
    <?=validation_errors();?>
    <?=form_open('categories/create')?>
        <div class="form-group">
            <label>What you ganna call your new category?</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Add it</button>
    </form>
    <a href="<?= base_url();?>posts/create">Create post</a>
</dir>