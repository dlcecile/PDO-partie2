<?php
include '../header.php';
// Lier le fichier parameter.php à l'index.php
require_once 'parametre.php';
$db = connectDb();
$query = 'SELECT `lastname`, `firstname`,`id` FROM `patients`';
$patientsQueryStat = $db->query($query);
$patientsList = [];
if ($patientsQueryStat instanceOf PDOStatement) {
    //Collection des données dans un tableau associatif (FETCH_Assoc
    $patientsList = $patientsQueryStat->fetchAll(PDO:: FETCH_ASSOC);
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>0</th>
                        <th>Nom</th>
                        <th>Prénom</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($patientsList) > 0) {
// Début de la boucle foreach qui sert à afficher notre tableau
                        foreach ($patientsList as $key => $patients):
                            ?>
                            <tr> 
                                <td><?= $key + 1 ?></td>
                                <td><a href="profil-patient.php?maurice=<?= $patients['id'] ?>"><?= $patients['lastname'] ?></a></td>
                                <td><?= $patients['firstname'] ?></td>
                                <td><a href="http://pdopartie2.com/exo1/profil-patient.php">page profil</a></td>
                            </tr>
                            <?php
                        endforeach;
                    }
                    ?>
                </tbody>
                <tfooter>
                    <tr>
                        <th colspan="5"><a href="ajout-patient.php" class="btn btn-primary btn-lg d-flex justify-content-center">Créer un patient</a></th>
                    </tr>
                </tfooter
            </table>
        </div>
    </div>
</div>
