<?php
    include_once('database/config.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "UPDATE users SET name=:name, surname=:surname, email=:email, pass=:pass WHERE id=:id";
        $prep = $conn->prepare($sql);
        $prep->bindParam(":id", $id);
        $prep->bindParam(':name', $name);
        $prep->bindParam(':surname', $surname);
        $prep->bindParam(':email', $email);
        $prep->bindParam(':pass', $password);

        $prep->execute();
        header('Location:dashboard.php');
    }

?>