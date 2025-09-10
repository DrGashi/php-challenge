<?php
    include_once('database/config.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $stock_value=$quantity * $price;


        $sql = "UPDATE products SET title=:title, description=:description, quantity=:quantity, price=:price, stock_value=:stock_value WHERE id=:id";
        $prep = $conn->prepare($sql);
        $prep->bindParam(":id", $id);
        $prep->bindParam(':title', $title);
        $prep->bindParam(':description', $description);
        $prep->bindParam(':quantity', $quantity);
        $prep->bindParam(':price', $price);
        $prep->bindParam(':stock_value', $stock_value);

        $prep->execute();
        header('Location:product-dashboard.php');
    }

?>