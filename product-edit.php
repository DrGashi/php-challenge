<?php
    include_once('database/config.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=:id";
    $prep = $conn->prepare($sql);
    $prep->bindParam(':id', $id);
    $prep->execute();
    $data = $prep->fetch();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Edit Product</title>
    </head>
    <body>
        <fieldset>
        <legend>Edit Product</legend>
            <form action="product-update.php" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $data['id']?>"><br>
                <input type="text" name="title" id="title" value="<?php echo $data['title']?>"><br>
                <input type="text" name="description" id="description" value="<?php echo $data['description']?>"><br>
                <input type="text" name="quantity" id="quantity" value="<?php echo $data['quantity']?>"><br>
                <input type="text" name="price" id="price" value="<?php echo $data['price']?>"><br>
                <br>
                <button type="submit" name="update">Update</button>
            </form>
        </fieldset>
        <a href="product-dashboard.php">Dashboard</a>
    </body>
</html>