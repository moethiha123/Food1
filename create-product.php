<?php
// DATABAST FILE MUST PUT FIRST
require "./database/db.php";
require "./partials/header.php";


$errors = [];
// CHECK SERVER METHOD
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //_ echo "yes";
    // isset 
    if (isset($_POST['add'])) {
        $name = trim($_POST['name']);
        $price = trim($_POST['price']);
        $description = $_POST['description'];
        $featured = $_POST['featured'] ?? 0;
        // $product_id = $_POST['product_id'];
        $category_id = $_POST['category_id'];
        $pname = $_FILES['photo']['name'];
        $tmpname = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmpname, "Image/$pname");


        // check error part by empty method
        // empty() = Determine whether a variable is empty
        empty($name) ? $errors[] = "name required..." : "";
        empty($price) ? $errors[] = "price required..." : "";
        empty($description) ? $errors[] = "description required..." : "";
        // empty($featured) ? $errors[] = "featured required..." : "";
        // empty($product_id) ? $errors[] = "product_id required..." : "";
        empty($category_id) ? $errors[] = "category_id required..." : "";
        empty($pname) ? $errors[] = "photo required..." : "";
        // if var is empty ? | error="..required.." | : "";


        // Give error if email is already existed
        if (count($errors) === 0) {
            // select from database

            // if user registers with new email which hasn't exist in our database
            // work/write code for registration process
            // built query first to add/store data
            $qry = "INSERT INTO products (category_id,name,description,price,featured,photo) VALUES (:category_id,:name,:description,:price,:featured,:photo)";
            $s = $pdo->prepare($qry);
            $s->bindParam(":name", $name, PDO::PARAM_STR);
            $s->bindParam(":description", $description, PDO::PARAM_STR);
            $s->bindParam(":price", $price, PDO::PARAM_STR);
            $s->bindParam(":featured", $featured, PDO::PARAM_STR);
            // $s->bindParam(":product_id", $product_id, PDO::PARAM_STR);
            $s->bindParam(":category_id", $category_id, PDO::PARAM_STR);
            $s->bindParam(":photo", $pname, PDO::PARAM_STR);
            // $pname > var you named

            // execute
            if ($s->execute()) {
                // Redirect to login.php
                header("location:admin-dashboard.php");
            } else {
                $errors[]  = "Oops! Something went wrong. db insert error!.";
            }
        }
    }
}

require "./partials/navbar.php";
?>

<div class="main p-5 ">
    <form action="create-product.php" class="w-50 m-auto p-5 m-5 shadow" method="post" enctype="multipart/form-data">
        <!-- input type="file" / ပုံပါရင် မဖြစ်မနေ enctype="multipartထည့် -->
        <?php require("./partials/errors.php");  ?>
        <!-- join error where you wanna show error alert in html -->
        <h1 class="text-center mb-5">Add Product</h1>
        <!-- <div class="mb-3">
            <input type="text" placeholder="Product_id..." name="product_id" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" placeholder="Category_id..." name="category_id" class="form-control">
        </div> -->
        <div class="mb-3">
            <select name="category_id" class="form-control">
                <option value="">Select Category Name</option>
                <?php
                $sql = "SELECT * FROM categories";
                $s = $pdo->prepare($sql);
                $s->execute();
                $res = $s->fetchAll(PDO::FETCH_ASSOC);
                foreach ($res as $key => $value) { ?>
                    <option value="<?= $value['category_id'] ?>" class="form-control"><?= $value['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="text" placeholder="Name.." name="name" class="form-control">
        </div>
        <div class="mb-3">
            <textarea name="description" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="mb-3">
            <input type="text" placeholder="Price.." name="price" class="form-control">
        </div>
        <div class="mb-3">
            <input type="radio" value="1" name="featured">
            <label for="">Make Feature</label>
        </div>
        <div class="mb-3">
            <label for="">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <input type="submit" value="Add" name="add" class="btn btn-primary ">
    </form>
</div>

<?php

require "./partials/footer.php";

?>