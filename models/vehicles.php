<?php

class vehicles extends database {

    public function __construct() {
        parent::__construct();
    }

    public function addNewVehicle() {
        $newVehicleQuery = 'INSERT INTO `g2c6d_vehicle` (`serialNumber`, `firstRegistrationDate`, `id_g2c6d_vehicleModel`, `manufacturer`, `id_g2c6d_user`, `id_g2c6d_authorizedVehicleTypes`, `id_g2c6d_energy`, `intPicturePath`, `extPicturePath`) VALUES (:serialNumber, :firstRegistrationDate, :vehicleModel, :manufacturer, :assignedTo, :vehicleType, :energy, :intPicturePath, :extPicturePath)';
        $newVehicle = $this->database->prepare($newVehicleQuery);
        $newVehicle->bindValue(':serialNumber', $this->serialNumber, PDO::PARAM_STR);
        $newVehicle->bindValue(':firstRegistrationDate', $this->firstRegistrationDate, PDO::PARAM_STR);
        $newVehicle->bindValue(':vehicleModel', $this->vehicleModel, PDO::PARAM_STR);
        $newVehicle->bindValue(':manufacturer', $this->manufacturer, PDO::PARAM_STR);
        $newVehicle->bindValue(':assignedTo', $this->user, PDO::PARAM_STR);
        $newVehicle->bindValue(':vehicleType', $this->vehicleType, PDO::PARAM_STR);
        $newVehicle->bindValue(':energy', $this->vehicleType, PDO::PARAM_STR);
        $newVehicle->bindValue(':intPicturePath', $this->intPicturePath, PDO::PARAM_STR);
        $newVehicle->bindValue(':extPicturePath', $this->extPicturePath, PDO::PARAM_STR);
        return $newVehicle->execute();
    }

    public function __destruct() {
        parent::__destruct();
    }

}
