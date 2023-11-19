<?php
    class DBdriver{
        private PDO $pdo;
        function __construct(string $host,string $dbname,string $usuario,string $password){
            $this->pdo= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$usuario,$password);
        }
        function GetPDO():PDO{
            return $this->pdo;
        }
        function ExecuteSQLQuery(string $query,bool $fetch=true):PDOStatement{
            $statement=$this->GetPDO()->prepare($query);
            if($fetch){
                $statement->setFetchMode(PDO::FETCH_ASSOC);
            }
            $statement->execute();
            return $statement;
        }//Quitar el fetch y Guarda ExecuteSQLQuery
    }
?>