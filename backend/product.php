<h3 id="products" class="mb-4 text-danger">Products</h3>
<a href="create-product.php" class="btn btn-primary ">Create Food</a>
<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
        <tr class="text-primary">
            <th>ProductId</th>
            <th>Name</th>
            <th>Feature</th>
            <th>Description</th>
            <th>Price</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $record_per_page = 5; // Number of items to display per page
        $page = isset($_GET['pagep']) ? intval($_GET['pagep']) : 1;
        $start_page = ($page - 1) * $record_per_page;
        $product_qry = "SELECT * FROM products ORDER BY product_id DESC LIMIT :start_page,:record_per_page  ";
        $s = $pdo->prepare($product_qry);
        $s->bindParam(":start_page", $start_page, PDO::PARAM_INT);
        $s->bindParam(":record_per_page", $record_per_page, PDO::PARAM_INT);
        $s->execute();
        $allProducts = $s->fetchAll(PDO::FETCH_ASSOC);

        foreach ($allProducts as $key => $product) :
        ?>
        <tr>
            <td>
                <?php echo $product['product_id'];  ?>
            </td>
            <td>
                <p class="fw-bold mb-1"><?= $product['name'] ?></p>
            </td>
            <td>
                <p class="fw-bold mb-1"><?= $product['is_featured'] === 1 ? 'Featured' : 'Not Featured' ?></p>
            </td>
            <td>
                <p class="fw-normal mb-1"><?= $product['description'] ?></p>
            </td>
            <td>
                <p class="fw-bold mb-1"><?= $product['price'] ?></p>
            </td>
            <td>
                <img src="./Image/<?= $product['photo'] ?>" alt="" style="width: 50px;height:50px;object-fit:cover;"
                    class="rounded-circle" />
            </td>
            <td class="d-flex">
                <a href="product-edit.php?id=<?= $product['product_id'] ?>" class="btn btn-sm btn-primary me-2">Edit</a>
                <a href="delete.php?id=<?= $product['product_id'] ?>&tbname=products&tbid=product_id"
                    class="btn btn-sm btn-danger" onclick="alert('are you sure?')">Delete</a>
            </td>
        </tr>
    </tbody>
    <?php endforeach ?>
</table>

<div class="pagination m-auto " style="width: fit-content;">
    <?php
    $page_qry = "SELECT * FROM products ORDER BY product_id DESC";
    $page_res = $pdo->prepare($page_qry);
    $page_res->execute();
    $total_records = $page_res->rowCount();
    // print_r($total_records);
    // die();
    $total_pages = ceil($total_records / $record_per_page);
    echo '<div>';
    if ($page > 1) {
        echo '<a href="?pagep=' . ($page - 1) . '">Previous</a> ';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i === $page) {
            echo '<span>' . $i . '</span> ';
        } else {
            echo '<a href="?pagep=' . $i . '">' . $i . '</a> ';
        }
    }
    if ($page < $total_pages) {
        echo '<a href="?pagep=' . ($page + 1) . '">Next</a>';
    }
    echo '</div>';
    ?>
</div>