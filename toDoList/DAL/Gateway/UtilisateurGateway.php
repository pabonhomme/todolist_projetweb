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
        $querry = 'SELECT * FROM UTILISATEUR order by pseudo';
        $this->con->executeQuerry($querry, array());
        $results = $this->con->getResults();

        foreach ($results as $row)
            $this->tabU[] = new Utilisateur($row['pseudo'], $row['motDePasse']);

        return $this->tabU;
    }


    public function supprimerUtilisateur($pseudo)
    {
        $querry = 'DELETE FROM UTILISATEUR WHERE pseudo = :pseudo';
        $this->con->executeQuerry($querry, array(':pseudo' => array($pseudo, PDO::PARAM_STR)));
    }

    public function insererUtilisateur($pseudo, $motDePasse)
    {
        $querry = 'INSERT INTO UTILISATEUR VALUES(:pseudo,:motDePasse)';
        $this->con->executeQuery($querry, array(':pseudo' => array($pseudo, PDO::PARAM_STR), ':motDePasse' => array($motDePasse, PDO::PARAM_STR)));
    }
}