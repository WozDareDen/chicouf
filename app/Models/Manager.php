<?php
//Defining Namespace
namespace Src\Models;
//DATABASE CONNECTION
class Manager
{
    protected function dbConnect()
    {
        // $db = new PDO('mysql:host=localhost;dbname=gretaxao_florentsp4;charset=utf8', 'gretaxao_florents', 'florents2017',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $db = new \PDO('mysql:host=localhost;dbname=newone;charset=utf8', 'root', '',array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}