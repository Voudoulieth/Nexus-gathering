<?php

namespace Nexus_gathering\src\dao;

class Requetes {
    public const INSERT_MESSAGE = "INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti, date_message) VALUES (?, false, ?, ?, CURRENT_TIMESTAMP)";
}
