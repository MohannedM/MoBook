<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('user_registered');?>
<div class="form-shadow mt-4">
    <form class="form-signin" action="<?php echo URLROOT . '/users/login'; ?>" method="post">
        <h1 class="h3 mb-3 mt-3 font-weight-normal">Please Login</h1>
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
        <input type="submit" value="Login" class="btn btn-lg btn-primary btn-block">
        <a href="<?php echo URLROOT . '/users/register';?>" class="btn btn-lg btn-light btn-block">New to MoBook? Signup</a>
    </form>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
