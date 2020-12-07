<?php


class ListeTachesGateway
{
    private $con;
    private $tabN;

    public function __construct($c){
        $this->con=$c;
    }

    public function getAllListeTachesPublic(){
        $query='SELECT * FROM ListeTaches where confidentialite = false order by idListeTaches';
        $this->con->executeQuery($query, array());
        $results = $this->con->getResults();
        foreach($results as $row){
            $this->tabN[]=new ListeTaches($row['idListeTaches'], $row['nom'], $row['confidentialite'], $row['description']);
        }
        return $this->tabN;
    }

    public function getAllListeTachesByPseudo($pseudo){
        $query='SELECT * FROM ListeTaches where pseudo=:pseudo order by idListeTaches';
        $this->con->executeQuery($query, array(':pseudo'=>array($pseudo, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        foreach($results as $row){
            $this->tabN[]=new ListeTaches($row['idListeTaches'], $row['nom'], $row['confidentialite'], $row['description']);
        }
        return $this->tabN;
    }

    public function insertListeTaches($nom, $confidentialite, $description){
        $query='Insert into Tache values(NULL, :nom, :confidentialite, :description )';
        $this->con->executeQuery($query, array(':nom'=>array($nom, PDO::PARAM_STR),
            ':terminee'=>array($confidentialite, PDO::PARAM_INT), ':idListeTaches'=>array($description, PDO::PARAM_STR)));
    }

    public function deleteListeTaches($idListeTache){
        $query='DELETE FROM Tache where $idListeTache=:$idListeTache';
        $this->con->executeQuery($query, array(':idTache'=>array($idListeTache, PDO::PARAM_INT)));
    }

    public function nbListeTaches(){
        $query='SELECT count(*) FROM ListeTaches';
        $this->con->executeQuery($query, array());
        $results = $this->con->getResults();
        return $results[0]["count(*)"];
    }
}