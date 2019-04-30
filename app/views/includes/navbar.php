
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="<?php echo URLROOT . '/pages/index';?>" class="navbar nav-link navbar-brand">MoBook</a></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="<?php echo URLROOT . '/pages/about';?>">About</a>
    <a href="#" class="p-2 text-dark ml-auto"><?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';?></a>
    <?php if(isLoggedIn()): ?>
    </nav>
  <a class="btn btn-outline-primary" href="<?php echo URLROOT . '/users/logout';?>">Logout</a>
    <?php else: ?>
    <a class="p-2 text-dark" href="<?php echo URLROOT . '/users/login';?>">Login</a>
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo URLROOT . '/users/register';?>">Sign up</a>
    <?php endif; ?>
</div>
