<?php
session_start();

$date = new DateTime('now');
$date = $date->format("Y-m-d H:i:s");

require "./database/db.php";

if (isset($_POST['order'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $photoName = $_FILES['photo']['name'];
    $photoTMP = $_FILES['photo']['tmp_name'];
    move_uploaded_file($photoTMP, "img/$photoName");
    $status = 0;

    $sql = "INSERT INTO customers (customer_id,name,email,phone,address,status,created_date,updated_date) VALUES (null,:name,:email,:phone,:address,:status,:created_date,:updated_date)";
    $s = $pdo->prepare($sql);
    $s->bindParam(":name", $name, PDO::PARAM_STR);
    $s->bindParam(":email", $email, PDO::PARAM_STR);
    $s->bindParam(":phone", $phone, PDO::PARAM_STR);
    $s->bindParam(":address", $address, PDO::PARAM_STR);
    $s->bindParam(":status", $status, PDO::PARAM_STR);
    $s->bindParam(":created_date", $date, PDO::PARAM_STR);
    $s->bindParam(":updated_date", $date, PDO::PARAM_STR);


    $s->execute();
    // die("here");
    $customerid = $pdo->lastInsertId();
    foreach ($_SESSION['cart'] as $product_id => $qty) {
        $order_item_qry = "INSERT INTO order_items (customer_id,product_id,qty) VALUES (:customer_id,:product_id,:qty)";
        $s = $pdo->prepare($order_item_qry);
        $s->bindParam(":customer_id", $customerid, PDO::PARAM_INT);
        $s->bindParam(":product_id", $product_id, PDO::PARAM_INT);
        $s->bindParam(":qty", $qty, PDO::PARAM_STR);
        $s->execute();
        if ($s) {
            header('location:index.php?message=success');
        } else {
            echo "hello";
        }
    }
}
require "./partials/header.php";
require "./partials/navbar.php";

?>



<form class="w-50 m-auto p-5" action="cart.php" method="post" enctype="multipart/form-data">
    <!-- Name input -->
    <h3 class="text-center w-100 mb-3">Order Here</h3>
    <div class="form-outline mb-4">
        <input type="text" name="name" class="form-control" />
        <label class="form-label">Name</label>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" class="form-control" />
        <label class="form-label" ">Email</label>
    </div>

    <div class=" form-outline mb-4">
            <input type="text" name="phone" class="form-control" />
            <label class="form-label">Phone</label>
    </div>

    <div class="form-outline  mb-4">
        <textarea name="address" class="form-control">Address</textarea>
    </div>

    <!-- Submit button -->
    <button type="submit" name="order" class="btn btn-primary btn-block mb-4">Order</button>
</form>