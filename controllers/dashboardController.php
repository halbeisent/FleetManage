<?php
session_start();

$users = new users();

$vehicles = new vehicles();

$userRole = '';

if (isset($_SESSION['userId'])) {
    $users->id = $_SESSION['userId'];
    $detailedUserProfile = $users->getUserbyId();
    $vehicles->userId = $_SESSION['userId'];
    $vehicleCard = $vehicles->getVehicleByUser();
}



if ($_SESSION['roleId'] == 3) {
    $userRole = 'Utilisateur';
} else if($_SESSION['roleId'] == 2) {
    $userRole = 'Gestionnaire de parc';
} else if($_SESSION['roleId'] == 1) {
    $userRole = 'Administrateur';
}

session_write_close();
