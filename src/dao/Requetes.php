<?php

namespace Nexus_gathering\dao;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

class Requetes {
    public const INSERT_MESSAGE = "INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti, date_message) VALUES (?, false, ?, ?, CURRENT_TIMESTAMP)";
    public const SELECT_MESSAGE = "SELECT * FROM Messages WHERE id_exped = ? OR id_desti = ?";
    public const SELECT_CONV = "SELECT * FROM Messages WHERE (id_exped = ? AND id_desti = ?) OR (id_exped = ? AND id_desti = ?) ORDER BY date_message ASC";
    public const SELECT_CONTACT = "SELECT u.id_user, u.nom_user, MAX(m.date_message) AS last_message_date
    FROM Messages m
    JOIN Utilisateur u ON u.id_user = m.id_exped OR u.id_user = m.id_desti
    WHERE (m.id_exped = :userId OR m.id_desti = :userId) AND u.id_user != :userId
    GROUP BY u.id_user, u.nom_user
    ORDER BY last_message_date DESC";    
    public const UPDATE_MESSAGE = "UPDATE Messages SET contenu_mess = ?, modif = true WHERE id_message = ?";
    public const DELETE_MESSAGE = "DELETE FROM Messages WHERE id_message = ?";

    public const INSERT_RECHERCHE_RAPIDE = "INSERT INTO rechercheRapide (id_user, id_jeu, deb_session) VALUES (?, ?, NOW())";
    public const SELECT_RECHERCHE_RAPIDE = "SELECT rr.id_session, u.nom_user AS nom, rr.deb_session, rr.fin_session
    FROM rechercheRapide rr
    JOIN utilisateur u ON rr.id_user = u.id_user
    WHERE rr.id_jeu = ? AND (rr.fin_session IS NULL OR rr.fin_session >= NOW())
    AND (rr.fin_session IS NULL OR TIMESTAMPDIFF(HOUR, rr.deb_session, rr.fin_session) <= 6)
    ORDER BY rr.id_session DESC";
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

    public const INSERT_JEU = "INSERT INTO jeu (nom_jeu, resum_jeu, img_jeu, multi, id_ed, id_user, id_stu) VALUES (:nom_jeu, :resum_jeu, :img_jeu, :multi, :id_ed, :id_user, :id_stu)";
    public const SELECT_jEU = "SELECT * FROM jeu WHERE id_jeu = :id_jeu";
    public const SELECT_ALL_JEU = "SELECT * FROM jeu";
    public const UPDATE_JEU = "UPDATE jeu SET nom_jeu = :nom_jeu, resum_jeu = :resum_jeu, img_jeu = :img_jeu, multi = :multi, id_ed = :id_ed, id_user = :id_user, id_stu = :id_stu WHERE id_jeu = :id_jeu";
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
}

