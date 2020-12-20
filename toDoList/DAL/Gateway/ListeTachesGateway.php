<?php


class ListeTachesGateway
{
    private $con;

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
        $query = 'SELECT * FROM ListeTaches where confidentialite = true and pseudo=:pseudo order by idListeTaches';
        $this->con->executeQuery($query, array(':pseudo' => array($pseudo, PDO::PARAM_STR)));
        return $this->con->getResults();
    }

    public function insertListeTaches($nom, $confidentialite, $description, $pseudo)
    {
        $query = 'Insert into ListeTaches values(NULL, :nom, :confidentialite, :description, :pseudo)';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR),
            ':confidentialite' => array($confidentialite, PDO::PARAM_INT), ':description' => array($description, PDO::PARAM_STR), ':pseudo' => array($pseudo, PDO::PARAM_STR) ));
    }

    public function deleteListeTaches($idListeTaches)
    {
        $query = 'DELETE FROM ListeTaches where idListeTaches=:idListeTaches';
        $this->con->executeQuery($query, array(':idListeTaches' => array($idListeTaches, PDO::PARAM_INT)));
    }

    public function nbListeTaches()
    {
        $query = 'SELECT count(*) FROM ListeTaches';
        $this->con->executeQuery($query, array());
        return $this->con->getResults();
    }
}