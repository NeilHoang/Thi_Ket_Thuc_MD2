<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<body>
<h2>Danh sách sản phẩm</h2>
<form class="form-inline my-2 my-lg-0" method="get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
    <a href="index.php?page=search&keyword=<?php echo $_GET['keyword'] ?>"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button></a>
</form>
<a href="index.php?page=add" class="btn btn-outline-success m-3">Thêm</a>
<table class="table" style="text-align: center">
    <thead class="thead-dark">
    <th scope="col">STT</th>
    <th scope="col">Tên Hàng</th>
    <th scope="col">Loại Hàng</th>
    <th></th>
    <th></th>
    </thead>
    <tbody>
    <?php foreach ($products as $key => $product): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $product->name ?></td>
            <td><?php echo $product->type ?></td>
            <td><a href="index.php?page=delete&id=<?php echo $product->id; ?>"
                   class="btn btn-outline-danger">Delete</a></td>
            <td><a href="index.php?page=edit&id=<?php echo $product->id; ?>"
                   class="btn btn-outline-secondary">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
