<?php
session_start();
$deleteCardId = $_GET['id'];
unset($_SESSION['cart'][$deleteCardId]);
header('location:cart.php');
