<?php

require "./database/db.php";
$errors = [];
if (isset($_POST['update'])) {

    $catid = $_POST['category_id'];
    $name = $_POST['name'];

    empty($name) ? $errors[] = "name required..." : "";

    if (count($errors) === 0) {
        // die('right');
        $cat_updateqry = "UPDATE  categories SET name=:name  WHERE category_id=:category_id";

        $statement = $pdo->prepare($cat_updateqry);
        $statement->bindParam(":name", $name, PDO::PARAM_STR);
        $statement->bindParam(":category_id", $catid, PDO::PARAM_STR);
        $res = $statement->execute();
        if ($res) {
            header("location:admin-dashboard.php");
        } else {
            die('error');
        }
    } else {
        die('error');
        $errors[] = "error found";
    }
}
