<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../productos.php';

class ApiProductos
{
    function GetAll()
    {
        $producto = new Producto();
        $productos = array();
        $productos['items'] = array();
        $res = $producto->obtenerProductos();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "codproducto" => $row['codproducto'],
                    "descripcion" => $row['descripcion'],
                    "proveedor" => $row['proveedor'],
                    "precio" => $row['precio'],
                    "existencia" => $row['existencia'],
                    "usuario_id" => $row['usuario_id'],

                );
                array_push($productos["items"], $item);
            }
        
            //echo json_encode($productos);
            return json_encode($productos);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }


    function getById($id){
        $producto = new Producto();
        $productos = array();
        $productos["items"] = array();

        $res = $producto->obtenerProducto($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                "codproducto" => $row['codproducto'],
                "descripcion" => $row['descripcion'],
                "proveedor" => $row['proveedor'],
                "precio" => $row['precio'],
                "existencia" => $row['existencia'],
                "usuario_id" => $row['usuario_id'],
            );
            array_push($productos["items"], $item);
            $this->printJSON($productos);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    
    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }
}

?>