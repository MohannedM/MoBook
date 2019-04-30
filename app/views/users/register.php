<?php require_once APPROOT . '/views/includes/header.php'; ?>
<div class="form-shadow mt-4">
    <form class="form-signin" action="<?php echo URLROOT . '/users/register'; ?>" method="post">
        <h1 class="h3 mb-3 mt-3 font-weight-normal">Please Sign Up</h1>
        <div class="form-group">
            <label for="fullname">Fullname: <sup>*</sup></label>
            <input type="text" name="fullname" value="<?php echo $data['fullname'];?>" class="form-control <?php echo !empty($data['fullname_err']) ? 'is-invalid' : '';?>" placeholder="Fullname">
            <span class="invalid-feedback"><?php echo $data['fullname_err'];?></span>
        </div>
        <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" value="<?php echo $data['email'];?>" class="form-control <?php echo !empty($data['email_err']) ? 'is-invalid' : '';?>" placeholder="Email address">
            <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
        </div>
        <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" value="<?php echo $data['password'];?>" class="form-control <?php echo !empty($data['password_err']) ? 'is-invalid' : '';?>" placeholder="Password">
            <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
        </div>
        <div class="form-group mb-3">
            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
            <input type="password" name="confirm_password" value="<?php echo $data['confirm_password'];?>" class="form-control  <?php echo !empty($data['confirm_password_err']) ? 'is-invalid' : '';?>" placeholder="Confirm Password">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
        </div>
        <input type="submit" value="Signup" class="btn btn-lg btn-primary btn-block">
        <a href="<?php echo URLROOT . '/users/login';?>" class="btn btn-lg btn-light btn-block">Already a member? Login</a>
    </form>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
