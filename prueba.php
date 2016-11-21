

	<?php

		//realizamos la conexión
			$conexion = mysqli_connect('localhost', 'root','', 'bd_educayaprende');
			$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

			if (!$conexion) {
					echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
					echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
					exit;
			}
			$sin_nada = 0 ;
			extract($_REQUEST);

				$sql = "SELECT id_reserva, nombre_material, estado_reserva AS Disponibilidad
				FROM tbl_reserva
				INNER JOIN tbl_material";
				$reservas= mysqli_query($conexion, $sql);
				if(mysqli_num_rows($reservas)>0){
					echo "Número de reservas: " . mysqli_num_rows($reservas) . "<br/><br/>";
					if ( $reserva['estado_reserva']== 1) {
						while($reserva = mysqli_fetch_array($reservas)){
							echo "Material: " . $reserva['nombre_material'] . "<br/>";
							echo "estado_reserva: " . $reserva['estado_reserva'] . "<br/>";
						}
					}
					else {
					 	$sin_nada += 1;
					}
				}

			}
			else{
				//COMPROBAR QUE LOS DATOS DE LA BD NO ESTAN SIN
				echo "<script language='javascript'>alert('NO SE HA RELLENADO NINGUNA CAMPO DEL FORMULARIO.');</script>";
				echo "<h1 style='text-align:center;'> Todas las Bicis Encontradas </h1> <br/>";
				$sql = "SELECT * FROM tbl_material ";
				$materiales = mysqli_query($conexion, $sql);
				if(mysqli_num_rows($materiales)>0){
					echo "Número de reservas: " . mysqli_num_rows($reservas) . "<br/><br/>";
					while($material = mysqli_fetch_array($materiales)){
						echo "Nombre: " . $material['nombre_material'] . "<br/>";
					}
				}
				else {
					echo "No hay datos que mostrar!";
				}
			}

    mysqli_close($conexion);
		?>
