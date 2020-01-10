<?php

namespace controller;

use model\Product;
use model\ProductDatabase;
use model\DatabaseConnect;

ob_start();

class ProductController
{
    public $productDatabase;
    
    public function __construct()
    {
        $dataSourceName = 'mysql:host=127.0.0.1;dbname=products';
        $userName = 'root';
        $passWord = 'password';
        $connection = new DatabaseConnect($dataSourceName, $userName, $passWord);
        $this->productDatabase = new ProductDatabase($connection->connect());
        
    }
    
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include "view/add.php";
        } else {
            $name = $_POST['name'];
            $type = $_POST['type'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $date_created = date('m/d/Y h:i:s a');
            $infomation = $_POST['infomation'];
            
            $product = new Product($name, $type, $price,$amount,$date_created,$infomation);
            $this->productDatabase->create($product);
            $message = 'Product created';
            include 'view/add.php';
            
        }
    }
    
    public function index()
    {
        $products = $this->productDatabase->getAll();
        include "view/list.php";
    }
    
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET["id"];
            $product = $this->productDatabase->get($id);
            include "view/delete.php";
        } else {
            $id = $_POST["id"];
            $this->productDatabase->delete($id);
            header('Location: index.php');
        }
    }
    
    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'GET') {
            $id = $_GET['id'];
            $product = $this->productDatabase->get($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $product = new Product($_POST['name'], $_POST['type'], $_POST['price'],$_POST['amount'],$_POST['date_created'],$_POST['infomation']);
            $this->productDatabase->update($id, $product);
            header('Location: index.php');
        }
    }
    
    public function search($keyWord)
    {
        $products = $this->productDatabase->search($keyWord);
        $keyWord = $_GET['keyWord'];
        include 'view/list.php';
    }
}