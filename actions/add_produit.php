<?php
include("../config/db.php");

$nom = $_POST['nom'];
$desc = $_POST['description'];
$qte = $_POST['quantite'];
$prix = $_POST['prix'];
$cat = $_POST['categorie'];

$sql = "INSERT INTO produits (nom, description, quantite, prix, categorie_id)
VALUES ('$nom','$desc','$qte','$prix','$cat')";

$conn->query($sql);

header("Location: ../pages/produits.php");
?>