<?php

use App\Database;
use App\Functions;

$functions = new Functions();

if (isset($_POST['create_service'])) {

    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];


    $data = [
        'serv_titre' => $titre,
        'serv_contenu' => $contenu
    ];

    $functions->createItem($db, 'services', $data);
    echo "<p class='bg-success'>Service créé ! <a href='services.php?p_id={}'>Retour à tous les services</a> ou retourner à l'<a href='index.php'>ACCUEIL</a></p>";
}


?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="titre">
    </div>



    <div class="form-group">
        <label for="post_content">Contenu</label>
        <textarea class="form-control " name="contenu" id="" cols="30" rows="10"></textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_service" value="Publier">
    </div>


</form>