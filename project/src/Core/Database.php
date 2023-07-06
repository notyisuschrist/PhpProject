<?php

class Database{

    public $connection;
    public $statement;

    public function __construct($config, $username = 'user', $password = 'pass'){
        try{
            $dsn = 'mysql:' . http_build_query($config, '', ';');
            $this -> connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch(PDOException $e){
            die("Could not connect to the database");
        }
    }

    public function query($query, $conditions = []){
        $this -> statement = $this -> connection -> prepare($query);
        $this -> statement -> execute($conditions);
        return $this;
    }

    public function find(){
        return $this -> statement -> fetch();
    }

    public function findOrAbort(){
        $result = $this -> find();

        if(!$result) abort();

        return $result;
    }

}