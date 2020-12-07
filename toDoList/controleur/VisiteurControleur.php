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

                case "AfficherListePubliques":
                    $this->AfficherListePubliques();
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
        require($rep . $vues['vuephp1']);
    }

    function AfficherListePubliques()
    {
        global $rep, $vues;
        $modelListeTaches = new ModelListeTaches();
        $modelTache = new ModelTache();

        $tabListeTaches = $modelListeTaches->getAllListeTachesPublic();
        foreach ($tabListeTaches as $liste) {
            $liste->setListeTaches($modelTache->getAllTachesByIdListeTaches($liste->getIdListeTaches()));
        }
        require($rep . $vues['accueil']);
    }


}