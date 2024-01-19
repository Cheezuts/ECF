<?php

namespace App;

use \PDO;
use Exception;

class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host=localhost;dbname=ecf;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            return $pdo;
        }

        return $this->pdo;
    }

    // ...
    public function query($statement, $class_name = null, $one = false, $params = [])
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($params);

        if ($class_name === null) {
            // Utiliser un tableau associatif si aucune classe n'est spécifiée
            if ($one) {
                $data = $req->fetch(PDO::FETCH_ASSOC);
            } else {
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
            }
        } else {
            $req->setFetchMode(PDO::FETCH_OBJ);

            if ($one) {
                $data = $req->fetch();
            } else {
                $data = $req->fetchAll();
            }
        }

        return $data;
    }








    // public function prepare($statement, $attributes, $class_name, $one = false)
    // {
    //     $req = $this->getPDO()->prepare($statement);
    //     $req->execute($attributes);
    //     $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

    //     if ($one) {
    //         $datas = $req->fetch();
    //     } else {
    //         $datas = $req->fetchAll();
    //     }

    //     return $datas;
    // }
    // function prepare($statement, $attributes)
    // {
    //     $pdo = $this->getPDO();
    //     $stmt = $pdo->prepare($statement);
    //     $stmt->execute($attributes);

    //     if (preg_match("/LIMIT 1$/i", $statement)) {
    //         // Requête de fetch unique
    //         return $stmt->fetch(PDO::FETCH_ASSOC);
    //     }

    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     return $stmt->fetchAll();
    // }

    function prepare($statement, $attributes)
    {
        $pdo = $this->getPDO();

        $stmt = $pdo->prepare($statement);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $statement);
        }

        $stmt->execute($attributes);

        if (preg_match("/LIMIT 1$/i", $statement)) {
            // Requête de fetch unique  
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt;
    }
}
