<?php
include '../navbar.php';
include '../models/database.php';
include '../models/users.php';
include '../controllers/usersListController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" href="../assets/css/materialize.min.css" />
        <link rel="stylesheet" href="../assets/css/style.css" />
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/materialize.min.js"></script>
    </head>
    <body id="listBG">
        <div class="container">
            <div class="card-body">
                <table class="responsive-table striped bordered table-users">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Détails</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersList as $user) { ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->lastName ?></td>
                                <td><?= $user->firstName ?></td>
                                <td><?= $user->mailAddress ?></td>
                                <td><a href="dashboard.php?id=<?= $user->id ?>"<i class="material-icons">person</i></a></td>
                                <td><a href="usersList.php?delId=<?= $user->id ?>"<i class="material-icons">delete</i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script src="../assets/js/script.js"></script>
</html>