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
        //response file json
       //echo json_decode($api->getAll(),true);
        //http_response_code(400);
        //return json_encode($api->getAll());
    }
    
?>