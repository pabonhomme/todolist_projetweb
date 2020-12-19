<?php


class Tache
{
    private $idTache;
    private $nom;
    private $terminee;
    private $idListeTaches;

    public function __construct(int $idTache, string $nom, bool $terminee, int $idListeTaches)
    {
        $this->setIdTache($idTache);
        $this->setNom($nom);
        $this->setTerminee($terminee);
        $this->setIdListeTaches($idListeTaches);
    }

    /**
     * @return mixed
     */
    public function getIdTache()
    {
        return $this->idTache;
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
    public function getTerminee()
    {
        return $this->terminee;
    }

    /**
     * @return mixed
     */
    public function getIdListeTaches()
    {
        return $this->idListeTaches;
    }

    /**
     * @param mixed $idTache
     */
    public function setIdTache($idTache)
    {
        $this->idTache = $idTache;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $terminee
     */
    public function setTerminee($terminee)
    {
        $this->terminee = $terminee;
    }

    /**
     * @param mixed $idListeTaches
     */
    public function setIdListeTaches($idListeTaches)
    {
        $this->idListeTaches = $idListeTaches;
    }

}