<?php
// DATABAST FILE MUST PUT FIRST
require "./database/db.php";
require "./partials/header.php";
$errors = [];
$product_id = $_GET['id'];
$productEdit_qry = "SELECT * FROM products WHERE product_id=:id";
$s = $pdo->prepare($productEdit_qry);
$s->bindParam(":id", $product_id, PDO::PARAM_INT);
$s->execute();
$product = $s->fetch();
// print_r($product);
// die();

require "./partials/navbar.php";
?>

<div class="main p-5 ">
    <form action="product-update.php" class="w-50 m-auto p-5 m-5 shadow" method="post" enctype="multipart/form-data">

        <!-- join error where you wanna show error alert in html -->
        <h1 class="text-center mb-5">Edit Food Details</h1>
        <input type="hidden" name="pid" value="<?php echo $product['category_id'] ?>">
        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
        <div class="mb-3">
            <select name="category_id" class="form-control">
                <?php
                $sql = "SELECT * FROM categories";
                $s = $pdo->prepare($sql);
                $s->execute();
                $res = $s->fetchAll(PDO::FETCH_ASSOC);
                foreach ($res as $key => $value) { ?>
                <?php if ($value['category_id'] === $product['category_id']) : ?>
                <option selected value="<?= $value['category_id'] ?>" class="form-control">
                    <?= $value['name'] ?></option>
                <?php else : ?>
                <option value="<?= $value['category_id'] ?>">
                    <?= $value['name'] ?>
                </option>
                <?php endif ?>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="text" placeholder="Name.." name="name" value="<?= $product['name'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <textarea name="description" class="form-control" placeholder="Description">
        <?= $product['description'] ?>
                    </textarea> <br>
            <div class="mb-3">
                <input type="text" placeholder="Price.." name="price" value="<?= $product['price'] ?>"
                    class="form-control">
            </div>
            <div class="mb-3">
                <?php if ($product['is_featured'] == 1) : ?>
                <input type="checkbox" name="featured" checked value="1">
                <?php else : ?>
                <input type="checkbox" name="featured" value="1">
                <?php endif ?>
                <label for="">Feature</label>
            </div>
            <div class="mb-3">
                <img src="Image/<?= $product['photo'] ?>" width="160" height="200"
                    style="object-fit:cover;object-fit:contain;" alt="user">
                <input type="hidden" name="oldphoto" value="<?= $product['photo'] ?>">
                <div class="mb-3">
                    <label for=""></label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <input type="submit" value="Update" name="update" class="btn btn-primary ">
    </form>
</div>