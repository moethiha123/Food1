<?php
session_start();
$name = isset($_SESSION['name']);
require "./database/db.php";




function search_query($cid)
{
    global $pdo, $res;
    $sql = "SELECT * FROM products WHERE category_id=:id";
    $s = $pdo->prepare($sql);
    $s->bindParam(":id", $cid, PDO::PARAM_INT);
    $s->execute();
    $record_per_page = 5; // Number of items to display per page
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $start_page = ($page - 1) * $record_per_page;
    $user_qry = "SELECT * FROM products WHERE name LIKE :keyword LIMIT :start_page,:record_per_page ";
    $s = $pdo->prepare($user_qry);
    $s->bindParam(":keyword", $keyword, PDO::PARAM_STR);
    $s->bindParam(":start_page", $start_page, PDO::PARAM_INT);
    $s->bindParam(":record_per_page", $record_per_page, PDO::PARAM_INT);
    $s->execute();
    $res = $s->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

if (isset($_POST['submit'])) {
    $keyword = $_POST['search'];
    $keyword = "%$keyword%";
    $record_per_page = 5; // Number of items to display per page
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $start_page = ($page - 1) * $record_per_page;
    $user_qry = "SELECT * FROM products WHERE name LIKE :keyword";
    $s = $pdo->prepare($user_qry);
    $s->bindParam(":keyword", $keyword, PDO::PARAM_STR);
    // $s->bindParam(":start_page", $start_page, PDO::PARAM_INT);
    // $s->bindParam(":record_per_page", $record_per_page, PDO::PARAM_INT);
    $s->execute();
    $res = $s->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($res);
    // die();
} elseif (isset($_GET['cid'])) {
    search_query($_GET['cid']);
} else {

    $qry = "SELECT * FROM products";
    $s = $pdo->prepare($qry);
    $s->execute();
    $res = $s->fetchAll(PDO::FETCH_ASSOC);
    // print_r($res);
    // $record_per_page = 5; // Number of items to display per page
    // $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    // $start_page = ($page - 1) * $record_per_page;
    // $user_qry = "SELECT * FROM products LIMIT :start_page,:record_per_page";
    // $s = $pdo->prepare($user_qry);
    // $s->bindParam(":start_page", $start_page, PDO::PARAM_INT);
    // $s->bindParam(":record_per_page", $record_per_page, PDO::PARAM_INT);
    // $s->execute();
    // $res = $s->fetchAll(PDO::FETCH_ASSOC);
}
require "./partials/header.php";
require "./partials/navbar.php";
require "./partials/carousel.php";
?>


<div class="main p-5 text-center">
    <div class="row g-4">
        <h3 class="text-danger">Foods</h3>
        <?php foreach ($res as $key => $value) : ?>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card ">
                    <div class="bg-image hover-overlay ripple overflow-hidden shadow" data-mdb-ripple-color="light">
                        <img src="./Image/<?= $value['photo'] ?>" class="img-fluid" style="width:100%;height:300px;object-fit:cover;" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body shadow">
                        <h5 class="card-title mb-3"><?= $value['name'] ?></h5>
                        <!-- create new product detail file -->
                        <a href="product-detail.php?id=<?= $value['product_id'] ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <section id="team" class="sectionpadding">
        <div class="container">
            <div class="row text-center py-5">
                <h2>Our Restaurant Admin</h2>
                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Sunt quaerat soluta facilis nihil modi
                provident
                esse, doloribus repellendus corrupti ea.</p> -->
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center p-2">
                        <img src="ic/team-1.jpg" alt="" class="rounded-circle m-auto" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <p>Jack Wilson</p>
                            <p>He is the our restaurant owner.His Name is Jack Wilson.He opened our Restaurant in 2023
                                January.</p>
                            <div class="icons">
                                <i class="bi bi-facebook fs-4 me-2"></i>
                                <i class="bi bi-twitter fs-4 me-2"></i>
                                <i class="bi bi-Instaagram fs-4 me-2"></i>
                                <i class="bi bi-linkedin fs-4 me-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center p-2">
                        <img src="ic/download.jfif" alt="" class="rounded-circle m-auto" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <p>Jack</p>
                            <p>He is the chef leader in our restaurant.He has born in 1972 December.He is the famous
                                chef
                                leader in the world.</p>
                            <div class="icons">
                                <i class="bi bi-facebook fs-4 me-2"></i>
                                <i class="bi bi-twitter fs-4 me-2"></i>
                                <i class="bi bi-Instaagram fs-4 me-2"></i>
                                <i class="bi bi-linkedin fs-4 me-2"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center p-2">
                        <img src="ic/team-4.jpg" alt="" class="rounded-circle m-auto" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <p>Aizbel</p>
                            <p>She is the our restaurant Manager.Her Age is 22.She is borned in February 2002.She worked
                                our
                                restaurant in 2023 september.</p>
                            <div class="icons">
                                <i class="bi bi-facebook fs-4 me-2"></i>
                                <i class="bi bi-twitter fs-4 me-2"></i>
                                <i class="bi bi-Instaagram fs-4 me-2"></i>
                                <i class="bi bi-linkedin fs-4 me-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center p-2">
                        <img src="./images/download (1).jfif" alt="" class="rounded-circle m-auto" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <p>Jack</p>
                            <p>He is the good waiter in our restaurant.He has born in 1979 December.He is the famous
                                waiter
                                in the world.</p>
                            <div class="icons">
                                <i class="bi bi-facebook fs-4 me-2"></i>
                                <i class="bi bi-twitter fs-4 me-2"></i>
                                <i class="bi bi-Instaagram fs-4 me-2"></i>
                                <i class="bi bi-linkedin fs-4 me-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="w-50 m-auto p-5 text-center shadow-lg mt-5">
            <h2>Reviews</h2>
            <form action="customer-review.php" method="post">
                <input type="hidden" class="form-control" name="user_id" value="3">
                <input type="hidden" class="form-control" name="food_id" value="1">
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" id=""></textarea>
                </div>
                <div class="mb-3">

                    <label for="">rating</label>
                    <input type="range" name="rating" min="1" max="5" value="1">
                </div>
                <input type="submit" value="submit" name="submit">
            </form>
        </div>









        <?php require "./partials/footer.php" ?>