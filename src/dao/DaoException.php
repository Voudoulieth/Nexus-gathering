<?php
declare(strict_types=1);
namespace Nexus_gathering\dao;

class DaoException extends \Exception {
    // Erreur lors de la création d'un message
    public static function fromCreateMessagePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la création d'un message : " . $e->getMessage());
    }
    public static function fromCreateMessageException(\Exception $e) {
        return new self("Erreur lors de la création d'un message : " . $e->getMessage());
    }

    // Erreur lors de la récupération des messages
    public static function fromFetchConversationsPDOException(\Exception $e) {
        return new self("Erreur PDO lors de la récupération des messages : " . $e->getMessage());
    }
    public static function fromFetchConversationsException(\Exception $e) {
        return new self("Erreur lors de la récupération des messages : " . $e->getMessage());
    }

    // Erreur lors de la récupération des conversations
    public static function fromFetchUserConversationsPDOException(\Exception $e) {
        return new self("Erreur PDO lors de la récupération des conversations : " . $e->getMessage());
    }
    public static function fromFetchUserConversationsException(\Exception $e) {
        return new self("Erreur lors de la récupération des conversations : " . $e->getMessage());
    }

    // Erreur lors de la mise à jour d'un message
    public static function fromUpdateMessagePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la mise à jour d'un message : " . $e->getMessage());
    }
    public static function fromUpdateMessageException(\Exception $e) {
        return new self("Erreur lors de la mise à jour d'un message : " . $e->getMessage());
    }

    // Erreur lors de la suppression d'un message
    public static function fromDeleteMessagePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la suppression d'un message : " . $e->getMessage());
    }
    public static function fromDeleteMessageException(\Exception $e) {
        return new self("Erreur lors de la suppression d'un message : " . $e->getMessage());
    }

    // Erreur lors de la création d'une session de Recherche rapide
    public static function fromCreateRechercheRapidePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la création d'une session de Recherche rapide : " . $e->getMessage());
    }
    public static function fromCreateRechercheRapideException(\Exception $e) {
        return new self("Erreur lors de la création d'une session de Recherche rapide : " . $e->getMessage());
    }
    
    // Erreur lors de la récupération d'une session de Recherche rapide
    public static function fromFetchRechercheRapidePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la récupération d'une session de Recherche rapide : " . $e->getMessage());
    }
    public static function fromFetchRechercheRapideException(\Exception $e) {
        return new self("Erreur lors de la récupération d'une session de Recherche rapide : " . $e->getMessage());
    }
    
    // Erreur lors de la mise à jour d'une session de Recherche rapide
    public static function fromUpdateRechercheRapidePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la mise à jour d'une session de Recherche rapide : " . $e->getMessage());
    }
    public static function fromUpdateRechercheRapideException(\Exception $e) {
        return new self("Erreur lors de la mise à jour d'une session de Recherche rapide : " . $e->getMessage());
    }

    // Erreur lors de la cloture d'une session de Recherche rapide
    public static function fromEndRechercheRapidePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la cloture d'une session de Recherche rapide : " . $e->getMessage());
    }
    public static function fromEndRechercheRapideException(\Exception $e) {
        return new self("Erreur lors de la cloture d'une session de Recherche rapide : " . $e->getMessage());
    }
    
    // Erreur lors de la suppression d'une session de Recherche rapide
    public static function fromDeleteRechercheRapidePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la suppression d'une session de Recherche rapide : " . $e->getMessage());
    }
    public static function fromDeleteRechercheRapideException(\Exception $e) {
        return new self("Erreur lors de la suppression d'une session de Recherche rapide : " . $e->getMessage());
    }

    // Erreur lors de la création d'une annonce
    public static function fromCreateAnnoncePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la création d'une annonce : " . $e->getMessage());
    }
    public static function fromCreateAnnonceException(\Exception $e) {
        return new self("Erreur lors de la création d'une annonce : " . $e->getMessage());
    }
    
    // Erreur lors de la récupération d'une annonce
    public static function fromFetchAnnoncePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la récupération d'une annonce : " . $e->getMessage());
    }
    public static function fromFetchAnnonceException(\Exception $e) {
        return new self("Erreur lors de la récupération d'une annonce : " . $e->getMessage());
    }
    
    // Erreur lors de la récupération des annonces
    public static function fromFetchAllAnnoncesPDOException(\Exception $e) {
        return new self("Erreur PDO lors de la récupération des annonces : " . $e->getMessage());
    }
    public static function fromFetchAllAnnoncesException(\Exception $e) {
        return new self("Erreur lors de la récupération des annonces : " . $e->getMessage());
    }
    
    // Erreur lors de la mise à jour d'une annonce
    public static function fromUpdateAnnoncePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la mise à jour d'une annonce : " . $e->getMessage());
    }
    public static function fromUpdateAnnonceException(\Exception $e) {
        return new self("Erreur lors de la mise à jour d'une annonce : " . $e->getMessage());
    }
    
    // Erreur lors de la suppression d'une annonce
    public static function fromDeleteAnnoncePDOException(\Exception $e) {
        return new self("Erreur PDO lors de la suppression d'une annonce : " . $e->getMessage());
    }
    public static function fromDeleteAnnonceException(\Exception $e) {
        return new self("Erreur lors de la suppression d'une annonce : " . $e->getMessage());
    }

    // --- Jeu ---
        // Erreur lors de la création d'un jeu
        public static function fromCreateJeuPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la création d'un jeu : " . $e->getMessage());
        }
        public static function fromCreateJeuException(\Exception $e) {
            return new self("Erreur lors de la création d'un jeu : " . $e->getMessage());
        }
        
        // Erreur lors de la récupération d'un jeu
        public static function fromFetchJeuPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la récupération d'un jeu : " . $e->getMessage());
        }
        public static function fromFetchJeuException(\Exception $e) {
            return new self("Erreur lors de la récupération d'un jeu : " . $e->getMessage());
        }
        
        // Erreur lors de la récupération des jeux
        public static function fromFetchAllJeuxPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la récupération des jeux : " . $e->getMessage());
        }
        public static function fromFetchAllJeuxException(\Exception $e) {
            return new self("Erreur lors de la récupération des jeux : " . $e->getMessage());
        }
        
        // Erreur lors de la mise à jour d'un jeu
        public static function fromUpdateJeuPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la mise à jour d'un jeu : " . $e->getMessage());
        }
        public static function fromUpdateJeuException(\Exception $e) {
            return new self("Erreur lors de la mise à jour d'un jeu : " . $e->getMessage());
        }
        
        // Erreur lors de la suppression d'un jeu
        public static function fromDeleteJeuPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la suppression d'un jeu : " . $e->getMessage());
        }
        public static function fromDeleteJeuException(\Exception $e) {
            return new self("Erreur lors de la suppression d'un jeu : " . $e->getMessage());
        }

        // Erreur lors de la création d'un studio
        public static function fromCreateStudioPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la création d'un studio : " . $e->getMessage());
        }
        public static function fromCreateStudioException(\Exception $e) {
            return new self("Erreur lors de la création d'un studio : " . $e->getMessage());
        }
        
        // Erreur lors de la récupération d'un studio
        public static function fromFetchStudioPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la récupération d'un studio : " . $e->getMessage());
        }
        public static function fromFetchStudioException(\Exception $e) {
            return new self("Erreur lors de la récupération d'un studio : " . $e->getMessage());
        }
        
        // Erreur lors de la récupération des studios
        public static function fromFetchAllStudiosPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la récupération des studios : " . $e->getMessage());
        }
        public static function fromFetchAllStudiosException(\Exception $e) {
            return new self("Erreur lors de la récupération des studios : " . $e->getMessage());
        }
        
        // Erreur lors de la mise à jour d'un studio
        public static function fromUpdateStudioPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la mise à jour d'un studio : " . $e->getMessage());
        }
        public static function fromUpdateStudioException(\Exception $e) {
            return new self("Erreur lors de la mise à jour d'un studio : " . $e->getMessage());
        }
        
        // Erreur lors de la suppression d'un studio
        public static function fromDeleteStudioPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la suppression d'un studio : " . $e->getMessage());
        }
        public static function fromDeleteStudioException(\Exception $e) {
            return new self("Erreur lors de la suppression d'un studio : " . $e->getMessage());
        }

        // Erreur lors de la création d'un editeur
        public static function fromCreateEditeurPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la création d'un editeur : " . $e->getMessage());
        }
        public static function fromCreateEditeurException(\Exception $e) {
            return new self("Erreur lors de la création d'un editeur : " . $e->getMessage());
        }
        
        // Erreur lors de la récupération d'un editeur
        public static function fromFetchEditeurPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la récupération d'un editeur : " . $e->getMessage());
        }
        public static function fromFetchEditeurException(\Exception $e) {
            return new self("Erreur lors de la récupération d'un editeur : " . $e->getMessage());
        }
        
        // Erreur lors de la récupération des studios
        public static function fromFetchAllEditeursPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la récupération des editeurs : " . $e->getMessage());
        }
        public static function fromFetchAllEditeursException(\Exception $e) {
            return new self("Erreur lors de la récupération des editeurs : " . $e->getMessage());
        }
        
        // Erreur lors de la mise à jour d'un editeur
        public static function fromUpdateEditeurPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la mise à jour d'un editeur : " . $e->getMessage());
        }
        public static function fromUpdateEditeurException(\Exception $e) {
            return new self("Erreur lors de la mise à jour d'un editeur : " . $e->getMessage());
        }
        
        // Erreur lors de la suppression d'un editeur
        public static function fromDeleteEditeurPDOException(\Exception $e) {
            return new self("Erreur PDO lors de la suppression d'un editeur : " . $e->getMessage());
        }
        public static function fromDeleteEditeurException(\Exception $e) {
            return new self("Erreur lors de la suppression d'un editeur : " . $e->getMessage());
        }


        //Exception Role Utilisateur
        public static function fromCreateRoleUtilisateurPDOException(\Exception $e){
            return new self("Erreur PDO lors de la création d'un rôle : " . $e->getMessage());
        }
        public static function fromCreateRoleUtilisateurException(\Exception $e){
            return new self("Erreur lors de la création d'un rôle : " . $e->getMessage());
        }
        public static function fromFetchRoleUtilisateurPDOException(\Exception $e){
            return new self("Erreur PDO lors de la récupération du rôle : " . $e->getMessage());
        }
        public static function fromFetchRoleUtilisateurException(\Exception $e){
            return new self("Erreur lors de la récupération du rôle : " . $e->getMessage());
        }
        public static function fromFetchAllRoleUtilisateurPDOException(\Exception $e){
            return new self("Erreur PDO lors de la récupération des rôles : " . $e->getMessage());
        }
        public static function fromFetchAllRoleUtilisateurException(\Exception $e){
            return new self("Erreur lors de la récupération des rôles : " . $e->getMessage());
        }
        public static function fromUpdateRolePDOException(\Exception $e){
            return new self("Erreur PDO lors de la mise à jour du rôle : " . $e->getMessage());
        }
        public static function fromUpdateRoleException(\Exception $e){
            return new self("Erreur lors de la mise à jour du rôle : " . $e->getMessage());
        }
        public static function fromDeleteRolePDOException(\Exception $e){
            return new self("Erreur PDO lors de la suppression du rôle : " . $e->getMessage());
        }
        public static function fromDeleteRoleException(\Exception $e){
            return new self("Erreur lors de la suppression du rôle : " . $e->getMessage());
        }

        // Exception Niveau Utilisateur

        public static function fromCreateNiveauPDOException(\Exception $e){
            return new self("Erreur PDO lors de la création du niveau : " . $e->getMessage());
        }
        public static function fromCreateNiveauException(\Exception $e){
            return new self("Erreur lors de la création du niveau : " . $e->getMessage());
        }
        public static function fromReadNiveauPDOException(\Exception $e){
            return new self("Erreur PDO lors de la récupération du niveau : " . $e->getMessage());
        }
        public static function fromReadNiveauException(\Exception $e){
            return new self("Erreur lors de la récupération du niveau : " . $e->getMessage());
        }

        // Quiz //

    // Exceptions pour la création de quiz
    public static function fromCreateQuiz(\Exception $e) {
        return new self("Erreur lors de la création d'un quiz : " . $e->getMessage());
    }
    // Exceptions pour la sélection d'un quiz par son identifiant
    public static function fromSelectQuizById(\Exception $e) {
        return new self("Erreur lors de la sélection d'un quiz par identifiant : " . $e->getMessage());
    }
    // Exceptions pour la sélection de quiz par catégorie
    public static function fromSelectQuizByCat(\Exception $e) {
        return new self("Erreur lors de la sélection de quiz par catégorie : " . $e->getMessage());
    }
    // Exceptions pour la mise à jour d'un quiz
    public static function fromUpdateQuiz(\Exception $e) {
        return new self("Erreur lors de la mise à jour d'un quiz : " . $e->getMessage());
    }
    // Exceptions pour la suppression d'un quiz
    public static function fromDeleteQuiz(\Exception $e) {
        return new self("Erreur lors de la suppression d'un quiz : " . $e->getMessage());
    }

    // Exceptions pour la création, sélection et gestion des Questions
    public static function fromCreateQuestion(\Exception $e) {
        return new self("Erreur lors de la création d'une question : " . $e->getMessage());
    }
    public static function fromSelectQuestionById(\Exception $e) {
        return new self("Erreur lors de la sélection d'une question par identifiant : " . $e->getMessage());
    }
    public static function fromSelectAllQuestions(\Exception $e) {
        return new self("Erreur lors de la sélection de toutes les questions : " . $e->getMessage());
    }
    public static function fromUpdateQuestion(\Exception $e) {
        return new self("Erreur lors de la mise à jour d'une question : " . $e->getMessage());
    }
    public static function fromDeleteQuestion(\Exception $e) {
        return new self("Erreur lors de la suppression d'une question : " . $e->getMessage());
    }

    // Exceptions pour la création, sélection et gestion des Réponses
    public static function fromCreateReponse(\Exception $e) {
        return new self("Erreur lors de la création d'une réponse : " . $e->getMessage());
    }
    public static function fromSelectReponseById(\Exception $e) {
        return new self("Erreur lors de la sélection d'une réponse par identifiant : " . $e->getMessage());
    }
    public static function fromSelectAllReponse(\Exception $e) {
        return new self("Erreur lors de la sélection de toutes les réponses : " . $e->getMessage());
    }
    public static function fromUpdateReponse(\Exception $e) {
        return new self("Erreur lors de la mise à jour d'une réponse : " . $e->getMessage());
    }
    public static function fromDeleteReponse(\Exception $e) {
        return new self("Erreur lors de la suppression d'une réponse : " . $e->getMessage());
    }

    // Exceptions pour la sélection de Catégories
    public static function fromSelectCategorieById(\Exception $e) {
        return new self("Erreur lors de la sélection d'une catégorie par identifiant : " . $e->getMessage());
    }
    public static function fromSelectAllCategorie(\Exception $e) {
        return new self("Erreur lors de la sélection de toutes les catégories : " . $e->getMessage());
    }

    // Exceptions pour la gestion de JouerQuiz
    public static function fromInsertJouerQuiz(\Exception $e) {
        return new self("Erreur lors de l'insertion d'un record de jouerQuiz : " . $e->getMessage());
    }
    public static function fromSelectJouerQuiz(\Exception $e) {
        return new self("Erreur lors de la sélection d'un record de jouerQuiz : " . $e->getMessage());
    }

}