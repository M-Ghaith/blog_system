<dir>
    <h3>Regsiter with us</h3>
    <?php echo validation_errors();?>
    <?php echo form_open('users/register')?>
    <dir>
        <div class="form-group"> 
            <div class="col-md-5">
            <input name="name" type="text" placeholder="Your full name" class="form-control" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5">
                <input name="username" type="text" placeholder="What would like to call you? enter your user name please" class="form-control" required="">
            </div>
        </div>
        <div class="form-group"> 
            <div class="col-md-5">
                <input name="email" type="email" placeholder="Your email address" class="form-control" required="It's requierd">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5">
                <input name="password" type="password" placeholder="Password" class="form-control" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5">
                <input name="cpassword" type="password" placeholder="Confirm your password" class="form-control" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                <button type="submit"  class="btn btn-primary" required="">Yala</button>
            </div>
        </div>
        </dir>
    </form>
</dir>