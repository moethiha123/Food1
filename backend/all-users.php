<h3 id="" class="mb-4 text-danger">All Users</h3>
<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
        <tr class="text-primary">
            <th>UserId</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $record_per_page = 5; // Number of items to display per page
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $start_page = ($page - 1) * $record_per_page;
        $user_qry = "SELECT * FROM users LIMIT :start_page,:record_per_page";
        $s = $pdo->prepare($user_qry);
        $s->bindParam(":start_page", $start_page, PDO::PARAM_INT);
        $s->bindParam(":record_per_page", $record_per_page, PDO::PARAM_INT);
        $s->execute();
        $allUsers = $s->fetchAll(PDO::FETCH_ASSOC);

        foreach ($allUsers as $key => $user) :
        ?>
            <tr>
                <td>
                    <?php echo $user['user_id'];  ?>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="./Image/<?= $user['photo'] ?>" alt="" style="width: 45px; height: 45px;object-fit:cover;" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1"><?= $user['name'] ?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1"><?= $user['email'] ?></p>

                </td>
                <td>
                    <p class="fw-normal mb-1"><?= $user['address'] ?></p>
                </td>
                <td>
                    <!-- carry id by edit link -->
                    <a href="user-edit.php?id=<?= $user['user_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="delete.php?id=<?= $user['user_id'] ?>&tbname=users&tbid=user_id" class="btn btn-sm btn-danger" onclick="alert('are you sure?')">Delete</a>
                </td>
            </tr>
    </tbody>
<?php endforeach ?>
</table>

<div class="pagination m-auto " style="width: fit-content;">
    <?php
    $page_qry = "SELECT * FROM users ORDER BY user_id DESC";
    $page_res = $pdo->prepare($page_qry);
    $page_res->execute();
    $total_records = $page_res->rowCount();
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