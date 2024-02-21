<?php
require_once dirname(__DIR__).'DB/pizzeriadb.php';
class Pizza{
    private $id;
    private $titulo;
    private $descripcion;
    function __construct($id,$titulo="Predeterminado",$descripcion="Predeterminado")
    {
        $this->id=$id;
        $this->titulo=$titulo;
        $this->descripcion=$descripcion;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function insert(){
        $conexion = pizzeriaDB::connectDB();
        $insercion= "INSERT INTO pizzas (titulo,descripcion) VALUES (\"".$this->titulo."\",\"".$this->descripcion."\")";
        $conexion->exec($insercion);
    }
    public function delete(){
        $conexion=pizzeriaDB::connectDB();
        $borrado="DELETE FROM pizzas where id=\"".$this->id."\"";
        $conexion->exec($borrado);
    }
    public static function getPizzas(){
        $conexion=pizzeriaDB::connectDB();
        $seleccion="SELECT id,titulo,descripcion FROM pizzas";
        $consulta=$conexion->query($seleccion);
        $ofertas=[];
        while($registro=$consulta->fetchObject()){
            $ofertas[]=new Pizza($registro->getId(),$registro->getTitulo(),$registro->getDescripcion());
        }
        return $ofertas;
    }
    public static function getPizzaId($id){
        $conexion=pizzeriaDB::connectDB();
        $seleccion="SELECT id, titulo, descripcion FROM pizzas WHERE id=\"".$id."\"";
        $consulta=$conexion->query($seleccion);
        $registro=$consulta->fetchObject();
        $oferta=new Pizza($registro->getId(),$registro->getTitulo(),$registro->getDescripcion());
        return $oferta;
    }
}
?>