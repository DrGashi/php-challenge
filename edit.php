<?php
    include_once('database/config.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=:id";
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
        <title>Edit User</title>
    </head>
    <body>
        <fieldset>
        <legend>Edit User</legend>
            <form action="update.php" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $data['id']?>"><br>
                <input type="text" name="name" id="name" value="<?php echo $data['name']?>"><br>
                <input type="text" name="surname" id="surname" value="<?php echo $data['surname']?>"><br>
                <input type="text" name="email" id="email" value="<?php echo $data['email']?>"><br>
                <input type="text" name="password" id="password" value="<?php echo $data['pass']?>"><br>
                <br>
                <button type="submit" name="update">Update</button>
            </form>
        </fieldset>
        <a href="dashboard.php">Dashboard</a>
    </body>
</html>