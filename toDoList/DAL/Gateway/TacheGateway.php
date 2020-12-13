<?php


class TacheGateway
{
    private $con;
    private $tabN;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getAllTachesByIdListeTaches($idListeTaches)
    {
        $query = 'SELECT * FROM TACHE where idListeTaches=:idListeTaches order by idTache';
        $this->con->executeQuery($query, array(':idListeTaches' => array($idListeTaches, PDO::PARAM_INT)));
        return $this->con->getResults();
    }

    public function insertTache($nom, $terminee, $idListeTaches)
    {
        $query = 'Insert into Tache values(NULL, :nom, :terminee, :idListeTaches )';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR),
            ':terminee' => array($terminee, PDO::PARAM_INT), ':idListeTaches' => array($idListeTaches, PDO::PARAM_INT)));
    }

    public function deleteTache($idTache)
    {
        $query = 'DELETE FROM Tache where idTache=:idTache';
        $this->con->executeQuery($query, array(':idTache' => array($idTache, PDO::PARAM_INT)));
    }

    public function nbTache()
    {
        $query = 'SELECT count(*) FROM Tache';
        $this->con->executeQuery($query, array());
        $results = $this->con->getResults();
        return $results[0]["count(*)"];
    }
}