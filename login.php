<?php
session_start();
// DATABAST FILE MUST PUT FIRST
require "./database/db.php";
require "./partials/header.php";

$errors = [];
// CHECK SERVER METHOD
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //echo "yes";
    // isset 
    if (isset($_POST['login'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        // $password = password_hash($password, PASSWORD_BCRYPT);

        empty($email) ? $errors[] = "email required..." : "";
        empty($password) ? $errors[] = "password required..." : "";

        // Give error if email is already existed
        if (count($errors) === 0) {
            // select from database
            $email_check_qry = "SELECT * FROM users WHERE email=:email";
            // add require db.php which contains $pdo
            $statement = $pdo->prepare($email_check_qry);
            // bind 
            $statement->bindParam(":email", $email, PDO::PARAM_STR);
            // execute
            $statement->execute();
            // fetch data of already existed email 
            $res = $statement->fetch();


            if ($email === "admin@gmail.com" && $password === "admin") {
                //add session_start on top of this page
                $_SESSION['admin'] = "admin";
                header("location:admin-dashboard.php");
            } else {
                if ($res) {
                    // if user put email , check whether his email exists in our database by password_verify method
                    // IMPORTANT **********************8
                    if (password_verify($password, $res['password']) && $email === $res['email']) {
                        // IMPORTANT**************
                        $_SESSION['name'] = $res['name'];
                        $_SESSION['photo'] = $res['photo'];
                        // if pass and email are correc , redirect to index(home).php page
                        header("location:index.php");
                    } else {
                        // if pass is wrong , show error with error erray
                        $errors[] = "password do not match";
                    }
                } else {
                    // if res email is not match , shows error
                    $errors[] = "Email not Exist";
                }
            }
        }
    }
}
require "./partials/navbar.php";
?>

<div class="main p-5 ">
    <form action="login.php" class="w-50 m-auto p-5 m-5 shadow" method="post">
        <?php require "./partials/errors.php" ?>
        <h1 class="text-center mb-5">Login Form</h1>
        <div class="mb-3">
            <input type="email" placeholder="Email.." name="email" class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" placeholder="Password.." name="password" class="form-control">
        </div>
        <input type="submit" value="LOGIN" name="login" class="btn btn-primary ">
    </form>
</div>

<?php
require "./partials/footer.php";
?>