<?php

session_start();

$vehicles = new vehicles();

if (isset($_GET['vehicleId'])) {
    $vehicles->id = $_GET['vehicleId'];
    $vehicleDetails = $vehicles->getVehicleById();
}