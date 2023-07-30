<?php
require "./database/db.php";
require "./partials/header.php";
$errors = [];
$categoryId = $_GET['id'];
$cat_sql = "SELECT * FROM categories WHERE category_id=:category_id";
$s = $pdo->prepare($cat_sql);
$s->bindParam(":category_id", $categoryId, PDO::PARAM_INT);
$s->execute();
$res = $s->fetch();
// print_r($res['name']);
// die();
?>

<div class="main p-5 ">
    <form action="category-update.php" class="w-50 m-auto p-5 m-5 shadow" method="post">
        <?php require "./partials/errors.php" ?>
        <h1 class="text-center mb-5">Edit Category Form</h1>
        <!-- carry clicked button's category id by hidden input -->
        <input type="hidden" name="category_id" value="<?= $res['category_id'] ?>">
        <div class="mb-3">
            <input type="name" placeholder="Name.." name="name" value="<?= $res['name'] ?>" class="form-control">
        </div>
        <input type="submit" value="update" name="update" class="btn btn-primary ">
    </form>
</div>