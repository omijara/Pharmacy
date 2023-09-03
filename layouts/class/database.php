<?php

class Database
{
    private $hostname;
    private $username;
    private $password;
    private $database;

    public $link;

   public function __construct()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "vehicle";

        $this->link = mysqli_connect($hostname,$username,$password,$database);
        //$this->link = new PDO("mysql:host=$hostname;dbname=database", $username, $password);
        //$this->link = new PDO("mysql:host={$this->hostname};dbname={$this->database}", "{$this->username}", "{$this->password}");
        return $this->link;

    }
}