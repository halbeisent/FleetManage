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
        $addQuery = 'INSERT INTO `g2c6d_users` (`mailAddress`, `password`, `lastName`, `firstName`, `birthDate`, `licenseScanPath`, `licenseNumber`, `isValid`, `streetNumber`, `streetName`, `zipCode`, `city`, `userGroups`) VALUES (:mailAddress, :password, :lastName, :firstName, :birthDate, :licenseScanPath, :licenseNumber, :isValid, :streetNumber, :streetName, :zipCode, :city, 3)';
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

    //Génération de la liste utilisateurs
    public function getUserList() {
        $userQuery = 'SELECT `id`, `firstName`, `lastName`, `mailAddress` FROM `g2c6d_users`';
        $listQuery = $this->database->query($userQuery);
        $queryResult = $listQuery->fetchAll(PDO::FETCH_OBJ);
        return $queryResult;
    }
    
     public function getUserById() {
        $isCorrect = false;
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table patients l'id est egal à :id via marqueur nominatif sur id
        $query = 'SELECT `id`, `lastName`, `firstName`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthDate, `licenseScanPath`, `licenseNumber`, `isValid`, `streetNumber`, `streetName`, `zipCode`, `city` FROM `g2c6d_users` WHERE `id` = :userId';
        // On crée un objet $findProfil qui utilise la fonction prepare avec comme paramètre $query        
        $findProfile = $this->database->prepare($query);
        // on attribue la valeur via bindValue et on recupère les attributs de la classe via $this
        $findProfile->bindValue(':userId', $this->id, PDO::PARAM_INT);
        if ($findProfile->execute()) {
            $profile = $findProfile->fetch(PDO::FETCH_OBJ);
            // if imbriqué pour hydrater les valeurs
            // si $profil est un objet(existe dans la table), on attribue directement les valeurs de l'objet $profil
            if (is_object($profile)) {
                $this->lastName = $profile->lastName;
                $this->firstName = $profile->firstName;
                $this->birthDate = $profile->birthdDate;
                $this->mailAddress = $profile->mailAddress;
                $isCorrect = true;
            }
        }
        return $isCorrect;
    }

    public function deleteUserById() {
        $userQuery = 'DELETE FROM `g2c6d_users` WHERE `id` = :id';
        $userDelete = $this->database->prepare($userQuery);
        $userDelete->bindValue(':id', $this->id, PDO::PARAM_STR);
        return $userDelete->execute();
    }

    public function __destruct() {
        // On appelle le __destruct() du parent via "parent::""
        parent::__destruct();
    }

}
