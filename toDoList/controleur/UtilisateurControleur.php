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

                case "AfficherListeTachesPrivees":
                    $this->AfficherListeTachesPrivees();
                    break;

                case "Deconnexion":
                    $this->Deconnexion();
                    break;
                case "AjouterListePrivee":
                    $this->AjouterListePrivee();
                    break;

                case "AjouterDescriptionPrivee":
                    $this->AjouterDescriptionPrivee();
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

    function AfficherListeTachesPrivees()
    {
        global $rep, $vues, $tacheMax;
        $pseudo = $_SESSION['pseudo'];
        $tabListeTaches = ModelListeTaches::getAllListeTachesByPseudo($pseudo);
        foreach ($tabListeTaches as $liste) {
            $liste->setListeTaches(ModelTache::getAllTachesByIdListeTaches($liste->getIdListeTaches()));
        }
        require($rep . $vues['vueListesPrivees']);
    }

    function Deconnexion()
    {
        ModelUtilisateur::deconnexion();
        header('Refresh:0;url=index.php');
    }

    // CREER AjouterDescriptionPrivee

    function AjouterDescriptionPrivee()
    {
        $privee=true;
        global $rep, $vues;
        $nomListe = Nettoyage::NettoyageString($_REQUEST['nomListe']);
        require($rep . $vues['ajoutDescriptionListe']);
    }


    function AjouterListePrivee()
    {
        $privee = true;
        $nomListe = Nettoyage::NettoyageString($_REQUEST['nomListe']);
        $description = Nettoyage::NettoyageString($_REQUEST['description']);
        $pseudo = $_SESSION['pseudo'];
        ModelListeTaches::insertListeTaches($nomListe, true, $description, $pseudo);
        header('Refresh:1;url=index.php');
    }



}