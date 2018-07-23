<?php

/* On crée une class users qui hérite de la classe database via extends
 */

class users extends database {

    public $id = '';
    public $mailAddress = '';
    public $password = '';
    public $lastName = '';
    public $firstName = '';
    public $birthDate = '';
    public $licenseScanPath = '';
    public $isValid = '';

    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    public function addUser() {
        $addQuery = 'INSERT INTO `g2c6d_users` (`mailAddress`, `password`, `lastName`, `firstName`, `birthDate`, `licenseScanPath`, `licenseNumber`, `isValid`, `streetNumber`, `streetName`, `zipCode`, `city`) VALUES (:mailAddress, :password, :lastName, :firstName, :birthDate, :licenseScanPath, :licenseNumber, :isValid, :streetNumber, :streetName, :zipCode, :city)';
        $addUser = $this->database->prepare($addQuery);
        $addUser->bindValue(':mailAddress', $this->mailAddress, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $addUser->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $addUser->bindValue(':birthDate', $this->birthDate, PDO::PARAM_STR);
        $addUser->bindValue(':licenseScanPath', $this->licenseScanPath, PDO::PARAM_STR);
        $addUser->bindValue(':licenseNumber', $this->licenseNumber, PDO::PARAM_STR);
        $addUser->bindValue(':isValid', $this->isValid, PDO::PARAM_STR);
        $addUser->bindValue(':streetNumber', $this->streetNumber, PDO::PARAM_STR);
        $addUser->bindValue(':streetName', $this->streetName, PDO::PARAM_STR);
        $addUser->bindValue(':zipCode', $this->zipCode, PDO::PARAM_STR);
        $addUser->bindValue(':city', $this->city, PDO::PARAM_STR);
        return $addUser->execute();
    }

    public function updateUser() {
        $updateQuery = 'UPDATE `g2c6d_users` SET `mailAddress` = :mailAddress, `password` = :password, `lastName` = :lastName, `firstName` = :firstName, `birthDate` = :birthDate, `licenseScanPath` = :licenseScanPath, `licenseNumber` = :licenseNumber, `isValid` = :isValid WHERE `id` = :id';
        $userUpdate = $this->database->prepare($updateQuery);
        $userUpdate->bindValue(':mailAddress', $this->mailAddress, PDO::PARAM_STR);
        $userUpdate->bindValue(':password', $this->password, PDO::PARAM_STR);
        $userUpdate->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $userUpdate->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $userUpdate->bindValue(':birthDate', $this->birthDate, PDO::PARAM_STR);
        $userUpdate->bindValue(':licenseScanPath', $this->licenseScanPath, PDO::PARAM_STR);
        $userUpdate->bindValue(':licenseNumber', $this->licenseNumber, PDO::PARAM_STR);
        $userUpdate->bindValue(':isValid', $this->isValid, PDO::PARAM_STR);
        return $userUpdate->execute();
    }

    public function getHashByMail() {
        $checkQuery = 'SELECT `password` FROM `g2c6d_users` WHERE `mailAddress` = :mailAddress';
        $loginCheck = $this->database->prepare($checkQuery);
        $loginCheck->bindValue(':mailAddress', $this->mailAddress, PDO::PARAM_STR);
        if ($loginCheck->execute()) {
            $checkResult = $loginCheck->fetch(PDO::FETCH_OBJ);
        } else {
            $checkResult = 'Un problème est survenu, si le problème persiste, contactez l\'administrateur';
        }
        return $checkResult;
    }

    public function getUserByMail() {
        $userQuery = 'SELECT `lastName`, `firstName`, `id` FROM `g2c6d_users` WHERE `mailAddress` = :mailAddress';
        $user = $this->database->prepare($userQuery);
        $user->bindValue(':mailAddress', $this->mailAddress, PDO::PARAM_STR);
        if ($user->execute()) {
            $userParams = $user->fetch(PDO::FETCH_OBJ);
            $this->id = $userParams->id;
            $this->lastName = $userParams->lastName;
            $this->firstName = $userParams->firstName;
            $errorMsg = 'La requête s\'est bien exécutée';
        } else {
            $errorMsg = 'Un problème est survenu, si le problème persiste, contactez l\'administrateur';
        }
        return $errorMsg;
    }

    public function deleteUserById() {
        $userQuery = 'DELETE FROM `g2c6d_users` WHERE `id` = :id';
        $user = $this->database->prepare($userQuery);
        $user->bindValue(':id', $userparams->id, PDO::PARAM_STR);
        $user->execute();
    }

    public function __destruct() {
        // On appelle le __destruct() du parent via "parent::""
        parent::__destruct();
        }

}
