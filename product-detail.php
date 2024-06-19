<?php
require "./database/db.php";
require "./partials/header.php";
require "./partials/navbar.php";
$product_id = $_GET['id'];
$detail_sql = "SELECT * FROM products WHERE product_id=$product_id";
$s = $pdo->prepare($detail_sql);
$s->execute();
$res = $s->fetch(PDO::FETCH_ASSOC);
// print_r($res);

?>
<div class="container-fluid">
    <div class="row m-2 mt-5 p-0 ">
        <div class="col-4 shadow py-4 ">
            <img src="./Image/<?= $res['photo'] ?>"
                style="width:400px;height:400px;margin:auto;object-fit:cover;object-fit:contain" alt="product-image">
        </div>

        <div class="col-8 shadow py-3 px-5 ">
            <h2 class="mb-5 mt-3 text-danger fw-bold fs-1" >
                <?= $res['name'] ?>
            </h2>
            <p class="mb-3  "><span class="fw-bold me-2 ">Description
                    :</span><?= $res['description'] ?></p>
            <h1 class="text-success mb-4 mt-4 fs-2">Price : <?= $res['price'] ?></h1>
    
            <div class="detail-btns mt-5 d-flex gap-4 float-start">
                <a href="add-to-cart.php?id=<?php echo $res['product_id'] ?>" class="btn btn-default add-to-cart">
                <i class="fa fa-shopping-cart"></i>
                Add to cart</a>
            </div>
        </div>
    </div>
</div>

<script>
const plus = document.getElementById("plus");
const minus = document.getElementById("minus");
const quantity = document.getElementById("quantity");

let no = 1;
plus.addEventListener('click', () => {
    no++;
    quantity.innerText = no;
    console.log(no);
})
minus.addEventListener('click', () => {
    if (no > 1) {
        no--;
        // minus.style.pointerEvents = "none";
    }
    quantity.innerText = no;
    console.log(no);
})
</script>

<?php require "./partials/footer.php" ?>