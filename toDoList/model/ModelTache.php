<?php


class ModelTache
{

    static function getAllTachesByIdListeTaches($idListeTaches){
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        return $gateway->getAllTachesByIdListeTaches($idListeTaches);
    }
    static function insertTache($nom, $terminee, $idListeTaches){
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        $gateway->insertTache($nom, $terminee, $idListeTaches);
    }
    static function deleteTache($idTache){
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        $gateway->deleteTache($idTache);
    }

    static function getNombreDeTache(){
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        return $gateway->nbTache();
    }
}