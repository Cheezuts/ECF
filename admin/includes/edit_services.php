<?php

use App\Database;
use App\Functions;

$functions = new Functions();

// edit_services.php
$id = 1;
$article = $functions->getItemById($db, 'articles', $id);
echo "Requete: $requete";
echo "Params: $params";
echo "Return: $return";

$stmt = $db->prepare($requete, $params, '');



// Formulaire
// if (isset($_POST['update_serv'])) {

//     // Données mises à jour
//     $data = [
//         'titre' => $_POST['titre'],
//         'image' => $_FILES['image']['name'],
//         'contenu' => nl2br($_POST['contenu'])
//     ];

//     // Appel de la fonction update
//     $functions->updateItem($db, 'services', $data, $id);

//     // Redirection
//     header("Location: page.php");
// }

// Affichage du formulaire

// Formulaire comme avant
//echo "<p class='bg-success'>Service mis à jour! <a href='services.php?p_id={$the_serv_id}'>Retour à tous les services</a> ou retourner à l'<a href='index.php'>ACCUEIL</a></p>";

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre</label>
        <input value="<?php echo $article['titre']; ?>" type="text" class="form-control" name="titre">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $article['image']; ?>" alt="">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_content">Contenu</label>
        <textarea class="form-control" name="contenu" id="" cols="30" rows="10"><?php echo str_replace("<br />", "", $article['texte']); ?></textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_serv" value="Editer ">
    </div>


</form>