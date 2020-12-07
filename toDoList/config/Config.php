<?php

// général pour trouver dossier
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']=array('Validation.php');

//BD
$dsn = 'mysql:host=localhost;dbname=toDoList;charset=utf8';
$base="toDoList";
$login="root";
$mdp="";

//Vues
$vues['erreur']='vues/erreur.php';
$vues['vuephp1']='vues/vuephp1.php';
$vues['vueListeTaches']='vues/vueListeTaches.php';

$vues['accueil']='vues/accueil.php';
$vues['aide']='vues/aide.php';
$vues['ajoutTache']='vues/ajoutTache.php';
$vues['connexion']='vues/connexion.php';

