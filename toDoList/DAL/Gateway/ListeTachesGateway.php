<?php


class ListeTachesGateway
{
    private $con;
    private $tabN;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getListeTachesbyID($idListeTaches){
        $query = 'SELECT * FROM ListeTaches where idListeTaches=:idListeTaches';
        $this->con->executeQuery($query, array(':idListeTaches' => array($idListeTaches, PDO::PARAM_INT)));
        return $this->con->getResult();
    }

    public function getAllListeTachesPublic()
    {
        $query = 'SELECT * FROM ListeTaches where confidentialite = false order by idListeTaches';
        $this->con->executeQuery($query, array());
        return $this->con->getResults();

    }

    public function getAllListeTachesByPseudo($pseudo)
    {
        $query = 'SELECT * FROM ListeTaches where pseudo=:pseudo order by idListeTaches';
        $this->con->executeQuery($query, array(':pseudo' => array($pseudo, PDO::PARAM_STR)));
        return $this->con->getResults();
    }

    public function insertListeTaches($nom, $confidentialite, $description)
    {
        $query = 'Insert into Tache values(NULL, :nom, :confidentialite, :description )';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR),
            ':confidentialite' => array($confidentialite, PDO::PARAM_INT), ':description' => array($description, PDO::PARAM_STR)));
    }

    public function deleteListeTaches($idListeTache)
    {
        $query = 'DELETE FROM Tache where idListeTache=:idListeTache';
        $this->con->executeQuery($query, array(':idListeTache' => array($idListeTache, PDO::PARAM_INT)));
    }

    public function nbListeTaches()
    {
        $query = 'SELECT count(*) FROM ListeTaches';
        $this->con->executeQuery($query, array());
        $results = $this->con->getResults();
        return $results[0]["count(*)"];
    }
}