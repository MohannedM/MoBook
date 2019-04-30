<?php require_once APPROOT . '/views/includes/header.php'; ?>
<div class="row">
    <div class="col">
        <h2 class="mb-3">Posts</h2>
    </div>
    <div class="col">
        <a href="<?php echo URLROOT . '/posts/add';?>" class="btn btn-primary float-right"><i class="fas fa-pencil-alt"></i> Add Post</a>
    </div>
</div>
<?php flash('post_message');?>
<?php foreach($data['posts'] as $post): ?>
<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo !empty($post->image) ? URLROOT . '/public/images/' . $post->image : 'http://placehold.it/300x300';?>" height="200" class="card-img" alt="<?php echo $post->title;?>">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $post->title;?></h5>
        <p class="card-text"><?php echo $post->body;?></p>
        <p class="card-text"><small class="text-muted">Created by: <?php echo $post->fullname;?> on <?php echo $post->postCreated;?></small></p>
        <a href="<?php echo URLROOT . '/posts/show/' . $post->postId;?>" class="btn btn-light btn-block">More</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
