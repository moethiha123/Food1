<?php
//session_start();
$name = isset($_SESSION['name']);
require "./database/db.php";
require "./partials/header.php";
require "./partials/navbar.php";
require "./partials/carousel.php";


function search_query($cid)
{
    global $pdo, $res;
    $sql = "SELECT * FROM products WHERE category_id=:id";
    $s = $pdo->prepare($sql);
    $s->bindParam(":id", $cid, PDO::PARAM_INT);
    $s->execute();
    $res = $s->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

if (isset($_POST['submit'])) {
    $keyword = $_POST['search'];
    $keyword = "%$keyword%";

    $sql = "SELECT * FROM products WHERE name LIKE :keyword;";
    $s = $pdo->prepare($sql);
    $s->bindParam(":keyword", $keyword, PDO::PARAM_STR);
    $s->execute();
    $res = $s->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($res);
    // die();
} elseif (isset($_GET['cid'])) {
    search_query($_GET['cid']);
} else {
    $sql = "SELECT * FROM products";
    $s = $pdo->prepare($sql);
    $s->execute();
    $res = $s->fetchAll(PDO::FETCH_ASSOC);
}

?>



<div class="main p-5 text-center">


    <div class="row g-4">
        <h3 class="text-danger">Products</h3>
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


</div>

<?php
require "./partials/footer.php";
?>