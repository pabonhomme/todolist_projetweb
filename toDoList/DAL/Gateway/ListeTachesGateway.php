<?php


class ListeTachesGateway
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    /**
     * Permet de récupérer une liste de tâche en fonction d'un idListe
     * @param int $idListeTache id de la liste voulue
     * @return ListeTaches
     */
    public function getListeTachesbyID(int $idListeTaches)
    {
        $query = 'SELECT * FROM ListeTaches where idListeTaches=:idListeTaches';
        $this->con->executeQuery($query, array(':idListeTaches' => array($idListeTaches, PDO::PARAM_INT)));
        return $this->con->getResult();
    }

    /**
     * Permet de récupérer toutes les listes de tâches publiques
     * @return mixed
     */
    public function getAllListeTachesPublic()
    {
        $query = 'SELECT * FROM ListeTaches where confidentialite = false order by idListeTaches';
        $this->con->executeQuery($query, array());
        return $this->con->getResults();
    }

    /**
     * Permet de récupérer les listes de tâches propres à un utilisateur
     * @param string $pseudo pseudo de l'utilisateur
     * @return mixed
     */
    public function getAllListeTachesByPseudo(string $pseudo)
    {
        $query = 'SELECT * FROM ListeTaches where confidentialite = true and pseudo=:pseudo order by idListeTaches';
        $this->con->executeQuery($query, array(':pseudo' => array($pseudo, PDO::PARAM_STR)));
        return $this->con->getResults();
    }

    /**
     * Permet d'ajouter une liste de tâche dans la base de données
     * @param string $nom nom de la liste
     * @param bool $confidentialite liste privée ou non
     * @param string $description description de la liste
     * @param $pseudo // pseudo de l'utilisateur ou NULL si liste publique
     */
    public function insertListeTaches(string $nom, bool $confidentialite, string $description, $pseudo)
    {
        $query = 'Insert into ListeTaches values(NULL, :nom, :confidentialite, :description, :pseudo)';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR),
            ':confidentialite' => array($confidentialite, PDO::PARAM_INT), ':description' => array($description, PDO::PARAM_STR), ':pseudo' => array($pseudo, PDO::PARAM_STR)));
    }


    /**
     * Permet de supprimer une liste et ses tâches associées
     * @param int $idListeTaches id de la liste à supprimer
     */
    public function deleteListeTaches(int $idListeTaches)
    {
        $query = 'DELETE FROM ListeTaches where idListeTaches=:idListeTaches';
        $this->con->executeQuery($query, array(':idListeTaches' => array($idListeTaches, PDO::PARAM_INT)));
    }

    /**
     * Permet de récupérer le nombre de liste de taches
     * @return mixed
     */
    public function nbListeTaches()
    {
        $query = 'SELECT count(*) FROM ListeTaches';
        $this->con->executeQuery($query, array());
        return $this->con->getResults();
    }
}