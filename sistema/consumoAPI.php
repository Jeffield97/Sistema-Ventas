<?php
        $json = file_get_contents('http://localhost:8080/Sistema_venta_basico/sistema/api/testApi.php');
        // $json=file_get_contents('http://localhost:8080/Sistema_venta_basico/sistema/api/productos.php');
        $datos = json_decode($json, true);
        //Comprobar si $datos es un array no esta vacio	
        if (is_array($datos) && !empty($datos)) {
            //$array = json_decode($json);
            $items = $datos['items'];
            //Mostrar los datos de $items   en una tabla
            echo "<table class='table table-striped'>
             <tr>
             <th>ID</th>
             <th>Nombre del producto</th>
             <th>Precio</th>
             <th>Cantidad</th>

             </tr>";

            foreach ($items as $item) {
                 echo '<tr>
                 <td>'.$item['codproducto'].'</td>
                 <td>' . $item['descripcion'] . '</td>
                 <td>' . $item['precio'] . '</td>
                 <td>' . $item['existencia'] . '</td>
                 </tr>';
            }
            echo "</table>";


            /*foreach ($items as $item) {
                echo $item ['codproducto'];
            }*/
        }
        //echo $items;
        ?>