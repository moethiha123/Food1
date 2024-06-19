<?php

require "./database/db.php";

$errors = [];

if (isset($_POST['update'])) {

    $uuid = $_POST['userid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $oldphoto = $_POST['oldphoto'];
    $pname = $_FILES['photo']['name'];
    $tmpname = $_FILES['photo']['tmp_name'];
    if ($pname) {
        move_uploaded_file($tmpname, "Image/$pname");
    } else {
        $pname = $oldphoto;
    }

    empty($name) ? $errors[] = "name required..." : "";
    empty($email) ? $errors[] = "email required..." : "";
    empty($address) ? $errors[] = "address required..." : "";
    empty($pname) ? $errors[] = "photo required..." : "";

    if (count($errors) === 0) {
        $updateqry = "UPDATE  users SET name=:name , email=:email, address=:address , photo=:photo WHERE user_id=:user_id";
        $statement = $pdo->prepare($updateqry);
        $statement->bindParam(":name", $name, PDO::PARAM_STR);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->bindParam(":address", $address, PDO::PARAM_STR);
        $statement->bindParam(":photo", $pname, PDO::PARAM_STR);
        $statement->bindParam(":user_id", $uuid, PDO::PARAM_STR);
        $res = $statement->execute();
        if ($res) {
            header("location:admin-dashboard.php");
        } else {
            die('error');
        }
    } else {
        $errors = ['incorrect'];
        $errors[] = 'wrong';
        // both correct way to write
    }
}
// require "./partials/error.php";
?>


<h3><?php require "./partials/errors.php"; ?></h3>