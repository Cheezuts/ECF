<?php include_once 'includes/header.php'; ?>
<!-- Navigation -->
<?php include_once 'includes/navigation.php'; ?>




<!-- Page Content -->
<div class="container-fluid">

    <div class="row">

        <div class="col-md-3 col-md-push-8 col-sm-12">

            <!-- Formulaire de connexion -->
            <div class="well">
                <h4 class="text-center">Connection :</h4>

                <form action="includes/login.php" method="post" class="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_email" placeholder="Votre email">
                    </div>

                    <div class="input-group">
                        <input name="user_password" type="password" class="form-control" placeholder="Mot de passe">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Envoyer
                            </button>
                        </span>
                    </div>
                </form>
                <!-- Votre formulaire de connexion ici -->
            </div>
        </div>

    </div>

    <div class="row mb-4"">

        <div class=" col-md-8 col-md-offset-2 col-sm-12"">

        <!-- Contenu -->
        <div class=" well">
            <!-- Votre contenu ici -->


            <h1 class="page-header text-center">

            </h1>

            <!-- Service -->

            <hr>

            <img class="img-responsive center-block" src="/" alt="">

            <hr>
            <p class="well">

                <?php


                use App\Database;
                use App\Functions;

                $functions = new Functions();
                $services = $functions->getItems($db, 'services');
                foreach ($services as $service) {

                    echo '<div class="row">';

                    echo '<div class="col-md-4">';

                    echo '<p>';
                    echo $service['serv_titre'];
                    echo '</p>';

                    echo '<img class="img-responsive center-block" src="', $service['serv_image'], '" alt="">';

                    echo nl2br($service['serv_contenu']);

                    echo '</div>';

                    echo '</div>';
                }
                ?>

            </p>
            <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
            <hr>

        </div>


        <hr>
        <!-- Pagination -->

        <ul class="pager">
        </ul>



        <!-- Commentaires -->
        <h1 class="text-center">Avis : </h1>
        <!-- Posted Comments -->

        <div class="well">

            <h4></h4>
            <p></p>
            <div class="rating"></div>
        </div>
    </div>
</div>


<h2 class="text-center">Horaires</h2>
</div>

<!-- Footer -->
<?php include_once 'includes/footer.php'; ?>
</div>
<!-- fin container-fluid -->