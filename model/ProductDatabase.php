<?php

namespace model;
//thực hiện insert dữ liệu vào databases
class ProductDatabase
{
    public $connection;
    
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    
    public function create($product)
    {
        $structuredQueryLanguage = "INSERT INTO product(name, type, price,amount,date_created,infomation) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->type);
        $statement->bindParam(3, $product->price);
        $statement->bindParam(4, $product->amount);
        $statement->bindParam(5, $product->date_created);
        $statement->bindParam(6, $product->infomation);
        return $statement->execute();
    }
    
    public function getAll()
    {
        $structuredQueryLanguage = "SELECT * FROM product";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->execute();
        $result = $statement->fetchAll();
        $products = [];
        foreach ($result as $row) {
            $product = new product($row['name'], $row['type'], $row['price'], $row['amount'], $row['date_created'], $row['infomation']);
            $product->id = $row["id"];
            array_push($products, $product);
        }
        return $products;
    }
    
    public function get($id)
    {
        $structuredQueryLanguage = "SELECT * FROM product WHERE id = ?";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $product = new Product($row['name'], $row['type'], $row['price'], $row['amount'], $row['date_created'], $row['infomation']);
        $product->id = $row["id"];
        return $product;
    }
    
    public function delete($id)
    {
        $structuredQueryLanguage = "DELETE FROM product WHERE id = ?";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $id);
        $statement->execute();
        return $statement;
    }
    
    public function update($id, $product)
    {
        $structuredQueryLanguage = "UPDATE product SET name = ?, type = ?, price = ?, amount = ?, date_created = ?, infomation = ? WHERE id = ?";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->type);
        $statement->bindParam(3, $product->price);
        $statement->bindParam(4, $product->amount);
        $statement->bindParam(5, $product->date_created);
        $statement->bindParam(6, $product->infomation);
        $statement->bindParam(7, $id);
        return $statement->execute();
    }
    
    public function search($keyWord)
    {
        $structuredQueryLanguage = "SELECT * FROM product WHERE name LIKE '%$keyWord%'";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->execute();
        $result = $statement->fetchAll();
        $products = [];
        foreach ($result as $row) {
            $product = new Product($row['name'], $row['type'], $row['price'], $row['amount'], $row['date_created'], $row['infomation']);
            $product->id = $row["id"];
            array_push($products, $product);
        }
        return $products;
    }
}