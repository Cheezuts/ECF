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
}
