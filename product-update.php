<?php
require "./database/db.php";
?>
<?php
$errors = [];
if (isset($_POST['update'])) {
    $pid = $_POST['product_id'];
    // echo $pid;
    $category_id = $_POST['category_id'];
    // echo $category_id;
    $name = $_POST['name'];
    $description = $_POST['description'];
    // echo $description;
    $price = $_POST['price'];
    // echo $price;
    $featured = $_POST['is_featured'] ?? 0;
    echo $featured;
    $oldphoto = $_POST['oldphoto'];
    // echo $oldphoto;
    // die();
    $pname = $_FILES['photo']['name'];
    // echo $pname;
    // die();
    $tmpname = $_FILES['photo']['tmp_name'];
    // echo $tmpname;

    if ($pname) {
        move_uploaded_file($tmpname, "Image/$pname");
    } else {
        $pname = $oldphoto;
    }
    empty($category_id) ? $errors[] = "category_id required..." : "";
    empty($name) ? $errors[] = "name required..." : "";
    empty($description) ? $errors[] = "description required..." : "";
    empty($price) ? $errors[] = "price required..." : "";
    empty($pname) ? $errors[] = "photo required..." : "";

    if (count($errors) === 0) {
        // die('right');
        $updateproductqry = "UPDATE products SET category_id=:category_id ,name=:name , description=:description, price=:price
,is_featured=:is_featured, photo=:photo WHERE product_id=:product_id";
        // add require db.php which contains $pdo
        $statement = $pdo->prepare($updateproductqry);
        // bind
        $statement->bindParam(":category_id", $category_id, PDO::PARAM_STR);
        $statement->bindParam(":name", $name, PDO::PARAM_STR);
        $statement->bindParam(":description", $description, PDO::PARAM_STR);
        $statement->bindParam(":price", $price, PDO::PARAM_STR);
        $statement->bindParam(":is_featured", $featured, PDO::PARAM_STR);
        $statement->bindParam(":photo", $pname, PDO::PARAM_STR);
        $statement->bindParam(":product_id", $pid, PDO::PARAM_STR);
        // execute
        $res = $statement->execute();
        if ($res) {
            header("location:admin-dashboard.php?#products");
        } else {
            // die('error');
        }
    } else {
        // echo "Hi";
        // die('error');
        $errors[] = "error found";
    }
}
?>
<p>
    <?php
    foreach ($errors as $key => $err) {
        echo "<div class='alert alert-danger'>$err</div>";
    }
    ?>
</p>