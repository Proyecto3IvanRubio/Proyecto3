<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recepción de los datos</title>
</head>
<body>
	<?php
	$conexion = mysqli_connect('localhost', 'root', '', 'bd_educayaprende');
		//le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
		$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");
		if (!$conexion) {
		    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}
		//llamamos a la función extract para extraer los datos del array $_REQUEST y lo meta todo en las variables del mismo nombre del html
		extract($_REQUEST);
		$tl = "SELECT * FROM tbl_reserva ";
		$sql = "SELECT * FROM tbl_reserva ";
		//valores entre fechas minimo y maximo
		
		$sql.=" WHERE (fecha_reserva BETWEEN '".$fecha_ini."'  AND '".$fecha_dev."')";	
		
		//echo $tl;  
		echo $sql;
		
		
		//echo "---$sql---<br/><br/>";
		$reserva = mysqli_query($conexion, $sql);
		//$reserva = mysqli_query($conexion, $tl);
		
		if(mysqli_num_rows($reserva)!=0){
			echo "Número de productos: " . mysqli_num_rows($reserva) . "<br/><br/>";
			while($anuncio = mysqli_fetch_array($reserva)){
				echo "Fecha inicial: " . $fecha_ini['fecha_reserva'] . "<br/>";
				echo "Fecha devolucion: " . $fecha_dev['fechaF_reserva'] . "<br/></td>";
				
		}
	}
		
		mysqli_close($conexion);
	?>
</body>
</html>