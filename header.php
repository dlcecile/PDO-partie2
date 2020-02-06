<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-oOs/gFavzADqv3i5nCM+9CzXe3e5vXLXZ5LZ7PplpsWpTCufB7kqkTlC9FtZ5nJo" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Partie2 <?= $page ?></title>
</head>
<body>
    <div class="blocImage">
    <img src="./assets/img/doctor.png" alt="doctor">
    </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Gestion</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
          <li class="nav-item active  col-2">
              <a class="nav-link " href="http://pdopartie2.com/exo1/ajout-patient.php">Inscription</a>
        </li>
        <li class="nav-item active  col-2">
          <a class="nav-link " href="http://pdopartie2.com/exo1/index.php">Index</a>
        </li>
         <li class="nav-item active  col-2">
          <a class="nav-link" href="http://pdopartie2.com/exo1/liste-patient.php">Patients</a>
        </li>
         <li class="nav-item active  col-2">
          <a class="nav-link" href="http://pdopartie2.com/exo1/profil-patient.php">Profils</a>
        </li>
         <li class="nav-item active  col-3">
          <a class="nav-link" href="http://pdopartie2.com/exo1/rendezvous.php">Rendez-Vous</a>
        </li>
      </ul>
    </div>
  </nav>
