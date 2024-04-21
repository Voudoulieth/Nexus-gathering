<?php
declare(strict_types=1);
namespace Nexus_gathering\dao;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoException;

class Database {

    private static \PDO $db;

    public static function getConnection() : \PDO {
        if (!isset(self::$db)) {
            if (file_exists("../param.ini")) {
                $param = parse_ini_file("../param.ini", true);
                extract($param['BDD']);       
            } 
            else throw new DaoException("Parametre BDD indisponibles",8001);
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            self::$db = new \PDO($dsn, $user, $password);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }
}