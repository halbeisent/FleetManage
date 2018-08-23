<?php
include '../models/database.php';
include '../models/users.php';
include '../controllers/usersListController.php';
include $navbar;
$pageBackground = 'listBG';
$pageTitle = 'Utilisateurs';
include '../header.php';
?>
<div class="container">
    <?php foreach ($usersList as $user) { ?>
        <!-- Modal Structure -->
        <div id="modal<?= $user->id ?>" class="modal">
            <div class="modal-content">
                <h4>Suppression d'utilisateur</h4>
                <p>Êtes-vous sûr(e) de vouloir supprimer cet utilisateur?</p>
            </div>
            <div class="modal-footer">
                <a href="usersList.php?delId=<?= $user->id ?>" class="modal-close waves-effect waves-red btn red">Supprimer</a>
            </div>
        </div>
    <?php } ?>
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
                        <td><a href="#modal<?= $user->id ?>"<i class="material-icons modal-trigger">delete</i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../footer.php'; ?>