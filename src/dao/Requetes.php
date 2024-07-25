<?php

namespace Nexus_gathering\dao;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

class Requetes {
    public const INSERT_MESSAGE = "INSERT INTO Messages (contenu_mess, id_exped, id_desti, modif) VALUES (?, ?, ?, ?)";
    public const SELECT_CONV = "SELECT Messages.*, Utilisateur.nom_user FROM Messages 
    JOIN Utilisateur ON Messages.id_exped = Utilisateur.id_user
    WHERE (id_exped = ? AND id_desti = ?) OR (id_exped = ? AND id_desti = ?) 
    ORDER BY date_message ASC";

    public const SELECT_CONTACT = "SELECT u.id_user, u.nom_user, u.avatar, MAX(m.date_message) AS last_message_date
    FROM Messages m
    JOIN Utilisateur u ON u.id_user = m.id_exped OR u.id_user = m.id_desti
    WHERE (m.id_exped = :userId OR m.id_desti = :userId) AND u.id_user != :userId
    GROUP BY u.id_user, u.nom_user, u.avatar
    ORDER BY last_message_date DESC";

    public const SELECT_CONTACT_NAME = "SELECT nom_user FROM Utilisateur WHERE id_user = :idContact";
    public const SELECT_CONTACT_AVATAR = "SELECT avatar FROM Utilisateur WHERE id_user = :idContact";


    public const UPDATE_MESSAGE = "UPDATE Messages SET contenu_mess = ?, modif = true WHERE id_message = ?";
    public const DELETE_MESSAGE = "DELETE FROM Messages WHERE id_message = ?";

    public const INSERT_RECHERCHE_RAPIDE = "INSERT INTO rechercheRapide (id_user, id_jeu, deb_session) VALUES (?, ?, NOW())";
    public const SELECT_RECHERCHE_RAPIDE = "SELECT rr.id_session, u.nom_user AS nom, rr.deb_session, rr.fin_session
    FROM rechercheRapide rr
    JOIN utilisateur u ON rr.id_user = u.id_user
    WHERE rr.id_jeu = ? AND (rr.fin_session IS NULL OR rr.fin_session >= NOW())
    AND (rr.fin_session IS NULL OR TIMESTAMPDIFF(HOUR, rr.deb_session, rr.fin_session) <= 6)
    ORDER BY rr.id_session DESC";
    
    public const SELECT_CARROUSSEL = "SELECT id_jeu, nom_jeu, img_jeu FROM jeu ORDER BY id_jeu DESC LIMIT 5";

    public const UPDATE_RECHERCHE_RAPIDE = "UPDATE rechercheRapide SET id_jeu = ?, fin_session = CASE
    WHEN TIMESTAMPDIFF(HOUR, deb_session, NOW()) <= 6 THEN fin_session
    ELSE NOW()
    END
    WHERE id_session = ? AND (fin_session IS NULL OR fin_session >= NOW())";
    public const END_RECHERCHE_RAPIDE = "UPDATE rechercheRapide SET fin_session = NOW() WHERE id_session = ?";
    public const DELETE_RECHERCHE_RAPIDE = "DELETE FROM rechercheRapide WHERE id_session = ?";

    public const CREATE_ANNONCE = "INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES (?, ?, ?, ?, ?)";
    public const READ_ANNONCE = "SELECT * FROM Annonce WHERE id_annonce = ?";
    public const READ_ALL_ANNONCE = "SELECT * FROM Annonce ORDER BY date_annonce ASC";
    public const UPDATE_ANNONCE = "UPDATE Annonce SET nom_annonce = ?, nb_user = ?, desc_annonce = ?, id_user = ?, id_jeu = ? WHERE id_annonce = ?";
    public const DELETE_ANNONCE = "DELETE FROM Annonce WHERE id_annonce = ?";

    public const INSERT_JEU = "INSERT INTO jeu (nom_jeu, resum_jeu, img_jeu, multi, date_sortie, style) VALUES (:nom_jeu, :resum_jeu, :img_jeu, :multi, :date_sortie, :style)";
    public const SELECT_JEU = "SELECT * FROM jeu WHERE id_jeu = :id_jeu";
    public const SELECT_ALL_JEU = "SELECT * FROM jeu";
    public const UPDATE_JEU = "UPDATE jeu SET nom_jeu = :nom_jeu, resum_jeu = :resum_jeu, img_jeu = :img_jeu, multi = :multi, date_sortie = :date_sortie, style = :style WHERE id_jeu = :id_jeu";
    public const DELETE_JEU = "DELETE FROM jeu WHERE id_jeu = :id_jeu";

    public const INSERT_STUDIO = "INSERT INTO studio (nom_stu, id_ed) VALUES (:nom_stu, :id_ed)";
    public const SELECT_STUDIO = "SELECT * FROM studio WHERE id_stu = :id_stu";
    public const SELECT_ALL_STUDIO = "SELECT * FROM studio";
    public const UPDATE_STUDIO = "UPDATE studio SET nom_stu = :nom_stu, id_ed = :id_ed WHERE id_stu = :id_stu";
    public const DELETE_STUDIO = "DELETE FROM studio WHERE id_stu = :id_stu";

    public const INSERT_EDITEUR = "INSERT INTO editeur (nom_ed) VALUES (:nom_ed)";
    public const SELECT_EDITEUR = "SELECT * FROM editeur WHERE id_ed = :id_ed";
    public const SELECT_ALL_EDITEUR = "SELECT * FROM editeur";
    public const UPDATE_EDITEUR = "UPDATE editeur SET nom_ed = :nom_ed WHERE id_ed = :id_ed";
    public const DELETE_EDITEUR = "DELETE FROM editeur WHERE id_ed = :id_ed";


