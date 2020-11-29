<?php


class ModelTache
{

    static function getAllTache(){
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        return $gateway->findAllTache();
    }

    static function getNombreDeTache(){
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        return $gateway->nbTache();
    }
}