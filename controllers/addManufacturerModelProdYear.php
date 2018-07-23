<?php

$vehicles = new vehicles();

// Déclaration des RegEx pour les différents champs
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';

// J'initialise la variable addSuccess en False pour vérifier le bon ajout
$addSuccess = false;

// J'initialise la variable formError sous forme de tableau à vide
$formError = array();

if (!empty($_POST['manufacturer']) && isset($_POST['manufacturer'])) {
    if (preg_match($regexName, $_POST['manufacturer'])) {
        $vehicles->manufacturerName = htmlspecialchars($_POST['manufacturer']);
    } else {
        $formError['manufacturer'] = 'Le nom de marque saisi ne doit comporter que des lettres';
    }
} else {
    $formError['manufacturer'] = 'Champ obligatoire';
}

if (!empty($_POST['model']) && isset($_POST['model'])) {
    if (preg_match($regexName, $_POST['model'])) {
        $vehicles->modelName = htmlspecialchars($_POST['model']);
    } else {
        $formError['model'] = 'Le nom de marque saisi ne doit comporter que des lettres';
    }
} else {
    $formError['model'] = 'Champ obligatoire';
}

if (!empty($_POST['productionYear']) && isset($_POST['productionYear'])) {
    $vehicles->productionYear = htmlspecialchars($_POST['productionYear']);
} else {
    $formError['productionYear'] = 'La saisie est obligatoire';
}

if (count($formError) == 0 && isset($_POST['submit'])) {
    if (!$vehicles->addVehicleManufacturerModelProdYear()) {
        $formError['add'] = 'L\'envoi du formulaire a échoué';
    } else {
        $addSuccess = true;
    }
}