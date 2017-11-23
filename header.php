<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <!--font family via le web pas intégrer dans les fichiers-->
    <link href="https://fonts.googleapis.com/css?family=Nosifer" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!--script de base-->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/popper.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>

    <!--pour Plugin dataTable-->
    <link rel="stylesheet" type="text/css" href="DataTables-1.10.16/datatables.css">
    <!--ce trouve à la fin avant le body-->
    <!--<script type="text/javascript" src="DataTables-1.10.16/datatables.min.js"></script>-->

    <!--mon css et js perso-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--mes fichiers perso js    en pied de page  -->

    <title>Liste des courses</title>
</head>

<body>

<header>
<!--Barre de navigation haute-->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light">

    <!--titre gauche de navBar-->
    <a class="navbar-brand" href="index.php">Liste Courses</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--menu-->
    <!--<div class="navbar-expand" id="navbarsExampleDefault">-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <!--menu simple-->
            <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#licornes">Nos licornes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#trouver">Nous trouver</a>
            </li>

            <!--menu accordeon-->
            <!--<li class="nav-item dropdown">-->
                <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--Dropdown-->
                <!--</a>-->
                <!--<div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                    <!--<a class="dropdown-item" href="#">Action</a>-->
                    <!--<a class="dropdown-item" href="#">Another action</a>-->
                    <!--<div class="dropdown-divider"></div>-->
                    <!--<a class="dropdown-item" href="#">Something else here</a>-->
                <!--</div>-->
            <!--</li>-->
        </ul>

        <!-- formulaire recherche sur la droite de la barre-->
        <!--<form class="form-inline my-2 my-lg-0">-->
            <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
            <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--</form>-->
    </div>
</nav>


<!--<div class="jumbotron container">-->
    <!--<div class="container">-->

        <!--<h1 class="display-3 titre text-center">Nature verte</h1>-->
        <!--<p class="text-center">T-->
            <!--his is a template for a simple marketing or informational website. It includes a-->
            <!--large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to-->
            <!--create something more unique.-->
        <!--</p>-->
    <!--</div>-->

    <!--&lt;!&ndash; Button trigger modal &ndash;&gt;-->
    <!--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">-->
        <!--modal Box-->
    <!--</button>-->

    <!--&lt;!&ndash; Modal &ndash;&gt;-->
    <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"-->
         <!--aria-hidden="true">-->
        <!--<div class="modal-dialog" role="document">-->
            <!--<div class="modal-content">-->
                <!--<div class="modal-header">-->
                    <!--<h5 class="modal-title" id="newsletter">Newsletters</h5>-->
                    <!--<form action="" method="post">-->
                        <!--&lt;!&ndash;<div class="modal-body">&ndash;&gt;-->

                        <!--&lt;!&ndash;</div>&ndash;&gt;-->
                        <!--<div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>-->
                            <!--<input type="text" id="" name="" placeholder="your@email.com">-->
                        <!--</div>-->
                        <!--<br>-->
                        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>-->
                        <!--<input type="submit" value="Valider" class="btn btn-large btn-success">-->
                    <!--</form>-->
                <!--</div>-->

                <!--&lt;!&ndash;<div class="modal-footer">&ndash;&gt;-->

                <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->

<!--</div>-->

</header>
