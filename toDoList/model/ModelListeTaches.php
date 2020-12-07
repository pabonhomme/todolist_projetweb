<?php


class ModelListeTaches
{
    static function getAllListeTachesPublic(){
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        return $gateway->getAllListeTachesPublic();
    }
    static function insertListeTaches($nom, $confidentialite, $description){
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $gateway->insertListeTaches($nom, $confidentialite, $description);
    }
    static function deleteListeTaches($idListeTache){
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $gateway->deleteListeTaches($idListeTache);
    }

    static function getNombreDeTache(){
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        return $gateway->nbListeTaches();
    }

    static function fillListDeTaches($ListeTaches){

    }

}