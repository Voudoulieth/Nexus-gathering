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
    <link rel="stylesheet" href="/dist/output.css" />
    <title>Erreur - Nexus Gathering</title>
</head>
<body>
    <main>
        <div class="text-center pt-5">
            <h1 class="font-['Changa'] text-[4.5em] p-5">Une erreur est survenue</h1>
            <p class="text-[0.875em]">
                <?= htmlspecialchars($_GET['error'] ?? 'Erreur inconnue') ?>
            </p>
        </div>
    </main>
</body>
</html>