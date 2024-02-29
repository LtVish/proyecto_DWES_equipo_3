<?php

    class DBdriver{
        private PDO|null $pdo;
        private string $host;
        private string $dbname;
        private string $usuario;
        private string $password;
        function __construct(string $host,string $dbname,string $usuario,string $password){
            $this->host=$host;
            $this->dbname=$dbname;
            $this->usuario=$usuario;
            $this->password=$password;
            $this->pdo=null;
        }
        function TearUp(){
            if($this->pdo==null){
                $this->pdo= new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8",$this->usuario,$this->password);
            }
        }
        function TearDown(){
            if($this->pdo!=null){
                $this->pdo=null;
            }
        }
        function GetPDO():PDO{
            return $this->pdo;
        }
        function prepare($query) {
            return $this->GetPDO()->prepare($query);
        }
        function ExecuteSQLQuery(string $query,bool $fetch=true,array $bind=[]):PDOStatement{
            $statement=$this->GetPDO()->prepare($query);
            if($fetch){
                $statement->setFetchMode(PDO::FETCH_ASSOC);
            }
            foreach($bind as $element){
                $statement->bindParam(":".$element,$element);
            }
            try{
                $statement->execute();
            }catch(PDOException $e){
                echo "PDOException: ".$e->getMessage();
            }
            return $statement;
        }//Quitar el fetch y Guarda ExecuteSQLQuery
        function BeginTransaction(){
            try{
                $this->GetPDO()->beginTransaction();
            }catch(PDOException $e){

            }
        }
        function AddQueryIntoCurrentTransaction($query){
            $this->GetPDO()->query($query);
        }
        function ExecuteTransaction():bool{
            try{
                if(!$this->GetPDO()->commit()){
                    $this->GetPDO()->rollBack();
                    return false;
                }
                return true;
            }catch(PDOException $e){
            }
        }
    }
    const driver=new DBdriver('database','reforestaDB','root','Pass1234');
    //No instanciar el pdo interno, hacer factory aparte para conectar y desconectar después de hacer operaciones en la db
?>