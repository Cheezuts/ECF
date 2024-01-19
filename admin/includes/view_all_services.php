<div class="table-responsive">
    <form action="" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <select name="bulk_options" id="bulk_options" class="form-control">
                        <option value="">Selectionnez une option</option>
                        <option value="delete">Supprimer</option>
                        <option value="clone">Cloner</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Appliquer">
                    <a class="btn btn-primary" href="services.php?source=add_services">Ajouter un service</a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><input id="selectAllBoxes" type="checkbox"></th>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Image</th>
                        <th>Contenu</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    use App\Database;
                    use App\Functions;

                    $functions = new Functions();
                    $services = $functions->getItems($db, 'services');

                    foreach ($services as $services) {

                        $id = $services['serv_id'];
                        $titre = $services['serv_titre'];
                        $image = $services['serv_image'];
                        $texte = $services['serv_contenu'];
                        $truncated_text = strlen($services['serv_contenu']) > 50 ? substr($services['serv_contenu'], 0, 50) . "..." : $services['serv_contenu'];

                        echo "<tr>";
                        echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$id'></td>";
                        echo "<td>$id</td>";
                        echo "<td>$titre</td>";
                        echo "<td class='text-center'><img class='img-responsive' width='100' src='$image' alt='image'></td>";
                        echo "<td>$truncated_text</td>";
                        echo "<td class='text-center'><a href='services.php?source=edit_services&p_id=$id'><i class='fa-solid fa-pen fa-2x'></i></a></td>";
                        echo "<td class='text-center'><a onClick=\"javascript: return confirm('etes vous sur de vouloir supprimer ?')\" href='services.php?delete=$id'><i class='fa-solid fa-trash text-danger fa-2x'></i></a></td>";
                        echo "</tr>";
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </form>
</div>

<?php
if (isset($_GET['delete'])) {
    $the_serv_id = escape($_GET['delete']);
    $query = "DELETE FROM services WHERE serv_id = " . escape($the_serv_id);
    $delete_query = mysqli_query($connection, $query);
    header("Location: services.php");
}
?>