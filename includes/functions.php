<?php

namespace App;

use \PDO;


class Functions
{

    // Récupérer les données
    public function getItems(Database $db, string $table)
    {

        $statement = "SELECT * FROM $table";

        return $db->query($statement);
    }

    // Supprimer un enregistrement  
    public function deleteItem(Database $db, string $table, int $id)
    {
        $statement = "DELETE FROM $table WHERE id = ?";

        $query = $db->prepare($statement, [$id], null);
    }

    // Update un enregistrement
    function updateItem($db, $table, $data, $id)
    {

        $set = [];
        foreach ($data as $key => $val) {
            $set[] = "$key = :$key";
        }

        $stmt = $db->prepare("
        UPDATE $table SET " . implode(', ', $set) . " WHERE id = $id
        ");

        $stmt->execute($data);
    }

    // Récupérer un enregistrement par son id

    function getItemById($db, $table, $id)
    {

        $stmt = $db->prepare(
            "SELECT * FROM articles LIMIT 1",
            null,
            false
        );

        $stmt->execute();

        return $stmt->fetch();
    }


    // public function createItem(Database $db, string $table, array $data)
    // {

    //     $keys = implode(', ', array_keys($data));
    //     $placeholders = ':' . implode(', :', array_keys($data));

    //     $statement = "
    //     INSERT INTO $table($keys)
    //     VALUES($placeholders)
    //     ";

    //     $stmt = $db->prepare($statement, $data);

    //     return;
    // }

    public function createItem(Database $db, string $table, array $data)
    {

        $stmt = $db->prepare($this->buildStatement($table, $data), $data);

        $stmt->execute();

        return $stmt;
    }


    // construire le statement INSERT
    function buildStatement(string $table, array $data)
    {
        $keys = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $statement = "
        INSERT INTO $table($keys)
        VALUES($placeholders)
        ";

        return $statement;
    }

    function handleForm(
        Database $db,
        Functions $functions,
        string $table,
        array $fields,
        string $successMsg,
        string $errorMsg
    ) {

        $data = [];

        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $data[$field] = $_POST[$field];
            }
        }


        $stmt = $functions->createItem($db, $table, $data);

        if ($stmt->rowCount() > 0) {
            return $successMsg;
        } else {
            return $errorMsg;
        }
    }
}
