<?php

class vehicles extends database {

    public function __construct() {
        parent::__construct();
    }

    public function addNewVehicle() {
        $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->database->beginTransaction();
            $addVehicleQuery = 'INSERT INTO `g2c6d_vehicles`, (`serialNumber`, `firstRegistrationDate`, `vehicleModels`, `vehicleManufacturers`, `users`, `vehiclesTypes`, `energies`*) VALUES (:serialNumber, :firstRegistrationDate, :vehicleModels, :vehicleManufacturers, :users, :vehiclesTypes, :energies*)';
            $addVehicle = $this->database->prepare($addVehicleQuery);
            $addVehicle->bindValue(':serialNumber', $this->serialNumber, PDO::PARAM_STR);
            $addVehicle->bindValue(':firstRegistrationDate', $this->firstRegistrationDate, PDO::PARAM_STR);
            $addVehicle->bindValue(':vehicleModels', $this->vehicleModels, PDO::PARAM_STR);
            $addVehicle->bindValue(':vehicleManufacturers', $this->vehicleManufacturers, PDO::PARAM_STR);
            $addVehicle->bindValue(':users', $this->users, PDO::PARAM_STR);
            $addVehicle->bindValue(':vehiclesTypes', $this->vehiclesTypes, PDO::PARAM_STR);
            $addVehicle->bindValue(':energies', $this->energies, PDO::PARAM_STR);
            $this->database->commit();
            $this->lastRecordId = $this->database->lastInsertId();
        } catch (PDOException $ex) {
            $this->database > rollback();
            echo 'Une erreur est survenur:' . $ex->getMessage();
        }
    }

    public function updateVehicle() {
        $updateQuery = 'UPDATE `g2c6d_vehicles` SET `serialNumber` = :serialNumber, `firstRegistrationDate` = :firstRegistrationDate, `vehicleModels` = :vehicleModels, `users` = :users, `vehiclesTypes` = :vehicleTypes, `energies` = :';
        $updateVehicle = $this->database->prepare($updateQuery);
        $updateVehicle->bindValue(':serialNumber', $this->serialNumber, PDO::PARAM_STR);
        $updateVehicle->bindValue(':firstRegistrationDate', $this->firstRegistrationDate, PDO::PARAM_STR);
        $updateVehicle->bindValue(':users', $this->users, PDO::PARAM_STR);
        $updateVehicle->bindValue(':vehiclesTypes', $this->vehicleTypes, PDO::PARAM_STR);
        $updateVehicle->bindValue(':energies', $this->energies, PDO::PARAM_STR);
        return $updateVehicle->execute();
    }

    public function getVehiclesList() {
        $vehicleQuery = 'SELECT `g2c6d_vehicles`.`id`, `g2c6d_vehicleModels`.`name` AS `modelName`, `g2c6d_manufacturers`.`name` AS `manufacturerName`, `g2c6d_vehicles`.`exteriorPic`, `g2c6d_vehicles`.`id` AS `vehicleId` FROM `g2c6d_vehicles` LEFT JOIN `g2c6d_vehicleModels` ON `g2c6d_vehicleModels`.`id` = `g2c6d_vehicles`.`vehicleModels` LEFT JOIN `g2c6d_manufacturers` ON `g2c6d_manufacturers`.`id` = `g2c6d_vehicles`.`vehicleManufacturers`';
        $listQuery = $this->database->query($vehicleQuery);
        $queryResult = $listQuery->fetchAll(PDO::FETCH_OBJ);
        return $queryResult;
    }

    public function getVehicleByUser() {
        $vehicleQuery = 'SELECT `g2c6d_manufacturers`.`name` AS `manufacturerName`, `g2c6d_vehicleModels`.`name` AS `modelName`, `g2c6d_vehicles`.`interiorPic`, `g2c6d_vehicles`.`exteriorPic`, `g2c6d_vehicles`.`id` AS `vehicleId` '
                . 'FROM `g2c6d_vehicles` '
                . 'LEFT JOIN `g2c6d_manufacturers` '
                . 'ON `g2c6d_manufacturers`.`id` = `g2c6d_vehicles`.`vehicleManufacturers` '
                . 'LEFT JOIN `g2c6d_vehicleModels` '
                . 'ON `g2c6d_vehicleModels`.`id` = `g2c6d_vehicles`.`vehicleModels` '
                . 'WHERE `g2c6d_vehicles`.`users` = :userId';
        $getVehicleDetails = $this->database->prepare($vehicleQuery);
        $getVehicleDetails->bindValue(':userId', $this->userId, PDO::PARAM_INT);
        $getVehicleDetails->execute();
        $queryResult = $getVehicleDetails->fetchAll(PDO::FETCH_OBJ);
        return $queryResult;
    }
    
    public function getVehicleById() {
        $vehicleQuery = 'SELECT `g2c6d_vehicles`.`id`, `g2c6d_vehicles`.`serialNumber` AS `serialNumber`, `g2c6d_vehicleModels`.`name` AS `modelName`, `g2c6d_manufacturers`.`name` AS `manufacturerName`, `g2c6d_users`.`lastName` AS `userLastName`, `g2c6d_users`.`firstName` AS `userFirstName`, '
                . '`g2c6d_vehiclesTypes`.`name` AS `vehiclesTypes`, `g2c6d_energies`.`type` AS `energies`, `g2c6d_vehicles`.`interiorPic` AS `interiorPic`, `g2c6d_vehicles`.`exteriorPic` AS `exteriorPic`'
                . 'FROM `g2c6d_vehicles` '
                . 'LEFT JOIN `g2c6d_manufacturers` '
                . 'ON `g2c6d_manufacturers`.`id` = `g2c6d_vehicles`.`vehicleManufacturers` '
                . 'LEFT JOIN `g2c6d_vehicleModels` '
                . 'ON `g2c6d_vehicleModels`.`id` = `g2c6d_vehicles`.`vehicleModels` '
                . 'LEFT JOIN `g2c6d_users` '
                . 'ON `g2c6d_users`.`id` = `g2c6d_vehicles`.`users` '
                . 'LEFT JOIN `g2c6d_vehiclesTypes` '
                . 'ON `g2c6d_vehiclesTypes`.`id` = `g2c6d_vehicles`.`vehiclesTypes` '
                . 'LEFT JOIN `g2c6d_energies` '
                . 'ON  `g2c6d_energies`.`id` = `g2c6d_vehicles`.`energies` '
                . 'WHERE `g2c6d_vehicles`.`id` = :vehicleId';
        $getVehicleInfo = $this->database->prepare($vehicleQuery);
        $getVehicleInfo->bindValue(':vehicleId', $this->id, PDO::PARAM_INT);
        $getVehicleInfo->execute();
        $queryResult = $getVehicleInfo->fetch(PDO::FETCH_OBJ);
        return $queryResult;
    }

    public function __destruct() {
        parent::__destruct();
    }

}
