<?php

class Validation
{

    public static function ValidationString(string $val):bool{

        $val = Nettoyage::NettoyageString($val);

        if(!isset($val) or empty($val)) {
            return false;
        }
        else return true;
    }

    public static function ValidationInt (int $nb):bool
    {
        $nb = Nettoyage::NettoyageInt($nb);

        if(!isset($nb) or empty($nb))
            return false;

        if (filter_var($nb, FILTER_VALIDATE_INT)) {
            return true;
        }

        return false;
    }

    public static function ValidationMail(string $email):bool
    {
        $email = Nettoyage::NettoyageEmail($email);

        if (!isset($email) or empty($email))
            return false;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;

    }

    public static function ValidationBoolean(bool $boolean):bool
    {
        if (!isset($boolean) or empty($boolean))
            return false;


        if (filter_var($boolean, FILTER_VALIDATE_BOOLEAN)) {
            return true;
        }

        return false;

    }

    public static function ValidationConnexion(string $pseudo, string $mdp)
    {

        if (!isset($pseudo)||$pseudo=="") {
            $Vueerreur[] =	"il n'y pas de login";
        }

        if ($pseudo != Nettoyage::NettoyageString($pseudo))
        {
            $dVueEreur[] =	"Il y a une tentative d'injection de code (attaque sécurité)";
        }

        if (!isset($mdp)||$mdp=="") {
            $Vueerreur[] =	"il n'y a pas de mot de passe ";
        }

        return $Vueerreur;

    }


}