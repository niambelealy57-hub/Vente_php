<?php
include("../config/db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $conn->query("DELETE FROM produits WHERE id=$id");
}

header("Location: ../pages/produits.php");
exit;
?>