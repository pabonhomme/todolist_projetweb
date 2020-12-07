<?php


class ListeTaches
{
    private $idListeTaches;
    private $nom;
    private $listeDeTaches;
    private $confidentialite;
    private $description;

    public function __construct($idListeTaches, $nom, $confidentialite, $description)
    {
        $this->setIdListeTaches($idListeTaches);
        $this->setNom($nom);
        $this->setConfidentialite($confidentialite);
        $this->setDescription($description);
    }

    /**
     * @return mixed
     */
    public function getIdListeTaches()
    {
        return $this->idListeTaches;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getConfidentialite()
    {
        return $this->confidentialite;
    }

    /**
     * @return mixed
     */
    public function getListeTaches()
    {
        return $this->listeTaches;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $idListeTaches
     */
    public function setIdListeTaches($idListeTaches)
    {
        $this->idListeTaches = $idListeTaches;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $confidentialite
     */
    public function setConfidentialite($confidentialite)
    {
        $this->confidentialite = $confidentialite;
    }

    /**
     * @param mixed $listeTaches
     */
    public function setListeTaches($listeTaches)
    {
        $this->listeTaches = $listeTaches;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}