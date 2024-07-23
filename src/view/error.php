<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$error_message = 'Une erreur inconnue est survenue.';

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'creation_jeu_failed':
            $error_message = 'La création du jeu a échoué.';
            break;
        case 'update_jeu_failed':
            $error_message = 'La mise à jour du jeu a échoué.';
            break;
        case 'delete_jeu_failed':
            $error_message = 'La suppression du jeu a échoué.';
            break;
        case 'jeu_not_found':
            $error_message = 'Jeu non trouvé.';
            break;
        case 'creation_studio_failed':
            $error_message = 'La création du studio a échoué.';
            break;
        case 'update_studio_failed':
            $error_message = 'La mise à jour du studio a échoué.';
            break;
        case 'delete_studio_failed':
            $error_message = 'La suppression du studio a échoué.';
            break;
        case 'studio_not_found':
            $error_message = 'Studio non trouvé.';
            break;
        case 'creation_editeur_failed':
            $error_message = 'La création de l\'éditeur a échoué.';
            break;
        case 'update_editeur_failed':
            $error_message = 'La mise à jour de l\'éditeur a échoué.';
            break;
        case 'delete_editeur_failed':
            $error_message = 'La suppression de l\'éditeur a échoué.';
            break;
        case 'editeur_not_found':
            $error_message = 'Éditeur non trouvé.';
            break;
        case 'missing_fields':
            $error_message = 'Veuillez remplir tous les champs obligatoires.';
            break;
        default:
            $error_message = 'Une erreur inconnue est survenue.';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur</title>
    <link rel="stylesheet" href="../dist/output.css" />
</head>
<body>
    <div class="container">
        <h1>Erreur</h1>
        <p><?= $error_message ?></p>
        <a href="<?= APP_ROOT ?>/ajout-biblio-generale">Retour au formulaire</a>
    </div>
</body>
</html>