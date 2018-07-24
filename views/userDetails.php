<?php
//J'inclus le ma navbar depuis assets
include '../navbar.php';
//J'inclus le modèle database (pour se connecter à la base de données)
include '../models/database.php';
//J'inclus le modèle users pour appeler les méthodes de la classe users
include '../models/users.php';
//J'inclus le controller qui va gérer tout ce qui est variables
include '../controllers/userDetailsController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- CSS Materialize 1.0.0-RC.2 -->
        <link rel="stylesheet" type="text/css" href="../assets/css/materialize.min.css">
        <!-- Material Design icons --> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS Perso -->
        <link rel="stylesheet" href="../assets/css/style.css">
        <!-- Appel du jQuery -->
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <!-- Appel du JS Materialize 1.0.0-RC.2 -->
        <script src="../assets/js/materialize.min.js"></script>
        <title>Edition d'utilisateur - FleetManage</title>
    </head>
    <body>
        <div class="parallax-container center valign-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s12 white-text">
                        <h1 class="pageTitle white-text"><strong>Votre identité</strong></h1>
                    </div>
                </div>
            </div>
            <div class="parallax"><img src="../assets/img/bg/carparkbg.jpg"></div>
        </div>
        <?php if ($addSuccess) { ?>
            <div class="card-content">
                <h2><?= 'Utilisateur bien enregistré !' ?></h2>
            </div>
        <?php } else { ?>
            <!-- Affichage du message de validation -->
            <!-- J'utilise la méthode POST pour protéger le password, je recharge la page avec affichage du message de validation, j'active également l'upload de fichier avec enctype=multipart/form-data -->
            <form method="POST" action="enroll.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input placeholder="Jean" id="firstName" name="firstName" type="text" class="validate" value="$users->firstName" />
                                <label for="firstName">Prénom</label>
                                <p class="error"><?= isset($formError['firstName']) ? $formError['firstName'] : '' ?></p>
                            </div>
                            <div class="input-field col s12 m6 l6 ">
                                <input placeholder="Dupont" id="lastName" name="lastName" type="text" class="validate" value="$users->lastName" />
                                <label for="lastName">Nom</label>
                                <p class="error"><?= isset($formError['lastName']) ? $formError['lastName'] : '' ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input placeholder="05/04/1994" id="birthDate" name="birthDate" type="text" class="datepicker" value="$users->birthDate" />
                                <label for="birthDate">Date de naissance</label>
                                <p class="error"><?= isset($formError['birthDate']) ? $formError['birthDate'] : '' ?></p>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <input placeholder="0607080910" id="phoneNumber" name="phoneNumber" type="text" class="validate" value="$user->phoneNumber" />
                                <label for="phoneNumber">Numéro de téléphone</label>
                                <p class="error"><?= isset($formError['phoneNumber']) ? $formError['phoneNumber'] : '' ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l2">
                                <input placeholder="285" id="streetNumber" name="streetNumber" type="text" class="validate" value="$user->streetNumber" />
                                <label for="streetNumber">Numéro de rue</label>
                                <p class="error"><?= isset($formError['streetNumber']) ? $formError['streetNumber'] : '' ?></p>
                            </div>
                            <div class="input-field col s12 m6 l10">
                                <input placeholder="rue du parc" id="streetName" name="streetName" type="text" class="validate" value="$user->streetName" />
                                <label for="streetName">Nom de rue</label>
                                <p class="error"><?= isset($formError['streetName']) ? $formError['streetName'] : '' ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l2">
                                <input placeholder="60400" id="zipCode" name="zipCode" type="text" class="validate" value="$user->zipCode" />
                                <label for="zipCode">Code postal</label>
                                <p class="error"><?= isset($formError['zipCode']) ? $formError['zipCode'] : '' ?></p>
                            </div>
                            <div class="input-field col s12 m6 l10">
                                <input placeholder="Noyon" id="city" name="city" type="text" class="validate" value="$user->city" />
                                <label for="city">Ville</label>
                                <p class="error"><?= isset($formError['city']) ? $formError['city'] : '' ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="parallax-container center valign-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col s12 white-text">
                                    <h2 class="pageTitle white-text">Vos informations de connexion</h2>
                                </div>
                            </div>
                        </div>
                        <div class="parallax"><img src="../assets/img/bg/loginInfoParallax.jpg"></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input placeholder="adresse@domaine.fr" id="email" name="email" type="email" class="validate" value="$user->email" />
                                <label for="email">Email</label>
                                <p class="error"><?= isset($formError['email']) ? $formError['email'] : '' ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="parallax-container center valign-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col s12 white-text">
                                    <h1 class="pageTitle white-text"><strong>Votre profil conducteur</strong></h1>
                                </div>
                            </div>
                        </div>
                        <div class="parallax"><img src="../assets/img/bg/drivingLicenseParallax.jpg"></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="file-field input-field col s12 m6 l12">
                                <div class="btn">
                                    <span>Scan du permis</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" name="licenseScanPath" id="licenseScanPath" value="$user->licenseScanPath" />
                                </div>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <input placeholder="123456AB" id="licenseNumber" name="licenseNumber" type="text" class="validate" value="$user->licenseNumber" />
                                <label for="licenseNumber">Numéro du permis</label>
                                <p class="error"><?= isset($formError['licenseNumber']) ? $formError['licenseNumber'] : '' ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <label>
                                <input type="checkbox" name="isValid" class="filled-in" value="$user->isValid" />
                                <span>Permis valide?</span>
                            </label>
                        </div>
                        <div class="center valign-wrapper">
                            <div class="row">
                                <button type="submit" name="submit" class="waves-effect waves-light btn">Valider</button>
                                <p class="error"><?= isset($formError['add']) ? $formError['add'] : '' ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
        <script src="../assets/js/script.js"></script>
    </body>
</html>
?>