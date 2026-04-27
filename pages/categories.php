<?php include("../config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Catégories</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: white;
}
.container { margin-top: 40px; }
.card { padding: 20px; border-radius: 15px; }
</style>

</head>
<body>

<div class="container">

<h2 class="text-center mb-4">📂 Gestion des Catégories</h2>
<a href="produits.php" class="btn btn-light mb-3">
Produits
</a>

<!-- BOUTON AJOUT -->
<button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addCat">
➕ Ajouter Catégorie
</button>

<!-- TABLE -->
<div class="card">

<table class="table table-dark text-center">
<tr>
<th>Code</th>
<th>Nom</th>
<th>Actions</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM categories");
while($c = $res->fetch_assoc()){
?>

<tr>
<td><?= $c['code'] ?></td>
<td><?= $c['label'] ?></td>

<td>
<a href="../actions/delete_categorie.php?id=<?= $c['id'] ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Supprimer ?')">🗑️</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

<!-- MODAL AJOUT -->
<div class="modal fade" id="addCat">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5>Ajouter catégorie</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<form action="../actions/add_categorie.php" method="POST">

<div class="modal-body">

<input type="text" name="code" class="form-control mb-2" placeholder="Code (ex: NAT)" required>

<input type="text" name="label" class="form-control mb-2" placeholder="Nom (ex: Naturel)" required>

</div>

<div class="modal-footer">
<button class="btn btn-success">Ajouter</button>
</div>

</form>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>