<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>FleetManage_Project_Wip</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.10/angular.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    </head>
    <body>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">PSA</a></li>
            <li><a href="#!">Renault</a></li>
            <li><a href="#!">Tesla Motors</a></li>
        </ul>
        <!-- Materialize navbar -->
        <nav>
            <div class="nav-wrapper generalNavColor">
                <a href="#!" class="brand-logo">FleetManage</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.html">Accueil</a></li>
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Filtrer par constructeur<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="badges.html">Entretiens à venir</a></li>
                </ul>
            </div>
        </nav>
        <!-- Responsive menu display -->
        <ul class="sidenav" id="mobile-demo">
            <li><a href="index.html">Accueil</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Filtrer par constructeur<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a href="mobile.html">Entretiens à venir</a></li>
        </ul>
        <!-- Vehicle cards -->
        <div class="row">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/img/cars/carspics/tm3.jpg">
                        <span class="card-title">Tesla Model 3 Long Range</span>
                    </div>
                    <div class="card-action">
                        <a href="views/tmDetail.php">Gérer ce véhicule</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/img/cars/carspics/208.jpg">
                        <span class="card-title">Peugeot 208</span>
                    </div>
                    <div class="card-action">
                        <a href="views/psaDetail.php">Gérer ce véhicule</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/img/cars/carspics/clio.jpg">
                        <span class="card-title">Renault Clio IV</span>
                    </div>
                    <div class="card-action">
                        <a href="views/rcDetail.php">Gérer ce véhicule</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/img/cars/carspics/megane.jpg">
                        <span class="card-title">Renault Megane IV</span>
                    </div>
                    <div class="card-action">
                        <a href="views/rmDetail.php">Gérer ce véhicule</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>
