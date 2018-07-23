<?php
include 'models/database.php';
include 'models/users.php';
include 'controllers/loginController.php';
?>
<html lang="fr">
    <head>
        <link rel="stylesheet" type="text/css" href="assets/css/materialize.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/materialize.min.js"></script>
        <title>Fleetmanage - Connexion</title>
    </head>
    <body id="loginBodys">
        <div class="section"></div>
        <main>
            <center>
                <!-- logo du site -->
                <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />
                <div class="section"></div>
                <h5 class="indigo-text">Site interne à l'entreprise, veuillez vous identifier!</h5>
                <div class="section"></div>
                <div class="container">
                    <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                        <form class="col s12" method="POST">
                            <div class="row">
                                <div class="col s12">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input <?= isset($formError['email']) ? 'class="invalid"' : '' ?> type="email" name="email" id="email" />
                                    <label for="email">Adresse mail</label>
                                    <?php if (isset($formError['email'])) { ?>
                                        <span class="helper-text" data-error="<?= $formError['email'] ?>" data-success="right">Message d'erreur email</span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input <?= isset($formError['password']) ? 'class="invalid"' : '' ?> type="password" name="password" id="password" />
                                    <label for="password">Mot de passe</label>
                                    <?php if (isset($formError['password'])) { ?>
                                        <span class="helper-text" data-error="<?= $formError['password'] ?>" data-success="right">Message d'erreur mot de passe</span>
                                    <?php } ?>
                                </div>
                                <?php if (isset($formError['login'])) { ?>
                                    <p><?= $formError['login'] ?></p>
                                <?php } ?>
                                <label id="newUser">
                                    <a class="pink-text" href="views/enroll.php"><b>Nouvel utilisateur ?</b></a>
                                </label>
                            </div>
                            <br />
                            <center>
                                <div class="row">
                                    <button type="submit" name="submit" class="col s12 btn btn-large waves-effect">Connexion</button>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </center>
            <div class="section"></div>
            <div class="section"></div>
        </main>
    </body>
</html>
