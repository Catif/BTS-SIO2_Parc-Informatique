<?php

class Database{
    private $pdo;

    public function __construct(string $db_host, string $db_name, string $db_user, string $db_pswd, array $parameter){
        # Database connection
        try{
            $this->pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pswd, $parameter);
        }catch(PDOException $e){
            echo($e->getMessage());
            die("Une erreur est survenue lors de la connexion à la base de donnée");
        }
    }

    public function query(string $sql, array $params = [])
    {
        if($this->pdo !== null){
            $req = $this->pdo->prepare($sql);
            $req->execute($params);
    
            return $req;
        }
        return false;
    }

    public function returnLastInsertId()
    {
        if($this->pdo !== null){
            return $this->pdo->lastInsertId();

        }
        return false;
    }
}