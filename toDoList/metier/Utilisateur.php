<?php


class Utilisateur
{
    private $pseudo;
    private $nom;
    private $prenom;
    private $motDePasse;

    public function __construct($pseudo, $nom, $prenom, $motDePasse){
        $this->pseudo = $pseudo;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->motDePasse = $motDePasse;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getMotDePasse(){
        return $this->motDePasse;
    }
}