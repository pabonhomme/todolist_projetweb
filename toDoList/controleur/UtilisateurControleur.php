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
                case "AjouterListePrivee":
                    $this->AjouterListePrivee();
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
    // CREER AjouterDescriptionPrivee

    function AjouterListePrivee()
    {
        $nomListe = Nettoyage::NettoyageString($_REQUEST['nomListe']);
        $description = Nettoyage::NettoyageString($_REQUEST['description']);
        $pseudo= $_SESSION['pseudo'];
        ModelListeTaches::insertListeTaches($nomListe, true, $description, $pseudo);
        header('Refresh:1;url=index.php');
    }

    function AfficherListeTachesPrivees(){

    }
}