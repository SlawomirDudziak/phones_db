
<?php if(!empty($errors)): ?>
    <div class="alert-danger">
        <?php foreach ($errors as $error): ?>
        <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">

<?php if($product['image']): ?>
    <img src="<?php echo $product['image'] ?>" class="update-image">
<?php endif; ?>
<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image">
</div>
<div class="mb-3">
    <label>Phone model</label>
    <input type="text" class="form-control" name="title" value="<?php echo $title ?>">
</div>
<div class="mb-3">
    <label>Phone description</label>
    <input type="text" class="form-control" name="description" value="<?php echo $description ?>">
</div>
<div class="mb-3">
    <label>Phone price</label>
    <input type="number" class="form-control" name="price" value="<?php echo $price ?>">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
