<?php
include "../model/DatabaseConnect.php";
include "../model/ProductDatabase.php";
include "../model/Product.php";
include "../controller/ProductController.php";


$keyWord = $_POST['keyword'];
$products = new \controller\ProductController();
$products->search($keyWord);
//return $controller;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>
<body>
<table class="table" style="text-align: center">
    <thead class="thead-dark">
    <th scope="col">STT</th>
    <th scope="col">Name</th>
    <th scope="col">Type</th>
    <th scope="col">Amount</th>
    <th scope="col">Price</th>
    <th scope="col">Date_created</th>
    <th scope="col">Infomation</th>
    <th></th>
    <th></th>
    </thead>
    <tbody>
    <?php foreach ($products as $key => $product): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $product->name ?></td>
            <td><?php echo $product->type ?></td>
            <td><?php echo $product->amount ?></td>
            <td><?php echo $product->price ?></td>
            <td><?php echo $product->date_created ?></td>
            <td><?php echo $product->infomation ?></td>
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
