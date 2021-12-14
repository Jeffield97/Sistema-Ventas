<?php

include_once 'db.php';

class Producto extends DB{
    
    function obtenerProductos(){
        $query = $this->connect()->query('SELECT * FROM producto');
        return $query;
    }

    function obtenerProducto($id){
        $query = $this->connect()->prepare('SELECT * FROM producto WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

}

?>