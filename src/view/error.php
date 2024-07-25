<?php

if (isset($_GET['error'])) {
    $error_message = htmlspecialchars($_GET['error']);
} else {
    $error_message = 'Une erreur inconnue est survenue.';
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur</title>
    <link rel="stylesheet" href="/dist/output.css" />
    <?php include '../view/head.inc.php'; ?>
</head>
<body>
    <?php include '../view/header.inc.php'; ?>
    <div class="container">
        <h1>Erreur</h1>
        <p><?= $error_message ?></p>
        <a href="<?= APP_ROOT ?>/ajout-biblio-generale">Retour au formulaire</a>
    </div>
    <?php include '../view/footer.inc.php'; ?>
</body>
</html>