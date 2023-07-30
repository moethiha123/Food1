<?php
require "./database/db.php";
?>
<?php
$errors = [];

if (isset($_POST['update'])) {
    $pid = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $featured = $_POST['featured'] ?? "0";
    $oldphoto = $_POST['oldphoto'];
    $pname = $_FILES['photo']['name'];
    $tmpname = $_FILES['photo']['tmp_name'];
    if ($pname) {
        move_uploaded_file($tmpname, "Image/$pname");
    } else {
        $pname = $oldphoto;
    }
    empty($category_id) ? $errors[] = "category_id required..." : "";
    empty($name) ? $errors[] = "name required..." : "";
    empty($description) ? $errors[] = "description required..." : "";
    empty($price) ? $errors[] = "price required..." : "";
    // empty($featured) ? $errors[] = "featured required..." : "";
    // empty($pname) ? $errors[] = "photo required..." : "";

    if (count($errors) === 0) {
        // die('right');
        $updateproductqry = "UPDATE products SET category_id=:category_id ,name=:name , description=:description, price=:price
,featured=:featured, photo=:photo WHERE product_id=:product_id";
        // add require db.php which contains $pdo
        $statement = $pdo->prepare($updateproductqry);
        // bind
        $statement->bindParam(":category_id", $category_id, PDO::PARAM_STR);
        $statement->bindParam(":name", $name, PDO::PARAM_STR);
        $statement->bindParam(":description", $description, PDO::PARAM_STR);
        $statement->bindParam(":price", $price, PDO::PARAM_STR);
        $statement->bindParam(":featured", $featured, PDO::PARAM_STR);
        $statement->bindParam(":photo", $pname, PDO::PARAM_STR);
        $statement->bindParam(":product_id", $pid, PDO::PARAM_STR);
        // execute
        $res = $statement->execute();
        if ($res) {
            header("location:admin-dashboard.php?page=2&#products");
        } else {
            die('error');
        }
    } else {
        die('error');
        $errors[] = "error found";
    }
}
?>