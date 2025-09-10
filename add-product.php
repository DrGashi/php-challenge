<?php
    include_once("database/config.php");
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $description=$_POST['description'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $stock_value=$quantity * $price;

        $sql="INSERT INTO products(title, description,  quantity, price, stock_value) VALUES (:title, :description, :quantity, :price, :stock_value)";
        $sqlQuery = $conn->prepare($sql);
        
        $sqlQuery->bindParam(':title', $title);
        $sqlQuery->bindParam(':description', $description);
        $sqlQuery->bindParam(':quantity', $quantity);
        $sqlQuery->bindParam(':price', $price);
        $sqlQuery->bindParam(':stock_value', $stock_value);

        $sqlQuery->execute();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Add Product</title>
    </head>
    <body>
        <fieldset>
            <legend>Add Product</legend>
            <form action="add-product.php" method="post">
                <input type="text" name="title" id="title" placeholder="Title"><br>
                <input type="text" name="description" id="description" placeholder="Description"><br>
                <input type="number" name="quantity" id="quantity" placeholder="Quantity"><br>
                <input type="number" name="price" id="price" placeholder="Price"><br>
                <button type="submit" name="submit">Add</button>
            </form>
        </fieldset>
    </body>
</html>