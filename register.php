<?php
// DATABAST FILE MUST PUT FIRST
require "./database/db.php";
require "./partials/header.php";


$date = new DateTime('now');
$now = $date->format("Y-m-d H:i:s");
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['register'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $address = trim($_POST['address']);
        $pname = $_FILES['photo']['name'];
        $tmpname = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmpname, "Image/$pname");
        // check error part by empty method
        // empty() = Determine whether a variable is empty
        empty($name) ? $errors[] = "name required..." : "";
        empty($email) ? $errors[] = "email required..." : "";
        empty($password) ? $errors[] = "password required..." : "";
        empty($address) ? $errors[] = "address required..." : "";
        empty($pname) ? $errors[] = "photo required..." : "";
        // if var is empty ? | error="..required.." | : "";


        // Give error if email is already existed
        if (count($errors) === 0) {
            // select from database
            $email_check_qry = "SELECT * FROM users WHERE email=:email";
            // add require db.php which contains $pdo
            $statement = $pdo->prepare($email_check_qry);
            // bind 
            $statement->bindParam(":email", $email, PDO::PARAM_STR);
            // execute
            $statement->execute();
            // fetch data of already existed email 
            $res = $statement->fetch();
            if ($res) {
                // call errors array to show error alert by string
                $errors[] = "Email Already Exist";
            } else {
                // if user registers with new email which hasn't exist in our database
                // work/write code for registration process
                // built query first to add/store data
                $qry = "INSERT INTO users (name,email,password,address,photo,created_date,updated_date) VALUES (:name,:email,:password,:address,:photo,:created_date,:updated_date)";
                $s = $pdo->prepare($qry);
                $s->bindParam(":name", $name, PDO::PARAM_STR);
                $s->bindParam(":email", $email, PDO::PARAM_STR);
                $s->bindParam(":password", $password, PDO::PARAM_STR);
                $s->bindParam(":address", $address, PDO::PARAM_STR);
                $s->bindParam(":photo", $pname, PDO::PARAM_STR);
                // $pname > var you named
                $s->bindParam(":created_date", $now, PDO::PARAM_STR);
                $s->bindParam(":updated_date", $now, PDO::PARAM_STR);

                // execute
                if ($s->execute()) {
                    // Redirect to login.php
                    header("location:login.php");
                } else {
                    $errors[]  = "Oops! Something went wrong. db insert error!.";
                }
            }
        }
    }
}
require "./partials/navbar.php";
?>
<div class="main p-5 ">
    <form action="register.php" class="w-50 m-auto p-5 m-5 shadow" method="post" enctype="multipart/form-data">
        <!-- input type="file" / ပုံပါရင် မဖြစ်မနေ enctype="multipartထည့် -->
        <?php require("./partials/errors.php");  ?>
        <!-- join error where you wanna show error alert in html -->
        <h1 class="text-center mb-5">Register Form</h1>
        <div class="mb-3">
            <input type="text" placeholder="Name.." name="name" class="form-control">
        </div>
        <div class="mb-3">
            <input type="email" placeholder="Email.." name="email" class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" placeholder="Password.." name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="mb-3">
            <textarea name="address" class="form-control" placeholder="Address"></textarea>
        </div>
        <input type="submit" value="Register" name="register" class="btn btn-primary ">
    </form>
</div>

<?php

require "./partials/footer.php";

?>
