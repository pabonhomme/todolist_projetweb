<?php

class Validation
{

    public static function ValidationString($val)
    {
        return filter_var($val, FILTER_SANITIZE_STRING);

    }

    public static function ValidationMail($email)
    {
        if(!isset($email) or empty($email))
            return false;

        $email=filter_var($email, FILTER_SANITIZE_EMAIL);

        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }

        return false;

    }

    public static function ValidationBoolean($boolean)
    {
        if(!isset($boolean) or empty($boolean))
            return false;


        if(filter_var($boolean, FILTER_VALIDATE_BOOLEAN))
        {
            return true;
        }

        return false;

    }



}