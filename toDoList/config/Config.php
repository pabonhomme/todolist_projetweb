<?php

// général pour trouver dossier
$rep = __DIR__ . '/../';

// variable pour le nombre de tache maximum visible sur page d'accueil
$tacheMax = 3;

//BD
$dsn = 'mysql:host=localhost;dbname=toDoList;charset=utf8';
$base = "toDoList";
$login = "root";
$mdp = "";

//Vues
$vues['erreur'] = 'vues/vueErreur.php';
$vues['accueil'] = 'vues/vueAccueil.php';
$vues['aide'] = 'vues/vueAide.php';
$vues['vueDetailListe'] = 'vues/vueDetailListe.php';
$vues['connexion'] = 'vues/vueConnexion.php';
$vues['vueListesPrivees'] = 'vues/vueListesPrivees.php';
$vues['ajoutDescriptionListe'] = 'vues/vueAjoutDescriptionListe.php';

