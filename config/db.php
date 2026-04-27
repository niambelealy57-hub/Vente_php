<?php
$conn = new mysqli("localhost", "root", "", "vente_db");

if ($conn->connect_error) {
    die("Erreur connexion");
}
?>