<?php include("config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestion Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <h2 class="text-center">🛒 Gestion des Produits</h2>

    <a href="pages/produits.php" class="btn btn-primary">Produits</a>
    <a href="pages/categories.php" class="btn btn-success">Catégories</a>
</div>

    <?php
    $cat = mysqli_query($conn, "SELECT * FROM categorie");
    while ($c = mysqli_fetch_assoc($cat)) {
        echo "<option value='".$c['id']."'>".$c['nom']."</option>";
    }
    ?>
</select>

</body>
</html>