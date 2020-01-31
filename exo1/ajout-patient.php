<?php
require_once 'parametre.php';
include '../header.php';
include './form_validation.php';

?>
<form method="post" action=" ajout-patient.php" class="formParts" novalidate>
    <div class="form-group row">
        <label for="lastname" class="col-form-label col-2">Nom :</label>
        <input id="lastname" name="lastname" type="text"  class="form-control col-5" placeholder="Durand" value="<?= $lastname ?>">
        <span class="text-danger"><?= ($errors['lastname']) ?? '' ?></span>
    </div>
    <div class="form-group row">
        <label for="firstname" class="col-form-label col-2">Prénom :</label>
        <input id="firstname" name="firstname" type="text" class="form-control col-5" placeholder="Bertrand" value="<?= $firstname ?>">
        <span class="text-danger"><?= ($errors['firstname']) ?? '' ?></span>
    </div>
    <div class="form-group row">
        <label for="birthdate" class="col-form-label col-2">Date de naissance :</label>
        <input id="birthdate" name="birthdate" type="date" class="form-control col-5" placeholder="00/00/000" value="<?= $birthdate ?>">
        <span class="text-danger"><?= ($errors['birthdate']) ?? '' ?></span>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-form-label col-2">Téléphone :</label>
        <input id="phone" name="phone" type="tel" class="form-control col-5" placeholder="00.00.00.00.00" value="<?= $phone ?>">
        <span class="text-danger"><?= ($errors['phone']) ?? '' ?></span>
    </div>
    <div class="form-group row">
        <label for="mail" class="col-form-label col-2">Mail:</label>
        <input id="mail" name="mail" type="email" class="form-control col-5" placeholder="xxxx.xxxx@xx.xx" value="<?= $mail ?>">
        <span class="text-danger"><?= ($errors['mail']) ?? '' ?></span>
    </div>
    <input class="form-control col-5 offset-4" type="submit"  name="submit" value="Envoyez" />
</form> 
<?php
if (isset($_POST['submit']) && empty($errors['lastname']) && empty($errors['firstname']) && empty($errors['birthdate']) && empty($errors['phone']) && empty($errors['mailbox'])) {
$dsn = 'mysql:dbname=' . DB . '; host=' . HOST . ';';
try{
   $db =  new PDO($dsn, USER, PASSWD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $birthdate = $_POST['birthdate'];
                $phone = $_POST['phone'];
                $mail = $_POST['mail'];
//On insére les données
        $idb = $db->prepare('INSERT INTO `patients` (`firstname`,`lastname`,`birthdate`,`phone`,`mail`) VALUES (:firstname, :lastname, :birthdate, :phone, :mail)');
        $idb->execute(array(
                                    ':firstname' => $firstname,
                                    ':lastname' => $lastname,
                                    ':birthdate' => $birthdate,
                                    ':phone' => $phone,
                                    ':mail' => $mail));
}catch (PDOException $e){
 echo "Erreur : " . $e->getMessage();
}
}
?>