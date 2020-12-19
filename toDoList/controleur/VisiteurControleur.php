<?php

class VisiteurControleur
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
                case "Connexion":
                    $this->Connexion();
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
        $NomTache = Nettoyage::NettoyageString($_REQUEST['NomTache']);
        $idListeTaches = $_REQUEST['idListeTaches'];
        ModelTache::insertTache($NomTache, false, $idListeTaches);
        header('Refresh:0;url=index.php?action=AfficherDetailListe&idListeTaches='.$idListeTaches);
    }

    function AjouterDescription()
    {
        global $rep, $vues;
        $nomListe = Nettoyage::NettoyageString($_REQUEST['nomListe']);
        require($rep . $vues['ajoutDescriptionListe']);
    }

    function AjouterListe()
    {
        $nomListe = Nettoyage::NettoyageString($_REQUEST['nomListe']);
        $description = Nettoyage::NettoyageString($_REQUEST['description']);
        ModelListeTaches::insertListeTaches($nomListe, false, $description);
        $this->Reinit();
    }

    function SupprimerTache()
    {
        global $rep, $vues;
        $IdTache = $_REQUEST['idTache'];
        $idListeTaches = ModelTache::getTacheByIdTache($IdTache)->getIdListeTaches();
        ModelTache::deleteTachebyIdTache($IdTache);
        header('Refresh:0;url=index.php?action=AfficherDetailListe&idListeTaches='.$idListeTaches);
    }

    function SupprimerListeTaches()
    {
        global $rep, $vues;
        $IdlisteTache = $_REQUEST['idListeTaches'];
        ModelListeTaches::deleteListeTaches($IdlisteTache);
        $this->Reinit();
    }

    function Connexion()
    {
        global $rep, $vues;
        $pseudo = $_REQUEST['pseudo'];
        $mdp = $_REQUEST['mdp'];
        $data = array();
        if (isset($pseudo) && isset($mdp)){
            $Vueerreur = Validation::ValidationConnnexion($pseudo, $mdp);
            if(empty($Vueerreur)){
                if(ModelUtilisateur::connexion($pseudo, $mdp)){
                        $data[] = "Connexion réussie !";
                        header('Refresh:1;url=index.php');
                } else {
                    $data[] = "Problème de connexion ! Le pseudo ou mot de passe est incorrect !";
                }
            }
        }
        sleep(1);
        require($rep . $vues['connexion']);
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