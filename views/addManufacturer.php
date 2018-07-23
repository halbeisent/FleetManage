<?php
// J'inclus ma navbar en Materialize
include '../navbar.php';
// J'inclus mon modèle pour la connection à la base de données
include '../models/database.php';
// J'inclus mon modèle véhicule pour la gestion des véhicules
include '../models/vehicles.php';
// J'inclus mon controller pour ajouter une marque, modèle ainsi que l'année de production associée à ce modèle
include '../controllers/addManufacturerModelProdYear.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../assets/css/materialize.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" href="../assets/css/style.css" />
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/materialize.min.js"></script>
        <title>Ajout de modèles de véhicules - FleetManage</title>
    </head>
    <body>
        <form method="POST" action="addManufacturer.php">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input placeholder="Renault" id="manufacturer" name="manufacturer" type="text" class="validate" />
                            <label for="manufacturer">Constructeur</label>
                            <p class="error"><?= isset($formError['manufacturer']) ? $formError['manufacturer'] : '' ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input placeholder="Clio" id="model" name="model" type="text" class="validate" />
                            <label for="model">Modèle</label>
                            <p class="error"><?= isset($formError['model']) ? $formError['model'] : '' ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input placeholder="2018" id="model" name="productionYear" type="text" class="validate" />
                            <label for="productionYear">Année de production</label>
                            <p class="error"><?= isset($formError['productionYear']) ? $formError['productionYear'] : '' ?></p>
                        </div>
                    </div>
                </div>
                <div class="center valign-wrapper">
                    <div class="row">
                        <button type="submit" name="submit" class="waves-effect waves-light btn">Valider</button>
                        <p class="error"><?= isset($formError['add']) ? $formError['add'] : '' ?></p>
                    </div>
                </div>
            </div>
        </form>
        <script src="../assets/js/script.js"></script>
    </body>
</html>