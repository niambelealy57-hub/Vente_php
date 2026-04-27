<?php
include 'db.php';

if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];

    $sql = "INSERT INTO categorie (nom) VALUES ('$nom')";
    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Catégorie</title>
</head>
<body>

<h2>Ajouter une catégorie</h2>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom catégorie" required>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

</body>
</html>