<?php


class FrontController
{
    public function __construct()
    {
        global $rep, $vues;


        try {
            session_start();
            $listeActions = array(
                'ControllerUser' => array('Deconnexion', 'AjouterNews', 'supprimer', 'AfficherAddNews'),
                'ControllerVisitor' => array(NULL,'AfficherDetailListe','AjouterTache','AjouterDescription','AjouterListe', 'SupprimerTache', 'AfficherConnexion', 'AfficherAide'));

            if (isset($_REQUEST["action"])) {
                $action = $_REQUEST["action"];
            } else {
                $action = NULL;
            }

            $ctrl = $this->rechAction($listeActions, $action);

            if (!isset($ctrl)) {
                $erreur[] = "action inconnue";
                require($rep . $vues['erreur']);
                exit(1);
            }

//            DEFINE("IS_ADMIN", ModelUtilisateur::IsAdmin());
//            DEFINE("IS_LOG", ModelUtilisateur::IsLog());

            new $ctrl;

        } catch (Exception $exception) {
            $erreur[] = "Action ...";
            require($rep . $vues['erreur']);
        }
    }

    public function rechAction($listeActions, $action)
    {
        foreach ($listeActions as $key => $value) {
            if (in_array($action, $value)) {
                return $key;
            }
        }
        return NULL;
    }
}

?>