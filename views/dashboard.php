<?php
include '../navbar.php';
include '../models/database.php';
include '../models/users.php';
include '../models/vehicles.php';
$pageTitle = 'Dashboard utilisateur - CarPark Manager';
$pageBackground = '';
include '../header.php';
include '../controllers/dashboardController.php';
?>
<div class="jumbo"></div>
<div class="container icons">
    <div class="big-icon"></div>
    <div class="rate">
        <a  href="userDetails.php?userId=<?= $users->id ?>" class="like-btn add-btn btn-floating btn-large waves-effect waves-light blue darken-1"><i class="material-icons">edit</i></a>
    </div>
    <div class="add">
        <a class="add-btn btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>
    </div>
</div>
<div class="details">
    <h3><?= $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] ?></h3>
    <p><?= $userRole; ?></p>
</div>
<div class="container">
    <div class="section">
        <h5>Votre profil</h5>
        <div class="card-panel">
            <p class="center-align">
                <strong>Nom:</strong> <?= $users->lastName ?><br />
                <strong>Prénom:</strong> <?= $users->firstName ?><br />
                <strong>Addresse:</strong> <?= $users->streetNumber ?> <?= $users->streetName ?> <?= $users->zipCode ?> <?= $users->city ?><br />
                <strong>Date de naissance:</strong> <?= $users->birthDate ?><br />
                <strong>Scan du permis:</strong> <?= $users->licenseScanPath ?><br />
                <strong>Numéro du permis:</strong> <?= $users->licenseNumber ?><br />
            </p>
        </div>
    </div>
    <div class="divider"></div>
    <div class="section">
        <h5>Véhicule(s) attribué(s)</h5>
        <div class="row">
            <?php foreach ($vehicleCard as $vehicle) { ?>
                <div class="col s12 m6 l6">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $vehicle->exteriorPic ?>">
                            <span class="card-title"><?= $vehicle->manufacturerName ?> <?= $vehicle->modelName ?></span>
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
    </div>
    <div class="divider"></div>
    <div class="card-panel">
        <table>
            <thead>
            <th>Date du RDV</th>
            <th>Véhicule concerné</th>
            <th>Type de RDV</th>
            </thead>
            <?php foreach ($vehicleCard as $vehicle) { ?>
                <tbody>
                    <tr>
                        <td>05/02/2019</td>
                        <td><?= $vehicle->manufacturerName . ' ' . $vehicle->modelName ?></td>
                        <td>Entretien</td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
<?php
include '../footer.php';
?>