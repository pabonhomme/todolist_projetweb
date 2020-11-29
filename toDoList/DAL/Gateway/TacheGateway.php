<?php


class TacheGateway
{
    private $con;
    private $tabN;

    public function __construct($c){
        $this->con=$c;
    }


    public function findAllTache(){
        $query='SELECT * FROM TACHE order by idTache';
        $this->con->executeQuery($query, array());
        $results = $this->con->getResults();
        foreach($results as $row){
            $this->tabN[]=new Tache($row['idTache'], $row['nom'], $row['duree'],$row['description'] );
        }
        return $this->tabN;
    }

    public function insertTache($idTache, $nom, $duree, $description){
        $query='Insert into Tache values(:idTache, :nom, :duree, :description )';
        $this->con->executeQuery($query, array(':idTache'=>array($idTache, PDO::PARAM_STR), ':nom'=>array($nom, PDO::PARAM_STR),
            ':duree'=>array($duree, PDO::PARAM_STR), ':description'=>array($description, PDO::PARAM_STR)));
    }

    public function deleteTache($idTache){
        $query='DELETE FROM Tache where idTache=:idTache';
        $this->con->executeQuery($query, array(':idTache'=>array($idTache, PDO::PARAM_STR)));
    }

    public function nbTache(){
        $query='SELECT count(*) FROM Tache';
        $this->con->executeQuery($query, array());
        $results = $this->con->getResults();
        return $results[0]["count(*)"];
    }
}