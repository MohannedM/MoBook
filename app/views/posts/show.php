<?php require_once APPROOT . '/views/includes/header.php'; ?>
<a href="<?php echo URLROOT . '/posts/index';?>" class="btn btn-light mb-3"><i class="fas fa-caret-left"></i> Back</a>
<div class=" px-3 py-3 pt-md-5 pb-md-3 mx-auto text-center">

    <div class="shadow" style="padding:25px">
        <img src="<?php  echo !empty($data['post']->image) ? URLROOT . '/images/' . $data['post']->image : 'http://placehold.it/300x300';?>?>" height="300" width="500">
        <h3><?php echo $data['post']->title;?></h3>
        <p><?php echo $data['post']->body;?></p>
        <p class="card-text mb-3"><small class="text-muted">Created by: <?php echo $data['user']->fullname;?> on <?php echo $data['post']->created_at;?></small></p>
    </div>
    <?php if($_SESSION['user_id'] == $data['post']->user_id):?>
    <div class="row">
        <div class="col">
            <a href="<?php echo URLROOT . '/posts/edit/' . $data['post']->id;?>" class="btn btn-secondary btn-block float-right">Edit</a>
        </div>
        <div class="col">
            <form action="<?php echo URLROOT . '/posts/delete/' . $data['post']->id;?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger btn-block float-left">
            </form>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
