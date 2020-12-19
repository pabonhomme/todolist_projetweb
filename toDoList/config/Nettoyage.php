<?php


class Nettoyage
{
    public static function NettoyageString(string $val)
    {
        return filter_var($val, FILTER_SANITIZE_STRING);

    }
}