<?php
    include_once("database/config.php");
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="INSERT INTO users(name, surname,  email, pass) VALUES (:name, :surname, :email, :password)";
        $sqlQuery = $conn->prepare($sql);
        
        $sqlQuery->bindParam(':name', $name);
        $sqlQuery->bindParam(':surname', $surname);
        $sqlQuery->bindParam(':email', $email);
        $sqlQuery->bindParam(':password', $password);

        $sqlQuery->execute();
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Add User</title>
    </head>
    <body>
        <fieldset>
            <legend>Add User</legend>
            <form action="signup.php" method="post">
                <input type="text" name="name" id="name" placeholder="Name"><br>
                <input type="text" name="surname" id="surname" placeholder="Surname"><br>
                <input type="text" name="email" id="email" placeholder="Email"><br>
                <input type="password" name="password" id="password" placeholder="Password"><br>
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </fieldset>
    </body>
</html>