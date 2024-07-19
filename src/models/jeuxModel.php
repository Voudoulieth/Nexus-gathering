<?php
// Requête SQL pour récupérer les données
$sql = 'SELECT * FROM jeu';

try {
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    exit;
}
?>
