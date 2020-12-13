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
                case "AfficherListeTachesPrivees":
                    $this->AfficherListeTachesPrivees();
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
        global $rep, $vues;

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

//    function AfficherDetailListe()
//    {
//        global $rep, $vues;
//
//        $idListeTaches = $_REQUEST['idListeTaches'];
//        $listetaches = ModelListeTaches::getListeTachesbyID($idListeTaches);
//        foreach($listetaches as $liste){
//            $liste->setListeTaches(ModelTache::getAllTachesByIdListeTaches($liste->getIdListeTaches()));
//        }
//        require($rep . $vues['vueDetailListe']);
//    }

    function AfficherListeTachesPrivees()
    {
        global $rep, $vues;
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