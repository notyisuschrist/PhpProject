<?php

class Database{

    public ?PDO $connection = null;
    public $statement;

    public function __construct($config, $username = 'user', $password = 'pass'){
        try{
            $dsn = 'mysql:' . http_build_query($config, '', ';', 0);
            $this -> connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch(PDOException $e){
            die("Could not connect to the database");
       }
    }

    public function query($query, $args = []): static
    {
        $this -> statement = $this -> connection -> prepare($query);
        $this -> statement -> execute($args);
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