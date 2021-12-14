<?php 
require_once "database.php";

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$sql = $pdo->prepare('DELETE FROM products WHERE id = :id');
$sql->bindValue(':id', $id);
$sql->execute();
header('Location: index.php');