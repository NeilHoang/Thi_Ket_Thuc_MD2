<h2>Bạn chắc chắn muốn xóa khách hàng này?</h2>
<h3><?php echo $product->name; ?></h3>
<form action="index.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger"/>
        <a class="btn btn-default" href="index.php">Cancel</a>
    </div>
</form>
