<?php
include("../config/db.php");

$id = $_GET['id'];
$conn->query("DELETE FROM produits WHERE id=$id");

header("Location: ../pages/produits.php");
?>