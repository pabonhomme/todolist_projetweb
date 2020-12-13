<?php


class ModelListeTaches
{
    static function getListeTachesbyID($idListeTache){
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $result = $gateway->getListeTachesbyID($idListeTache);
        return new ListeTaches($result['idListeTaches'], $result['nom'], $result['confidentialite'], $result['description']);
    }

    static function getAllListeTachesPublic()
    {
        global $dsn, $login, $mdp;
        $tabN = array();
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $results = $gateway->getAllListeTachesPublic();
        foreach ($results as $row) {
            $tabN[] = new ListeTaches($row['idListeTaches'], $row['nom'], $row['confidentialite'], $row['description']);
        }
        return $tabN;
    }

    static function getAllListeTachesByPseudo($pseudo)
    {
        global $dsn, $login, $mdp;
        $tabN = array();
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $results = $gateway->getAllListeTachesByPseudo($pseudo);
        foreach ($results as $row) {
            $tabN[] = new ListeTaches($row['idListeTaches'], $row['nom'], $row['confidentialite'], $row['description']);
        }
        return $tabN;
    }

    static function insertListeTaches($nom, $confidentialite, $description)
    {
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $gateway->insertListeTaches($nom, $confidentialite, $description);
    }

    static function deleteListeTaches($idListeTache)
    {
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $gateway->deleteListeTaches($idListeTache);
    }

    static function getNombreDeTache()
    {
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        return $gateway->nbListeTaches();
    }

}