        // Requête Role utilisateur //
    public const INSERT_ROLE = "INSERT INTO RoleUtilisateur (nom_role) VALUES (nom_role)" ;
    public const READ_ROLE = "SELECT * FROM RoleUtilisateur WHERE id_role = id_role";
    public const READ_ALL_ROLE = "SELECT * FROM RoleUtilisateur";
    public const UPDATE_ROLE = "UPDATE RoleUtilisateur SET nom_role = nom_role WHERE id_role = id_role";
    public const DELETE_ROLE = "SELECT * FROM RoleUtilisateur WHERE id_role = id_role";

        // Requête Niveau utilisateur //

    public const INSERT_NIVEAU = "INSERT INTO NiveauUtilisateur (nom_niveau, description) VALUES (nom_niveau, description)" ;
    public const READ_NIVEAU = "SELECT * FROM NiveauUtilisateur WHERE id_niveau = id_niveau";
    public const READ_ALL_NIVEAU = "SELECT * FROM NiveauUtilisateur" ;
    public const UPDATE_NIVEAU = "UPDATE NiveauUtilisateur SET nom_niveau = nom_niveau, description = description WHERE id_niveau = id_niveau";
    public const DELETE_NIVEAU = "DELETE FROM NiveauUtilisateur WHERE id_niveau = id_niveau" ;

        // Requête Utilisateur //

    public const INSERT_USER ="INSERT INTO Utilisateur (nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES (nom_user, mot_de_passe, avatar, mail, age, id_role)" ;
    public const READ_USER = "SELECT * FROM Utilisateur WHERE id_user = id_user";
    public const READ_ALL_USER = "SELECT * FROM Utilisateur";
    public const UPDATE_USER = "UPDATE Utilisateur SET nom_user = nom_user, mot_de_passe = mot_de_passe, avatar = avatar, mail = mail, age = age, id_role = id_role WHERE id_user = id_user";
    public const DELETE_USER = "DELETE FROM Utilisateur WHERE id_user = id_user";


        // Requêtes Quiz //

    // Insertion d'un nouveau quiz
    public const INSERT_QUIZ = "INSERT INTO Quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz, date_quiz) VALUES (?, ?, ?, ?, NOW())";
    // Sélection d'un quiz spécifique par son identifiant
    public const SELECT_QUIZ = "SELECT * FROM Quiz WHERE id_quiz = ?";
    // Sélection d'un quiz spécifique par sa catégorie, 1=communautaire 2=officiel
    public const SELECT_CAT_QUIZ = "SELECT * FROM Quiz WHERE id_cat_quiz = ?";
    // Sélection de tous les quiz par ordre decroissant de publication
    public const SELECT_ALL_QUIZ = "SELECT * FROM Quiz ORDER BY date_quiz DESC";
    // Mise à jour d'un quiz
    public const UPDATE_QUIZ = "UPDATE Quiz SET id_cat_quiz = ?, id_user = ?, titre_quiz = ? WHERE id_quiz = ?";
    // Suppression d'un quiz
    public const DELETE_QUIZ = "DELETE FROM Quiz WHERE id_quiz = ?";

    // CRUD Questions
    public const INSERT_QUESTION = "INSERT INTO Question (id_quiz, question_quiz) VALUES (?, ?)";
    public const SELECT_QUESTION = "SELECT * FROM Question WHERE id_question = ?";
    public const SELECT_ALL_QUESTIONS_FROM_QUIZ = "SELECT * FROM Question WHERE id_quiz = ? ORDER BY id_question ASC";
    public const UPDATE_QUESTION = "UPDATE Question SET question_quiz = ? WHERE id_question = ?";
    public const DELETE_QUESTION = "DELETE FROM Question WHERE id_question = ?";

    // CRUD Reponses
    public const INSERT_REPONSE = "INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (?, ?, ?)";
    public const SELECT_REPONSE = "SELECT * FROM reponse WHERE id_reponse = ?";
    public const SELECT_ALL_REPONSES_FROM_QUESTION = "SELECT * FROM reponse WHERE id_question = ? ORDER BY id_reponse ASC";
    public const UPDATE_REPONSE = "UPDATE reponse SET reponse_quiz = ?, reponse_vraie_quiz = ? WHERE id_reponse = ?";
    public const DELETE_REPONSE = "DELETE FROM reponse WHERE id_reponse = ?";

    //CRUD Categorie
    // On ne peut que sélectionner les catégories, la modification est interdite, il n'en existe que 2 qui ne sont pas destinées à changer
    public const SELECT_CATEGORIE = "SELECT * FROM categorie WHERE id_cat_quiz = ?";
    public const SELECT_ALL_CATEGORIES = "SELECT * FROM categorie ORDER BY id_cat_quiz";

    //CRUD JouerQuiz
    //Insertion d'un nouveau record de jeu :
    public const INSERT_JOUERQUIZ = "INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (?, ?, ?)";
    //Sélection d'un record spécifique par id_quiz et id_user :
    public const SELECT_JOUERQUIZ = "SELECT * FROM jouerQuiz WHERE id_quiz = ? AND id_user = ?";
    //Sélection de tous les jeux d'un utilisateur spécifique :
    public const SELECT_ALL_JOUERQUIZ_BY_USER = "SELECT * FROM jouerQuiz WHERE id_user = ? ORDER BY date_jouerQuiz DESC";

}