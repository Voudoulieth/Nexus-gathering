<?php
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
        default:
            $error_message = 'Une erreur inconnue est survenue.';
            break;
    }
}
?>

