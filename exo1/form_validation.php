<?php
//Ne soumet pas mon formulaire sans l'envoi
$isSubmitted=false;
//Initialisation des variables à vide.
$firstname = $lastname = $birthdate = $mail = $phone = '';
//Regex 
$regexName = "/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/"; //Pour le nom et le prénom
$regexTel = "/^0[67](\.[0-9]{2}){4}$/";
$regexDate = "/^((?:19|20)[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
//Tableau des erreurs
$errors = [];

//contrôle du formulaire après envoi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isSubmitted = true;
//Controle du nom
$firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
if (empty($firstname)) {
    $errors['firstname'] = 'Le champ est vide, veuillez saisir votre nom';
} elseif (!preg_match($regexName, $firstname)) {
    $errors['firstname'] = 'Votre nom contient des caractères non autorisés !';
}
//Contôle du prénom
$lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
if (empty($lastname)) {
    $errors['lastname'] = 'Veuillez renseigner le nom';
} elseif (!preg_match($regexName, $lastname)) {
    $errors['lastname'] = 'Votre nom contient des caractères non autorisés !';
}
//contôle de la date d'anniversaire
    $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    if (empty($birthdate)) {
        $errors['birthdate'] = 'Veuillez renseigner votre date de naissance';
    } elseif (!preg_match($regexDate, $birthdate)) {
        $errors['birthdate'] = 'Le format valide est aaaa-mm-jj !';
    }
  //contôle du téléphone
    $phone = trim(htmlspecialchars($_POST['phone']));
    if (empty($phone)) {
        $errors['phone'] = 'Veuillez renseigner votre téléphone';
    } elseif (!preg_match($regexTel, $phone)) {
        $errors['phone'] = 'Le format du téléphone n\'est pas valide!';
    }
  //contôle de l'email
     $mail = trim(htmlspecialchars($_POST['mail']));
    if (empty($mail)) {
        $errors['mail'] = 'Veuillez renseigner votre email';
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = 'L\' email  n\'est pas valide!';
    }
}