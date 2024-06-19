<?php
session_start();
require "./database/db.php";
$auth = isset($_SESSION['admin']);
require("./backend/create-cat.php");
// require "./partials/carousel.php";
require "./partials/header.php";
// require "./partials/navbar.php";
echo $auth;

?>

<?php if ($auth) : ?>
    <div class="row m-0 p-4">
        <div class="col-md-3 text-center shadow">
            <h3 class="mt-2">Admin Dashboard</h3>
            <hr>
            <ul class="my-5 p-0 ">
                <li class="mb-3"><a href="#users">All User</a></li>
                <li class="mb-3"><a href="#products">Products</a></li>
                <li class="mb-3"><a href="#categories">Categories</a></li>
                <li class="mb-3"><a href="order_list.php">Order List</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <!-- Image and text -->
            <nav class="navbar navbar-light bg-light mb-2">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <!-- <img src="./img/mdb-transaprent-noshadows.webp" class="me-2" height="20" alt="MDB Logo"
                        loading="lazy" /> -->
                        <!-- <small>MyBlog</small> -->
                    </a>
                </div>
            </nav>
            <div class="px-5 py-2">
                <?php require("./backend/all-users.php") ?>
            </div>
            <div class="px-5 py-2">
                <?php require("./backend/categories.php") ?>
            </div>
            <div class="px-5 py-2">
                <?php require("./backend/product.php") ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <!-- <?php header("location:index.php"); ?> -->
<?php endif ?>