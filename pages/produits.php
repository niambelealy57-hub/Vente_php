<?php include("../config/db.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Produits</title>
<a href="categories.php" class="btn btn-light mb-3">📂 Catégories</a>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="../assets/js/script.js" defer></script>

<style>
body {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    color: white;
}

.card {
    background: rgba(255,255,255,0.05);
    border-radius: 15px;
    backdrop-filter: blur(10px);
}

.table {
    border-radius: 10px;
    overflow: hidden;
}

input, select {
    border-radius: 10px !important;
}

.btn {
    border-radius: 10px;
}

h2 {
    font-weight: bold;
}
</style>

</head>

<body>

<div class="container mt-5">

<!-- HEADER -->
<div class="text-center mb-4">
    <h2>🛒 Gestion des Produits</h2>
    <p class="text-light">Application moderne de gestion</p>
</div>

<!-- FILTRES -->
<div class="card p-3 mb-4">
    <div class="row">
        <div class="col-md-6">
            <input type="text" id="search" class="form-control" placeholder="🔍 Rechercher produit...">
        </div>

        <div class="col-md-6">
        <select id="categoryFilter" class="form-control">
            <option value="">Toutes les catégories</option>

                <?php
                    $cats = $conn->query("SELECT * FROM categories");
                    while($c = $cats->fetch_assoc()){
                    echo "<option value='".strtolower($c['label'])."'>".$c['label']."</option>";
                    }
                ?>

        </select>
        </div>
    </div>
</div>
<button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
➕ Ajouter Produit
</button>
<!-- TABLE -->
<div class="card p-3">


<table class="table table-dark table-hover text-center">
<thead class="table-secondary text-dark">
<tr>
<th>Nom</th>
<th>Description</th>
<th>Qté</th>
<th>Prix</th>
<th>Catégorie</th>
<th>Actions</th>
</tr>
</thead>

<tbody>
<?php
$res = $conn->query("SELECT p.*, c.label FROM produits p 
JOIN categories c ON p.categorie_id=c.id");

while($row = $res->fetch_assoc()){
?>
<tr>
<td><?= $row['nom'] ?></td>
<td><?= $row['description'] ?></td>
<td><?= $row['quantite'] ?></td>
<td><?= $row['prix'] ?> FCFA</td>
<td class="categorie"><?= strtolower($row['label']) ?></td>

<td>

<a href="details_produit.php?id=<?= $row['id'] ?>" 
class="btn btn-info btn-sm">👁️</a>

<a href="../actions/update_produit.php?id=<?= $row['id'] ?>" 
class="btn btn-warning btn-sm">✏️</a>

<a href="../actions/delete_produit.php?id=<?= $row['id'] ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Supprimer ?')">🗑️</a>

</td>
</tr>
<?php } ?>
</tbody>

</table>

</div>

</div>
<div class="modal fade" id="addModal" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Ajouter Produit</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<form action="../actions/add_produit.php" method="POST">

<div class="modal-body">

<input type="text" name="nom" class="form-control mb-2" placeholder="Nom" required>

<input type="text" name="description" class="form-control mb-2" placeholder="Description">

<input type="number" name="quantite" class="form-control mb-2" placeholder="Quantité">

<input type="number" name="prix" class="form-control mb-2" placeholder="Prix">

<select name="categorie" class="form-control mb-2">
<?php
$cats = $conn->query("SELECT * FROM categories");
while($c = $cats->fetch_assoc()){
echo "<option value='{$c['id']}'>{$c['label']}</option>";
}
?>
</select>

</div>

<div class="modal-footer">
<button class="btn btn-success">Ajouter</button>
</div>

</form>

</div>
</div>
</div>
<!-- MODAL -->
<div class="modal fade" id="addModal">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5>Ajouter Produit</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
Test modal OK 👍
</div>

</div>
</div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>