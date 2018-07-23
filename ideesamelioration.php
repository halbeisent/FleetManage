 public function addVehicleManufacturerModelProdYear() {
        $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->database->beginTransaction();
            $addManufacturerQuery = 'INSERT INTO `g2c6d_manufacturer` (`name`) VALUES (:manufacturerName)';
            $newManufacturer = $this->database->prepare($addManufacturerQuery);
            $newManufacturer->bindValue('manufacturerName', $this->manufacturerName, PDO::PARAM_STR);
            $newManufacturer->execute();
            $addModelQuery = 'INSERT INTO `g2c6d_vehicleModel` (`name`, `productionYear`) VALUES (:modelName, :productionYear)';
            $newModel = $this->database->prepare($addModelQuery);
            $newModel->bindValue(':modelName', $this->modelName, PDO::PARAM_STR);
            $newModel->bindValue(':productionYear', $this->productionYear, PDO::PARAM_STR);
            $newModel->execute();
            $this->database->commit();
        } catch (Exception $errorMessage) {
            $this->dataBase->rollback();
            echo 'Erreur : ' . $errorMessage->getMessage();
        }
    }