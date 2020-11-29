<?php
require('Personne.php');

$nom= $_POST['user_nom'] ?? 'pasdenom';
$prenom= $_POST['user_prenom'] ?? 'pasdeprenom';
$dateNaiss= $_POST['user_dateNaissance'];
$email= $_POST['user_email'] ?? '';

//$nom=filter_var($nom, FILTER_SANITIZE_STRING);
//$prenom=filter_var($prenom, FILTER_SANITIZE_STRING);

if (filter_var($email, FILTER_VALIDATE_EMAIL))
{
$verifemail="bon email";
}
else {
    $verifemail = "mauvais email";
}

$personne = new Personne($nom, $prenom, $dateNaiss, $email);

require("index.php");