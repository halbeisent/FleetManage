<?php
include '../navbar.php';
include '../models/database.php';
include '../models/users.php';
include '../controllers/usersListController.php';
$pageBackground = 'listBG';
$pageTitle = 'Utilisateurs';
include '../header.php';
?>
<div class="container">
    <div class="card-panel">
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
                        <td><a href="userDetails.php?id=<?= $user->id ?>"<i class="material-icons">person</i></a></td>
                        <td><a href="usersList.php?delId=<?= $user->id ?>"<i class="material-icons">delete</i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../footer.php'; ?>