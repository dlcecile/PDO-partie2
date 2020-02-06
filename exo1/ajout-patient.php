<?php
require_once 'parametre.php';
include '../header.php';
include './form_validation.php';
//si post du formulaire complété sans erreurs, affichage du résultat
if ($isSubmitted && count($errors) == 0) {
    $db = connectDb();
//REQUETE POUR MODIFIER
    $req = $dbco->prepare("UPDATE `patients` SET `firstname`= ':firstname'");
    $req->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $req->execute();
    echo 'Données mises à jour';
// variable pour afficher les données souhaité d'un client
    $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
// Envoie de la requête vers la base de données
    $sth = $db->prepare($query);
// éxecution de la requête en liant les variables
    $sth->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $sth->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $sth->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
    $sth->bindValue(':phone', $phone, PDO::PARAM_STR);
    $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
    if ($sth->execute()) {
        // si le formulaire est rempli sans faute, il nous enverra dans la page 'liste-patient.php'
        header('Location: http://pdopartie2.com/exo1/liste-patient.php');
        exit();
    }
}
?>
<form method="post" action=" ajout-patient.php" class="formParts" novalidate>
    <div class="custom_form justify-content-center">
        <div class="form-group row">
            <label for="lastname" class="col-form-label col-2 offset-3">Nom</label>
            <input id="lastname" name="lastname" type="text"  class="form-control col-5" placeholder="Durand" value="<?= $lastname ?>">
            <span class="text-danger"><?= ($errors['lastname']) ?? '' ?></span>
        </div>
        <div class="form-group row">
            <label for="firstname" class="col-form-label col-2 offset-3">Prénom</label>
            <input id="firstname" name="firstname" type="text" class="form-control col-5" placeholder="Bertrand" value="<?= $firstname ?>">
            <span class="text-danger"><?= ($errors['firstname']) ?? '' ?></span>
        </div>
        <div class="form-group row">
            <label for="birthdate" class="col-form-label col-2 offset-3">Date de naissance</label>
            <input id="birthdate" name="birthdate" type="date" class="form-control col-5" placeholder="00/00/000" value="<?= $birthdate ?>">
            <span class="text-danger"><?= ($errors['birthdate']) ?? '' ?></span>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-form-label col-2 offset-3">Téléphone</label>
            <input id="phone" name="phone" type="tel" class="form-control col-5" placeholder="00.00.00.00.00" value="<?= $phone ?>">
            <span class="text-danger"><?= ($errors['phone']) ?? '' ?></span>
        </div>
        <div class="form-group row">
            <label for="mail" class="col-form-label col-2 offset-3">Mail</label>
            <input id="mail" name="mail" type="email" class="form-control col-5" placeholder="xxxx.xxxx@xx.xx" value="<?= $mail ?>">
            <span class="text-danger"><?= ($errors['mail']) ?? '' ?></span>
        </div>
        <input class="form-control col-5 offset-5 btn-primary" type="submit"  name="submit" value="Ajouter patient" />
    </div>
</form> 
