<?php

$users = new users();


if (isset($_GET['delId'])) {
    $users->id = $_GET['delId'];
    $userRemoval = $users->deleteUserById();
    if ($userRemoval) {
        $isDeleted = true;
    }
}

$usersList = $users->getUserList();
