<?php

session_start();

if  ($_SESSION['roleId'] == 2) {

$vehicles = new vehicles();

$vehiclesList = $vehicles->getVehiclesList();

} else {
    header('Location: errorPage.php');
}

session_write_close();