<?php
$connect = new PDO("mysql:host=localhost;dbname=eco", "root", "");
if (isset($_POST["submit"])) {
    $data = array(
        ':user_id'     => $_POST['user_id'],
        ':rating'  => $_POST['rating'],
        ':description'  => $_POST['description'],
        ':food_id'     => $_POST['food_id']

    );
    $query = "INSERT INTO reviews2 (user_id,rating,description,food_id) VALUES (:user_id,:rating,:description,:food_id)";
    $statement = $connect->prepare($query);
    $res = $statement->execute($data);
    if ($res) {
        header('location:index.php');
    }
    echo "Your Review & Rating Successfully Submitted";
}
