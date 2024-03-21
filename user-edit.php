<?php
// DATABAST FILE MUST PUT FIRST
require "./database/db.php";
require "./partials/header.php";

$errors = [];

$uid = $_GET['id'];
$user_qry = "SELECT * FROM users WHERE user_id=:id";
$s = $pdo->prepare($user_qry);
$s->bindParam(":id", $uid, PDO::PARAM_INT);
$s->execute();
$user = $s->fetch();

require "./partials/navbar.php";
?>

<div class="main p-5 ">
    <form action="user-update.php" class="w-50 m-auto p-5 m-5 shadow" method="post" enctype="multipart/form-data">
        <!-- input type="file" / ပုံပါရင် မဖြစ်မနေ enctype="multipartထည့် -->
        <?php require("./partials/errors.php");  ?>
        <!-- join error where you wanna show error alert in html -->
        <h1 class="text-center mb-5">Edit User</h1>
        <!-- *********set id value carried by edit button a link -->
        <input type="hidden" name="userid" value="<?= $user['user_id'] ?>">
        <!-- auto fill user's value with value attr
     -->
        <div class="mb-3">
            <input type="text" placeholder="Name.." name="name" value="<?= $user['name'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <input type="email" placeholder="Email.." name="email" value="<?= $user['email'] ?>" class="form-control">
        </div>

        <!-- PHOTO SESSION -->
        <!-- show photo of edited user from database fetch array -->
        <img src="Image/<?= $user['photo'] ?>" width="100" alt="user">
        <!-- *********** -->
        <!-- bring this value as oldphoto name to update file -->
        <!-- not to duplitate two same photo , bring it with input type hidden -->

        <input type="hidden" name="oldphoto" value="<?= $user['photo'] ?>">
        <!-- A place to upload file -->
        <div class="mb-3">
            <label for="">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <!--  address -->
        <div class="mb-3">
            <textarea name="address" class="form-control" placeholder="Address">
<?= $user['address'] ?>
            </textarea>
        </div>
        <input type="submit" value="update" name="update" class="btn btn-primary ">
    </form>
</div>