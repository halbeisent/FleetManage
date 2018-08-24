<?php

session_start();

if ($_SESSION['roleId'] == 2) {
    $navbar = '../navbarParkManager.php';
}

$vehicles = new vehicles();

$formError = array();

$updateSuccess = false;

if (isset($_GET['vehicleId'])) {
    $vehicles->id = $_GET['vehicleId'];
    $vehicleDetails = $vehicles->getVehicleById();
    $energiesList = $vehicles->getEnergiesList();
    $vehicleTypesList = $vehicles->getVehiclesTypesList();
    $modelsList = $vehicles->getModelsList();
    $manufacturersList = $vehicles->getManufacturersList();
    $users = new users();
    $usersList = $users->getUserList();


    $updateSuccess = false;

    if (isset($_POST['submit'])) {

        if (!empty($_POST['serialNumber'])) {
            $vehicles->serialNumber = htmlspecialchars($_POST['serialNumber']);
        } else {
            $formError['serialNumber'] = 'Champ obligatoire';
        }

        if (!empty($_POST['firstRegistrationDate'])) {
            $vehicles->firstRegistrationDate = htmlspecialchars($_POST['firstRegistrationDate']);
        } else {
            $formError['firstRegistrationDate'] = 'Sélection obligatoire';
        }

        if (!empty($_POST['modelSelector'])) {
            $vehicles->vehicleModels = htmlspecialchars($_POST['modelSelector']);
        } else {
            $formError['modelSelector'] = 'Sélection obligatoire';
        }

        if (!empty($_POST['manufacturerSelector'])) {
            $vehicles->vehicleManufacturers = htmlspecialchars($_POST['manufacturerSelector']);
        } else {
            $formError['manufacturerSelector'] = 'Sélection obligatoire';
        }

        if (!empty($_POST['userSelector'])) {
            $vehicles->users = htmlspecialchars($_POST['userSelector']);
        } else {
            $formError['userSelector'] = 'Sélection obligatoire';
        }

        if (!empty($_POST['typeSelector'])) {
            $vehicles->vehicleTypes = htmlspecialchars($_POST['typeSelector']);
        } else {
            $formError['typeSelector'] = 'Sélection obligatoire';
        }

        if (!empty($_POST['energySelector'])) {
            $vehicles->energies = htmlspecialchars($_POST['energySelector']);
        } else {
            $formError['energySelector'] = 'Sélection obligatoire';
        }

        if (!empty($_POST['interiorPic'])) {
            $vehicles->interiorPic = htmlspecialchars($_POST['interiorPic']);
        } else {
            $formError['interiorPic'] = 'Saisie obligatoire';
        }

        if (!empty($_POST['exteriorPic'])) {
            $vehicles->exteriorPic = htmlspecialchars($_POST['exteriorPic']);
        } else {
            $formError['exteriorPic'] = 'Saisie obligatoire';
        }
        if (count($formError) == 0) {
            if (!$vehicles->updateVehicle()) {
                $formError['add'] = 'L\'envoi du formulaire a échoué';
            } else {
                $updateSuccess = true;
            }
        }
    }
}

session_write_close();
