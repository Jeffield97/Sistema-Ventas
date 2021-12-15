<?php
    include_once 'api_productos.php';

    $api = new ApiProductos();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if(is_numeric($id)){
            $api->getById($id);
        }else{
            $api->error('El id es incorrecto');
        }
    }else{
        $api->getAll();
        echo $api->getAll();
        return $api->getAll();
    }
    
?>