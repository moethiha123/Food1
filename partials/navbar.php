<?php
// session_start();
if (isset($_SESSION['cart'])) {
    $carts = $_SESSION['cart'];
    $total = 0;
    foreach ($carts as $id => $qty) {
        $total += $qty;
    }
};

?>

<?php // session_start() ; already declared at index.php
$auth = isset($_SESSION['name']);
$photo = isset($_SESSION['photo']);
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="./img/mdb-transaprent-noshadows.webp" height="15" alt="MDB Logo" loading="lazy" />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="project.php">Projects</a>
                </li>
                <div class="dropdown">
                    <a class=" nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                        aria-expanded="false">Categories</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                        $sql = "SELECT * FROM categories";
                        $s = $pdo->prepare($sql);
                        $s->execute();
                        $res = $s->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($res as $key => $value) { ?>
                        <li>
                            <a class="dropdown-item"
                                href="index.php?cid=<?= $value['category_id'] ?>"><?= $value['name'] ?></a>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
            </ul>

            <form class="d-flex me-4" action="index.php" method="post" role="search">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
            </form>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <li><a href="cart.php"><i class="fa fa-shopping-cart " style="color:blue;"></i> <span
                        class="cart-count me-2"><?php echo $total ?? ''  ?></span> </a></li>
            <!-- Notifications -->
            <div class="dropdown">
                <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>



            </div>
            <!-- Avatar -->
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">

                    <?php if ($photo) : ?>
                    <img src="./Image/<?= $_SESSION['photo']; ?>" class="rounded-circle" width="25" height="25"
                        alt="Black and White Portrait of a Man" loading="lazy" />
                    <?php else : ?>
                    <img src="./img/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man"
                        loading="lazy" />
                    <?php endif ?>

                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <?php if ($auth) : ?>
                    <li>
                        <a class="dropdown-item" href="profile.php"><?php echo $_SESSION['name']; ?></a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </li>
                    <?php else : ?>
                    <li>
                        <a class="dropdown-item" href="login.php">Login</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="register.php">Register</a>
                    </li>
                    <?php endif ?>

                </ul>
            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->