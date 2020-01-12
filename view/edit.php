<h2>Cập nhật thông tin sản phẩm</h2>
<form method="post" action="index.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $product->name; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Type</label>
        <select name="type">
            <option value="Điện Thoại" <?php echo $product->type == "Điện Thoại" ? " selected" : ""; ?>>Điện Thoại
            </option>
            <option value="Điều Hoà" <?php echo $product->type == "Điều Hoà" ? " selected" : ""; ?>>Điều Hoà
            </option>
            <option value="Tủ Lạnh" <?php echo $product->type == "Tủ Lạnh" ? " selected" : ""; ?>>Tủ Lạnh
            </option>
        </select>
    </div>
    <div class="form-group">
        <label>Price</label>
        <textarea name="price" class="form-control"><?php echo $product->price; ?></textarea>
    </div>
    <div class="form-group">
        <label>Amount</label>
        <textarea name="amount" class="form-control"><?php echo $product->amount; ?></textarea>
    </div>
    <div class="form-group">
        <label>Date_Created</label>
        <textarea name="date_created" class="form-control"><?php echo date('m/d/Y h:i:s a');; ?></textarea>
    </div>
    <div class="form-group">
        <label>Infomation</label>
        <textarea name="infomation" class="form-control"><?php echo $product->infomation; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>
