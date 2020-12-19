<?php

class Validation
{


    public static function ValidationMail(string $email)
    {
        if (!isset($email) or empty($email))
            return false;

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;

    }

    public static function ValidationBoolean(bool $boolean)
    {
        if (!isset($boolean) or empty($boolean))
            return false;


        if (filter_var($boolean, FILTER_VALIDATE_BOOLEAN)) {
            return true;
        }

        return false;

    }

    public static function ValidationConnnexion(string $pseudo, string $mdp)
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