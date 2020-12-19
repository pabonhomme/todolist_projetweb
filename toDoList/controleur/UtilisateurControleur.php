<?php


class UtilisateurControleur
{
    function __construct()
    {
        global $rep, $vues;

        $Vueerreur = array();
        try {
            if (isset($_REQUEST["action"])) {
                $action = $_REQUEST["action"];
            } else {
                $action = NULL;
            }

            switch ($action) {

                case "Deconnexion":
                    $this->Deconnexion();
                    break;
                case "AfficherListeTachesPrivees":
                    $this->AfficherListeTachesPrivees();
                    break;
                default:
                    $Vueerreur[] = "Erreur d'appel, l'action est inconnue";
                    require($rep . $vues['erreur']);
                    break;
            }
        } catch (PDOException $e) {
            $Vueerreur[] = $e->getMessage();;
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $Vueerreur[] = $e2->getMessage();;
            require($rep . $vues['erreur']);
        }
    }

    function Deconnexion(){
        ModelUtilisateur::deconnexion();
        header('Refresh:0;url=index.php');
    }

    function AfficherListeTachesPrivees(){

    }
}