<?php
include '../navbar.php';
include '../models/database.php';
include '../models/users.php';
include '../controllers/userDashboardController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../assets/css/materialize.min.css" />
        <link rel="stylesheet" href="../assets/css/style.css" />
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/materialize.min.js"></script>
        <title>Profil utilisateur - FleetManage</title>
    </head>
    <body>
        <p>Bonjour <?= $_SESSION['firstName'] ?></p>
    </body>
</html>