<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Détail du véhicule</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
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
  <nav>
    <div class="nav-wrapper nav-tm3lr">
      <a href="#!" class="brand-logo">Tesla Model 3 Long Range</a>
      <ul class="right hide-on-med-and-down">
          <li><a href="../vehiclesList.php">Accueil</a></li>
        <!-- Dropdown Trigger -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Filtrer par constructeur<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="badges.html">Entretiens à venir</a></li>
      </ul>
    </div>
  </nav>
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="../assets/img/cars/carspics/tm3.jpg"> <!-- random image -->
      </li>
      <li>
        <img src="../assets/img/cars/carspics/tm3inside.jpg"> <!-- random image -->
      </li>
    </ul>
  </div>
  <table>
    <thead>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Utilisateur actuel</td>
        <td>John Doe</td>
      </tr>
      <tr>
        <td>Energie</td>
        <td>Electrique</td>
      </tr>
      <tr>
        <td>Kilométrage</td>
        <td>35250 Kms</td>
      </tr>
      <tr>
        <td>Coût du dernier plein</td>
        <td>25 €</td>
      </tr>
      <tr>
        <td>Prochain Entretien le:</td>
        <td>05/07/2018</td>
      </tr>
      <tr>
        <td>Référence Pneus</td>
        <td>Michelin Pilot Sport 4S 145/65/18</td>
      </tr>
      <tr>
        <td>Usure Pneus</td>
        <td>600 Kms</td>
      </tr>
    </tbody>
  </table>
  <footer class="page-footer nav-tm3lr">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Plan du site</h5>
          <p class="grey-text text-lighten-4"></p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Accueil</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Mentions Légales</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2018 Halbeisen Thibault
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>
  <script src="../assets/js/script.js"></script>
</body>
</html>
