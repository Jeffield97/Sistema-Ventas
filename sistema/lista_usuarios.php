<?php include_once "includes/header.php"; ?>


<!-- Begin Page Content -->
<?php
        $json = file_get_contents('http://localhost:8080/asistencia/API/testApi.php');
        // $json=file_get_contents('http://localhost:8080/Sistema_venta_basico/sistema/api/productos.php');
        $datos = json_decode($json, true);
        //Comprobar si $datos es un array no esta vacio	
        if (is_array($datos) && !empty($datos)) {
            //$array = json_decode($json);
            $items = $datos['users'];

			//Mostrar los datos de $items   en una tabla
			echo "<table class='table table-striped'>
			<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Usuario</th>
			<th>Email</th>
			<th>Tipo de usuario</th>
			
			</tr>";
			foreach ($items as $item) {
				echo '<tr>
				<td>'.$item['id'].'</td>
				<td>' . $item['nombre'] . '</td>
				<td>' . $item['apellidos'] . '</td>
				<td>' . $item['login'] . '</td>
				<td>' . $item['email'] . '</td>
				<td>' . $item['idtipousuario'] . '</td>
				</tr>';
			}
			echo "</table>";
            //echo $items[0]['id'];


            /*foreach ($items as $item) {
                echo $item ['codproducto'];
            }*/
        }
        //echo $items;
        ?>
<!-- /.container-fluid -->


<!-- End of Main Content -->


