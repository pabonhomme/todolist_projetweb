<?php


class UtilisateurGateway
{
    private $con;
    private $tabU;

    public function __construct($c)
    {
        $this->con = $c;
    }


    public function findAllUtilisateur()
    {
        $querry = 'SELECT * FROM UTILISATEUR order by nom';
        $this->con->executeQuerry($querry, array());
        $results = $this->con->getResults();

        foreach ($results as $row)
            $this->tabU[] = new Utilisateur($row['pseudo'], $row['nom'], $row['prenom'], $row['motDePasse']);

        return $this->tabU;
    }


    public function supprimerUtilisateur($nom)
    {
        $querry = 'DELETE FROM UTILISATEUR WHERE nom = :nom';
        $this->con->executeQuerry($querry, array(':nom' => array($nom, PDO::PARAM_STR)));
    }

    public function insererUtilisateur($pseudo, $nom, $prenom, $motDePasse)
    {
        $querry = 'INSERT INTO UTILISATEUR VALUES(:pseudo, :nom, :prenom, :motDePasse)';
        $this->con->executeQuery($querry, array(':pseudo' => array($pseudo, PDO::PARAM_STR), ':nom' => array($nom, PDO::PARAM_STR), ':prenom' => array($prenom, PDO::PARAM_STR), ':motDePasse' => array($motDePasse, PDO::PARAM_STR)));
    }
}