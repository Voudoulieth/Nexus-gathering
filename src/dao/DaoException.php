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

}