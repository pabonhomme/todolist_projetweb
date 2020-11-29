<?php

// général pour trouver dossier
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']=array('Validation.php');

//BD
$dsn = 'mysql:host=localhost;dbname=toDoList';
$base="toDoList";
$login="root";
$mdp="";

//Vues
$vues['erreur']='vues/erreur.php';
$vues['vuephp1']='vues/vuephp1.php';
$vues['vueTaches']='vues/vueTaches.php';
