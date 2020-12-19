<?php


class ModelListeTaches
{
    static function getListeTachesbyID($idListeTache)
    {
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $result = $gateway->getListeTachesbyID($idListeTache);
        return new ListeTaches($result['idListeTaches'], $result['nom'], $result['confidentialite'], $result['description']);
    }

    static function getAllListeTachesPublic():array
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

    static function getAllListeTachesByPseudo(string $pseudo):array
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

    static function insertListeTaches(string $nom, bool $confidentialite, string $description)
    {
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $gateway->insertListeTaches($nom, $confidentialite, $description);
    }

    static function deleteListeTaches(int $idListeTaches)
    {
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        ModelTache::deleteTacheByIdListeTaches($idListeTaches);
        $gateway->deleteListeTaches($idListeTaches);
    }

    static function getNombreDeTache()
    {
        global $dsn, $login, $mdp;
        $gateway = new ListeTachesGateway(new Connexion($dsn, $login, $mdp));
        $results = $gateway->nbListeTaches();
        return $results[0]["count(*)"];
    }

}