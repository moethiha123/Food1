<?php
$errors = [];
if (isset($_POST['create_cat'])) {
    $name = $_POST['name'];
    empty($name) ? $errors[] = "name required" : "";
    if (count($errors) === 0) {
        $name_check = "SELECT * FROM categories WHERE name=:name";
        $s = $pdo->prepare($name_check);
        $s->bindParam(":name", $name, PDO::PARAM_INT);
        $s->execute();
        $res = $s->fetch();
        // print_r($res);
        // die();
        if (isset($res)) {
            if ($name === $res['name']) {
                $errors[] = "category name already exist";
            } else {
                $sql = "INSERT INTO categories (name) VALUES (:name)";
                $statement = $pdo->prepare($sql);
                $statement->bindParam(":name", $name, PDO::PARAM_STR);
                $res = $statement->execute();
                if ($res) {
                    header("location:admin-dashboard.php?#categories");
                } else {
                    $errors[] = "Insert Error Found";
                }
            }
        } else {
            $errors = ' Insert Error Found ';
        }
    }
}
