<?php

namespace Nexus_gathering\dao;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

class Requetes {
    public const INSERT_MESSAGE = "INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti, date_message) VALUES (?, false, ?, ?, CURRENT_TIMESTAMP)";
    public const SELECT_JEU = "SELECT id_jeu, nom_jeu, resum_jeu, img_jeu, multi, id_stu, id_ed, id_form, id_genre, id_plat FROM jeux";
}

