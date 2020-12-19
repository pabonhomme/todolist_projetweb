<?php


class FrontControleur
{
    public function __construct()
    {
        global $rep, $vues;


        try {
            session_start();
            $listeActions = array(
                'UtilisateurControleur' => array('Deconnexion', 'AfficherListeTachesPrivees'),
                'VisiteurControleur' => array(NULL, 'AfficherDetailListe', 'AjouterTache', 'AjouterDescription', 'AjouterListe', 'SupprimerTache', 'SupprimerListeTaches', 'AfficherConnexion', 'AfficherAide', 'Connexion'));

            $utilisateur = ModelUtilisateur::isUtilisateur();
            if (isset($_REQUEST["action"])) {
                $action = $_REQUEST["action"];
            } else {
                $action = NULL;
            }

            $ctrl = $this->rechAction($listeActions, $action, $utilisateur);

            if (!isset($ctrl)) {
                $Vueerreur[] = "action inconnue";
                require($rep . $vues['erreur']);
                exit(1);
            }

//            DEFINE("IS_ADMIN", ModelUtilisateur::IsAdmin());
//            DEFINE("IS_LOG", ModelUtilisateur::IsLog());

            new $ctrl;

        } catch (Exception $exception) {
            $Vueerreur[] = "Action ...";
            require($rep . $vues['erreur']);
        }
    }

    public function rechAction($listeActions, $action, $utilisateur)
    {
        global $rep, $vues;
        foreach ($listeActions as $key => $value) {
            if (in_array($action, $value)) {
                if($key == 'UtilisateurControleur'){
                    if($utilisateur == null){
                        require($rep . $vues['connexion']);
                    }
                }
                return $key;
            }
        }
        return NULL;
    }
}