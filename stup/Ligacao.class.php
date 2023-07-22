<?php

date_default_timezone_set("America/Sao_Paulo");

abstract class Ligacao {    
    
    private $server = 'mysql:host=localhost;dbname=ruralchick';
    private $user = 'root';
    private $pass = '';
    
    
    
    protected function conecta(){
        try{
            $conn = new PDO($this->server, $this->user, $this->pass);
            $conn->exec("set names utf8");
            return $conn;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
}