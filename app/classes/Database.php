<?php
namespace App\classes;

class Database{
    public  function db_connection(){
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "portfolio";
        $link = mysqli_connect($hostName, $userName, $password, $dbName);
        return $link;
    }
}