<?php


class ModelUtilisateur
{
    static function connexion(string $pseudo, string $motDePasse):bool{
        global $dsn, $login, $mdp;
        $gateway = new UtilisateurGateway(new Connexion($dsn, $login, $mdp));
        $pseudo = Nettoyage::NettoyageString($pseudo);
        $motDePasse = Nettoyage::NettoyageString($motDePasse);
        $result = $gateway->rechercherUtilisateur($pseudo, $motDePasse);
        if($result){
            $_SESSION['role']='utilisateur';
			$_SESSION['pseudo']=$pseudo;
			return true;
        }
         return false;
    }

    static function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    static function isUtilisateur():bool{

        return (isset ($_SESSION['pseudo']) && isset($_SESSION['role']));
    }
}