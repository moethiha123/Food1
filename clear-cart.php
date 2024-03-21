<?php
session_start();
// session_destroy();
$deleteCardId = $_GET['id'];
unset($_SESSION['cart'][$deleteCardId]);
header('location:cart.php');
