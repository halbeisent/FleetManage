<?php
include '../navbar.php';
include '../models/database.php';
include '../models/vehicles.php';
$pageBackground = '';
$pageTitle = 'Dashboard Véhicule';
include '../header.php';
include '../controllers/vehicleDashboardController.php';
?>
<div class="jumbo"></div>
<div class="container icons">
    <div class="big-icon"></div>
    <div class="rate">
        <a  href="vehiclesDetails.php?vehicleId=<?= $vehicles->id ?>" class="like-btn add-btn btn-floating btn-large waves-effect waves-light blue darken-1"><i class="material-icons">edit</i></a>
    </div>
    <div class="add">
        <a class="add-btn btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>
    </div>
</div>
<div class="details">
    <h3><?= $vehicleDetails->manufacturerName . ' ' . $vehicleDetails->modelName ?></h3>
    <p><?= $vehicleDetails->userFirstName . ' ' . $vehicleDetails->userLastName; ?></p>
</div>
<div class="container">
    <div class="section">
        <h5>Informations du véhicule</h5>
        <div class="card-panel">
            <p class="center-align">Numéro de série (VIN): <?= $vehicleDetails->serialNumber ?></p>
            <p class="center-align">Catégorie de véhicule: <?= $vehicleDetails->vehiclesTypes ?></p>
            <p class="center-align">Carburant du véhicule: <?= $vehicleDetails->energies ?></p>
        </div>
    </div>
    <div class="section">
        <h5>Historique du véhicule</h5>
        <div class="card-panel">
            
        </div>
    </div>
</div>