<?php
include("../config/db.php");

$id = $_GET['id'];

// SI on clique sur bouton modifier
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];

    $sql = "UPDATE produits SET 
        nom='$nom',
        description='$description',
        quantite='$quantite',
        prix='$prix',
        categorie_id='$categorie'
        WHERE id=$id";

    $conn->query($sql);

    header("Location: ../pages/produits.php");
}

// Récupérer produit actuel
$res = $conn->query("SELECT * FROM produits WHERE id=$id");
$produit = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Modifier produit</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

<div class="container mt-5">
<h3>✏️ Modifier produit</h3>

<form method="POST">

<input type="text" name="nom" value="<?= $produit['nom'] ?>" class="form-control mb-2" required>

<input type="text" name="description" value="<?= $produit['description'] ?>" class="form-control mb-2">

<input type="number" name="quantite" value="<?= $produit['quantite'] ?>" class="form-control mb-2">

<input type="number" name="prix" value="<?= $produit['prix'] ?>" class="form-control mb-2">

<select name="categorie" class="form-control mb-2">

<?php
$cats = $conn->query("SELECT * FROM categories");
while($c = $cats->fetch_assoc()){
    $selected = ($c['id'] == $produit['categorie_id']) ? "selected" : "";
    echo "<option value='".$c['id']."' $selected>".$c['label']."</option>";
}
?>

</select>

<button class="btn btn-warning">Mettre à jour</button>

</form>

</div>
</body>
</html>