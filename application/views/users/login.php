<dir>
    <h3>Login</h3>
    <?php echo validation_errors();?>
    <?php echo form_open('users/login')?>
        <dir>
            <div class="form-group"> 
                <div class="col-md-5">
                <input name="username" type="text" placeholder="Your username" class="form-control" required="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <input name="password" type="password" placeholder="Your password" class="form-control" required="">
                </div>
            </div>
            <div class="form-group">
            <div class="col-md-3">
                <button type="submit"  class="btn btn-primary" required="">Go</button>
            </div>
        </div>
        </dir>
    </form>
</dir>