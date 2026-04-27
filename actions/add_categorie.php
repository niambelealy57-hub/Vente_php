<?php
include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $code = $_POST['code'];
    $label = $_POST['label'];

    $sql = "INSERT INTO categories (code, label)
            VALUES ('$code', '$label')";

    $conn->query($sql);

    header("Location: ../pages/categories.php");
}
?>