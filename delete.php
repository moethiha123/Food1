<?php
require("./database/db.php");
$id = $_GET["id"];
$tbname = $_GET["tbname"];
$tbid = $_GET["tbid"];
function delete($tbname, $tbid, $id)
{
    global $pdo;
    $sql = "DELETE FROM $tbname WHERE $tbid=:id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $res = $statement->execute();
    if ($res) {
        header('location:admin-dashboard.php');
    }
}
delete($tbname, $tbid, $id);
