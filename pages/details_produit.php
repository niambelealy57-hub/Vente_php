<?php include("../config/db.php");

if(!isset($_GET['id'])){
    header("Location: produits.php");
}

$id = $_GET['id'];

$sql = "SELECT p.*, c.label 
FROM produits p 
JOIN categories c ON p.categorie_id = c.id 
WHERE p.id = $id";

$result = $conn->query($sql);
$p = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Détails produit</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    color: white;
}
.card {
    border-radius: 15px;
}
</style>

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h3>📄 Détails du produit</h3>
<hr>

<p><b>ID :</b> <?= $p['id'] ?></p>
<p><b>Nom :</b> <?= $p['nom'] ?></p>
<p><b>Description :</b> <?= $p['description'] ?></p>
<p><b>Quantité :</b> <?= $p['quantite'] ?></p>
<p><b>Prix :</b> <?= $p['prix'] ?> FCFA</p>
<p><b>Catégorie :</b> <?= $p['label'] ?></p>

<br>

<a href="produits.php" class="btn btn-light">⬅ Retour</a>

</div>

</div>

</body>
</html>