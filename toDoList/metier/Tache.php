<?php


class Tache
{
    private $idTache;
    private $nom;
    private $duree;
    private $description;

    public function __construct($idTache, $nom, $duree, $description){
        $this->idTache = $idTache;
        $this->nom = $nom;
        $this->duree = $duree;
        $this->description = $description;
    }

    public function getIdTache(){
        return $this->idTache;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getDuree(){
        return $this->duree;
    }

    public function getDescription(){
        return $this->description;
    }

}