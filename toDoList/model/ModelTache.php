<?php


class ModelTache
{

    static function getAllTachesByIdListeTaches($idListeTaches)
    {
        global $dsn, $login, $mdp;
        $tabN = array();
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        $results = $gateway->getAllTachesByIdListeTaches($idListeTaches);
        foreach ($results as $row) {
            $tabN[] = new Tache($row['idTache'], $row['nom'], $row['terminee'], $row['idListeTaches']);
        }
        return $tabN;
    }

    static function insertTache($nom, $terminee, $idListeTaches)
    {
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        $gateway->insertTache($nom, $terminee, $idListeTaches);
    }

    static function deleteTachebyIdTache($idTache)
    {
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        $gateway->deleteTachebyIdTache($idTache);
    }

    static function deleteTacheByIdListeTaches($idListeTaches)
    {
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        $gateway->deleteTacheByIdListeTaches($idListeTaches);
    }

    static function getNombreDeTache()
    {
        global $dsn, $login, $mdp;
        $gateway = new TacheGateway(new Connexion($dsn, $login, $mdp));
        return $gateway->nbTache();
    }
}