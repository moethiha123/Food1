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
    $user_qry = "SELECT * FROM products WHERE name LIKE :keyword LIMIT :start_page,:record_per_page ";
    $s = $pdo->prepare($user_qry);
    $s->bindParam(":keyword", $keyword, PDO::PARAM_STR);
    $s->bindParam(":start_page", $start_page, PDO::PARAM_INT);
    $s->bindParam(":record_per_page", $record_per_page, PDO::PARAM_INT);
    $s->execute();
    $res = $s->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($res);
    // die();
} elseif (isset($_GET['cid'])) {
    search_query($_GET['cid']);
} else {
    $record_per_page = 5; // Number of items to display per page
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $start_page = ($page - 1) * $record_per_page;
    $user_qry = "SELECT * FROM products LIMIT :start_page,:record_per_page";
    $s = $pdo->prepare($user_qry);
    $s->bindParam(":start_page", $start_page, PDO::PARAM_INT);
    $s->bindParam(":record_per_page", $record_per_page, PDO::PARAM_INT);
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

    <div class="pagination m-auto " style="width: fit-content;">

    <?php

    $page_qry = "SELECT * FROM products ORDER BY product_id DESC";
    $page_res = $pdo->prepare($page_qry);
    $page_res->execute();
    $total_records = $page_res->rowCount();
    $record_per_page = $record_per_page ?? 1;
    // print_r($total_records);
    // die();
    $total_pages = ceil($total_records / $record_per_page);
    echo '<div>';
    if ($page > 1) {
        echo '<a href="?page=' . ($page - 1) . '">Previous</a> ';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i === $page) {
            echo '<span>' . $i . '</span> ';
        } else {
            echo '<a href="?page=' . $i . '">' . $i . '</a> ';
        }
    }
    if ($page < $total_pages) {
        echo '<a href="?page=' . ($page + 1) . '">Next</a>';
    }
    echo '</div>';
    ?>



</div>

</div>

<?php
require "./partials/footer.php";
?>