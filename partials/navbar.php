<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Food Order Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>






                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['name'] ?? "Member" ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (isset($_SESSION['name'])) :  ?>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        <?php if (isset($_SESSION['admin'])) : ?>
                        <li><a class="dropdown-item" href="admin-dashboard.php">Dashboard</a></li>
                        <?php endif ?>

                        <?php else : ?>
                        <li><a class="dropdown-item" href="register.php">Register</a></li>
                        <li><a class="dropdown-item" href="login.php">LogIn</a></li>

                        <?php endif ?>


                    </ul>
                </li>

            </ul>
            <form class="d-flex" action="index.php" method="post" role="Search">
                <input class="form-control me-2" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" name="submit">Search</button>
            </form>

        </div>
    </div>
</nav>