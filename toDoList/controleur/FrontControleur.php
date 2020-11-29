<?php
//require('DAL/Connexion.php');
//require('DAL/Gateway/TacheGateway.php');
//require('metier/Tache.php');

class FrontControleur
{
    function __construct() {
        global $rep,$vues;

        $Vueerreur = array ();
            try{
            $action=$_REQUEST['action'];

            switch($action) {

                //pas d'action, on réinitialise 1er appel
                case NULL:
                    $this->Reinit();
                    break;

                case "afficherTaches":
                    $this->AfficherTaches();
                    break;

                default:
                    $Vueerreur[] =	"Erreur d'appel php";
                    require ($rep.$vues['vuephp1']);
                    break;
            }
        }
        catch (PDOException $e)
        {
            $Vueerreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $Vueerreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }
    }

    function Reinit() {
        global $rep,$vues;
        require($rep.$vues['vuephp1']);
    }

    function  AfficherTaches(){
        global $rep,$vues;

        $modelTache = new ModelTache();

        $tabTache=$modelTache->getAllTache();

        $i = $modelTache->getNombreDeTache();

        //$gateway->insertTache(3, "courir", 5, "il faut faire du sport");

       require($rep.$vues['vueTaches']);
    }








}