<?php require_once APPROOT . '/views/includes/header.php'; ?>
<a href="<?php echo URLROOT . '/posts/show/' . $data['id'];?>" class="btn btn-light mb-3"><i class="fas fa-caret-left"></i> Back</a>
<div class="form-shadow mt-4">
    <form class="form-signin" action="<?php echo URLROOT . '/posts/edit/' . $data['id']; ?>" method="post" enctype="multipart/form-data">
        <h1 class="h3 mb-3 mt-3 font-weight-normal">Add Post</h1>
        <div class="form-group">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" name="title" value="<?php echo $data['title'];?>" class="form-control <?php echo !empty($data['title_err']) ? 'is-invalid' : '';?>" placeholder="Post Title">
            <span class="invalid-feedback"><?php echo $data['title_err'];?></span>
        </div>
        <div class="form-group">
            <label for="body">Body: <sup>*</sup></label>
            <textarea name="body" class="form-control <?php echo !empty($data['body_err']) ? 'is-invalid' : '';?>" placeholder="Post Body"><?php echo $data['body'];?></textarea>
            <span class="invalid-feedback"><?php echo $data['body_err'];?></span>
        </div>
        <div class="form-group">
            <label for="image">Image: <span class="text-secondary">(Optional)</span></label><br> 
            <input type="file" name="image" class="btn btn-default" value="<?php echo $data['image'];?>">
            <span class="invalid-feedback"><?php echo $data['image_err'];?></span>
        </div>
        <input type="submit" value="Update Post" class="btn btn-lg btn-primary">
    </form>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
