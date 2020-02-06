<?php
include '../header.php';
require_once 'validation_rendezvous.php';
require_once 'parametre.php';
?>


<form method="post" action=" rendezvous.php" class="formParts" novalidate>
    <div class="custom_form justify-content-center">
        <div class="form-group row">
            <label for="idPatients" class="col-form-label col-2 offset-3">Numéro du patient</label>
            <input id="idPatients" name="idPatients" type="number"  class="form-control col-5" placeholder="idPatients" value="<?= $idPatients ?>">
            <span class="text-danger"><?= ($errors['idPatients']) ?? '' ?></span>
        </div>
        <div class="form-group row">
            <label for="dateHour" class="col-form-label col-2 offset-3">Date et Heure</label>
            <input id="dateHour" name="dateHour" type="datetime"  class="form-control col-5" placeholder="dateHour" value="<?= $idPatients ?>">
            <span class="text-danger"><?= ($errors['dateHour']) ?? '' ?></span>
        </div>
</form>