<?php

class Utils
{
    public static function deleteSession($var)
    {
        if (isset($_SESSION[$var])) {
            $_SESSION[$var] = null;
            return true;
        }
    }
}
