<?php
class Connection
{
    public static function connect()
    {
        $link = new mysqli('localhost', 'root', '', 'php_simple_store');
        $link->query("SET NAMES 'utf8'");
        return $link;
    }
}
