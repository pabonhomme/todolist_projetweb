<?php

/**
 * Permet de vérifier les actions et en fonction d'appeler le bon controleur
 * Class FrontControleur
 */
class FrontControleur
{
    public function __construct()
    {
        global $rep, $vues;


        try {
            session_start();
            $listeActions = array(
                'UtilisateurControleur' => array('Deconnexion', 'AjouterListePrivee', 'AfficherListeTachesPrivees', 'AjouterTitreListePrivee'),
                'VisiteurControleur' => array(NULL, 'AfficherDetailListe', 'AjouterTache', 'AjouterTitreListePublique', 'AjouterListePublique', 'SupprimerTache', 'SupprimerListeTaches', 'AfficherConnexion', 'AfficherAide', 'Connexion', 'UpdateTerminee'));

            $utilisateur = ModelUtilisateur::isUtilisateur(); // teste si un utilisateur est connecté
            if (isset($_REQUEST["action"])) {
                $action = $_REQUEST["action"]; // récupération de l'action
            } else {
                $action = NULL;
            }

            $ctrl = $this->rechAction($listeActions, $action, $utilisateur);

            if (!isset($ctrl)) { // teste si l'action a été trouvée dans le tableau des actions
                $Vueerreur[] = "action inconnue";
                require($rep . $vues['erreur']);
                exit(1);
            }

            new $ctrl;

        } catch (Exception $exception) {
            $Vueerreur[] = "Action ...";
            require($rep . $vues['erreur']);
        }
    }

    /**
     * Fonction qui recherche l'action voulue et vérifie en cas d'action utilisateur connecté si l'utilisateur est connecté
     * @param array $listeActions tableau des actions
     * @param $action //action voulue
     * @param bool $utilisateur statut de la connexion
     * @return string|null
     */
    public function rechAction(array $listeActions, $action, bool $utilisateur)
    {
        global $rep, $vues;
        foreach ($listeActions as $key => $value) {
            if (in_array($action, $value)) {
                if ($key == 'UtilisateurControleur') {
                    if (!$utilisateur) {
                        require($rep . $vues['connexion']);
                    }
                }
                return $key;
            }
        }
        return NULL;
    }
}