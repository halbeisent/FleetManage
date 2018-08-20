<?php
include '../navbar.php';
include '../models/database.php';
include '../models/vehicles.php';
include '../controllers/vehiclesListController.php';
$pageBackground = '';
$pageTitle = 'Liste des véhicules';
include '../header.php';
?>
<div class="container">
    <?php foreach ($vehiclesList as $vehicle) { ?>
        <div class="col s12 m6 l6">
            <div class="card">
                <div class="card-image">
                    <img src="<?= $vehicle->exteriorPic ?>">
                    <span class="card-title"><?= $vehicle->manufacturerName . ' ' . $vehicle->modelName ?></span>
                </div>
                <div class="card-action">
                    <div class="row">
                        <div class="action-btn col"><a class="btn-floating btn-large blue-grey darken-3" href="vehicleDashboard.php?vehicleId=<?= $vehicle->vehicleId ?>"><i class="material-icons">dashboard</i></a></div>
                        <div class="action-btn col"><a class="btn-floating btn-large blue-grey darken-3" href="vehicleHistory.php?vehicleId=<?= $vehicle->vehicleId ?>"><i class="material-icons">history</i></a></div>
                        <?php if ($_SESSION['roleId'] == 2) { ?>
                            <div class="action-btn col"><a class="btn-floating btn-large blue-grey darken-3" href="vehicleForm.php?vehicleId=<?= $vehicle->vehicleId ?>"><i class="material-icons">edit</i></a></div>
                            <div class="action-btn col"><a class="btn-floating btn-large red" href="dashboard.php?delVehicle=<?= $vehicle->vehicleId ?>"><i class="material-icons">delete</i></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
