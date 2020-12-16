<?php

class VisiteurControleur
{
    function __construct()
    {
        global $rep, $vues;

        $Vueerreur = array();
        try {
            $action = $_REQUEST['action'];

            switch ($action) {

                //pas d'action, on réinitialise 1er appel
                case NULL:
                    $this->Reinit();
                    break;
                case "AfficherDetailListe":
                    $this->AfficherDetailListe();
                    break;
                case "AjouterTache":
                    $this->AjouterTache();
                    break;
                case "AjouterDescription":
                    $this->AjouterDescription();
                    break;
                case "AjouterListe":
                    $this->AjouterListe();
                    break;
                case "SupprimerTache":
                    $this->SupprimerTache();
                    break;
                case "SupprimerListeTaches":
                    $this->SupprimerListeTaches();
                    break;
                case "AfficherConnexion":
                    $this->AfficherConnexion();
                    break;
                case "AfficherAide":
                    $this->AfficherAide();
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

    function Reinit()
    {
        global $rep, $vues, $tacheMax;
        $tabListeTaches = ModelListeTaches::getAllListeTachesPublic();
        foreach ($tabListeTaches as $liste) {
            $liste->setListeTaches(ModelTache::getAllTachesByIdListeTaches($liste->getIdListeTaches()));
        }
        require($rep . $vues['accueil']);
    }

    function AfficherDetailListe()
    {
        global $rep, $vues;
        $idListeTaches = $_REQUEST['idListeTaches'];
        $listetaches = ModelListeTaches::getListeTachesbyID($idListeTaches);
        $listetaches->setListeTaches(ModelTache::getAllTachesByIdListeTaches($listetaches->getIdListeTaches()));
        require($rep . $vues['vueDetailListe']);
    }

    function AjouterTache()
    {
        global $rep, $vues;
        $NomTache = Validation::ValidationString($_REQUEST['NomTache']);
        $listeTache = $_REQUEST['idListeTaches'];
        ModelTache::insertTache($NomTache, false, $listeTache);
        $this->Reinit();
    }

    function AjouterDescription()
    {
        global $rep, $vues;
        $nomListe = Validation::ValidationString($_REQUEST['nomListe']);
        require($rep . $vues['ajoutDescriptionListe']);
    }

    function AjouterListe()
    {
        $nomListe = Validation::ValidationString($_REQUEST['nomListe']);
        $description = Validation::ValidationString($_REQUEST['description']);
        ModelListeTaches::insertListeTaches($nomListe, false, $description);
        $this->Reinit();
    }

    function SupprimerTache()
    {
        global $rep, $vues;
        $IdTache = $_REQUEST['idTache'];
        ModelTache::deleteTachebyIdTache($IdTache);
        $this->Reinit();
    }

    function SupprimerListeTaches()
    {
        global $rep, $vues;
        $IdlisteTache = $_REQUEST['idListeTaches'];
        ModelListeTaches::deleteListeTaches($IdlisteTache);
        $this->Reinit();
    }

    function AfficherConnexion()
    {
        global $rep, $vues;
        require($rep . $vues['connexion']);
    }


    function AfficherAide()
    {
        global $rep, $vues;
        require($rep . $vues['aide']);
    }


}