<?php

session_start();

$vehicles = new vehicles();
$checks = new checks();

if (isset($_GET['vehicleId'])) {
    $vehicles->id = $_GET['vehicleId'];
    $vehicleDetails = $vehicles->getVehicleById();
    $checks->id = $_GET['vehicleId'];
    $maintenanceChecks = $checks->getMaintenanceAppointmentsByVehicleId();
    $roadSafetyChecks = $checks->getRoadSafetyAppointmentsByVehicleId();
}