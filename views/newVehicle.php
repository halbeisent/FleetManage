<?php
include '../navbar.php';
include '../models/database.php';
include '../models/manufacturers.php';
include '../models/vehicles.php';
include '../models/vehicleModels.php';
include '../models/users.php';
include '../models/energies.php';
include '../models/vehiclesTypes.php';
include '../controllers/newVehicleController.php';
$pageTitle = 'Ajout de véhicule';
$pageBackground = 'newCarBG';
include '../header.php';
?>
<?php if ($addSuccess) { ?>
    <div class="card-content">
        <h2><?= 'Véhicule bien enregistré !' ?></h2>
    </div>
<?php } else { ?>
    <!-- Affichage du message de validation -->
    <!-- J'utilise la méthode POST pour protéger le password, je recharge la page avec affichage du message de validation, j'active également l'upload de fichier avec enctype=multipart/form-data -->
    <form method="POST" action="newVehicle.php" enctype="multipart/form-data">
        <div class="container">
            <div class="card-panel">
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <select id="manufacturerSelect" name="manufacturerSelect">
                            <option value="" disabled selected>Veuillez sélectionner un constructeur</option>
                            <?php foreach ($manufacturersList as $manufacturer) { ?>
                                <option value="<?= $manufacturer->id ?>"><?= $manufacturer->name ?></option>
                            <?php } ?>
                        </select>
                        <label for="manufacturerSelect">Constructeur</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <select id="modelSelect" name="modelSelect">
                            <option value="" disabled selected>Veuillez sélectionner un modèle</option>
                            <?php foreach ($modelsList as $model) { ?>
                                <option value="<?= $model->id ?>"><?= $model->name ?></option>
                            <?php } ?>
                        </select>
                        <label for="modelSelect">Modèle</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input placeholder="ABCDEFGHJK2L16235" id="serialNumber" type="text" name="serialNumber" />
                        <label for="serialNumber">Numéro de série</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <input placeholder="2018-03-04" id="firstRegistrationDate" type="text" name="firstRegistrationDate" />
                        <label for="firstRegistrationDate">Première Immatriculation</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <select id="userSelect" name="userSelect">
                            <option value="" disabled selected>Veuillez assigner ce véhicule à un utilisateur</option>
                            <?php foreach ($usersList as $user) { ?>
                                <option value="<?= $user->id ?>"><?= $user->lastName . ' ' . $user->firstName ?></option>
                            <?php } ?>
                        </select>
                        <label for="userSelect">Utilisateur</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <select id="categorySelect" name="categorySelect">
                            <option value="" disabled selected>Veuillez sélectionner un type de véhicule</option>
                            <?php foreach ($vehiclesTypesList as $vehicleType) { ?>
                                <option value="<?= $vehicleType->id ?>"><?= $vehicleType->name ?></option>
                            <?php } ?>
                        </select>
                        <label for="categorySelect">Type de véhicule</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <select id="energySelect" name="energySelect">
                            <option value="" disabled selected>Veuillez sélectionner une énergie</option>
                            <?php foreach ($energiesList as $energy) { ?>
                                <option value="<?= $energy->id ?>"><?= $energy->type ?></option>
                            <?php } ?>
                        </select>
                        <label for="energySelect">Energie</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <input type="file" name="interiorPic" id="interiorPic" class="input-file" />
                        <label for="interiorPic">Photo intérieure</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input type="file" name="exteriorPic" id="exteriorPic" class="input-file" />
                        <label for="exteriorPic">Photo extérieure</label>
                    </div>
                </div>
                <input class="waves-effect waves-light btn" type="submit" value="Ajouter le véhicule" name="submit" />
            </div>
        </div>
    </form>
<?php
}
include '../footer.php';
