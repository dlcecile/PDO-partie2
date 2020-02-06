<?php
require_once 'parametre.php';
include '../header.php';
if (empty($_GET['maurice']) || !filter_input(INPUT_GET, 'maurice', FILTER_VALIDATE_INT)) {
    header('location: liste-patient.php');
    exit();
}
$idPatient = filter_input(INPUT_GET, 'maurice', FILTER_SANITIZE_NUMBER_INT);
// fonction permettant de continuer si la connexion est réussi
$db = connectDb();
// variable pour afficher les données souhaité d'un client
$sql = 'SELECT `lastname`, `firstname`, DATE_FORMAT(`birthDate`, "%d/%m/%Y") `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :lune';
// Envoie de la requête vers la base de données
$patientsQueryStat = $db->prepare($sql);
$patientsQueryStat->bindValue(':lune', $idPatient, PDO::PARAM_INT);
try {
    $patientsQueryStat->execute();
    $patientsInfos = $patientsQueryStat->fetch(PDO::FETCH_ASSOC);
    if (!$patientsInfos) {
        throw new Exception('Une erreur s\'est produite veuillez contacter l\'admin du site');
    }
} catch (\Exception $e) {
    $sleep = 5;
    header('Refresh:' . $sleep . ';http://pdopartie2.com/exo1/liste-patient.php');
    exit($e->getMessage());
}
// éxecution de la requête
// $userInfos = [];
// if ($usersQueryStat->execute()) {
//   if ($usersQueryStat instanceOf PDOStatement) {
//     // Collection des données dans un tableau associatif (FETCH_ASSOC)
//     $usersList = $usersQueryStat->fetch(PDO::FETCH_ASSOC);
//   }
// }
// if (count($userInfos) == 0) {
?>
<!-- <p>Aucun utilisateur n'a été trouvé</p> -->
<?php
// $sleep = 5;
// header('Refresh:'. $sleep .';http://pdo-partie2/liste-patients.php');
// exit();
// }
?>
<div class="container text-center">
    <p><?= $patientsInfos['lastname'] . ' ' . $patientsInfos['firstname'] ?></p>
    <table class="table table-bordered text-black">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date d'anniversaire</th>
                <th>Télephone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
                <?php foreach ($patientsInfos AS $koala): ?>
                    <td><?= $koala ?></td>
<?php endforeach; ?>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-success" href="index.php">Accueil</a>
    <a class="btn btn-warning" href="liste-patient.php">Liste des patients</a>
</div>
<?php
include '../footer.php';
?>