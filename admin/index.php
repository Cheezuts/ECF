<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Bienvenue dans l'administation
                        <small></small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->

            <div class="row">


                <!-- compteur des services -->

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="text-bold">Services</div>
                                </div>
                            </div>
                        </div>
                        <a href="services.php">
                            <div class="panel-footer">
                                <span class="pull-left text-bold">Détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- compteur des commentaires -->

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="text-bold">Commentaires</div>
                                </div>
                            </div>
                        </div>
                        <a href="commentaires.php">
                            <div class="panel-footer">
                                <span class="pull-left text-bold">Détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- compteur des utilisateurs -->

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="text-bold">Utilisateurs</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left text-bold">Détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>





                <!-- compteur des voitures -->

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-car fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="text-bold">Voitures</div>
                                </div>
                            </div>
                        </div>
                        <a href="voitures.php">
                            <div class="panel-footer">
                                <span class="pull-left text-bold">Détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- compteur des horaires -->

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-time fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="text-bold">Horaires</div>
                                </div>
                            </div>
                        </div>
                        <a href="horaires.php">
                            <div class="panel-footer">
                                <span class="pull-left text-bold">Détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- compteur des commentaires publier -->
            <!-- affichage table articles colonne id titre image et texte  -->




            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12">
                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



        <?php include "includes/admin_footer.php"; ?>