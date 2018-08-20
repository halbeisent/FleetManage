<?php

/* J'instancie un nouvel objet users */
$users = new users();

/* Si je fais passer un id en paramètre d'URL */
if (isset($_GET['delId'])) {
    /* Je le stocke dans l'objet $users->id */
    $users->id = $_GET['delId'];
    /* Puis j'éxécute ma méthode */
    $userRemoval = $users->deleteUserById();
    /* Si ma requête renvoie true */
    if ($userRemoval) {
        $isDeleted = true;
    }
}

$usersList = $users->getUserList();
