<?php session_start();
		//realizamos la conexión
	$conexion = mysqli_connect('localhost', 'root', '', 'bd_proyecto3');

		$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");
		if (!$conexion) {
		    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}
		//extraemos las variables de usuario
		extract($_REQUEST);
		echo "nombre antiguo: $nombre_antiguo <br>";
		echo "nombre nuevo: $user <br>";
		echo "contra antigua: $contra_antigua <br>";
		echo "contra nueva: $pass <br>";

		if ($user===$nombre_antiguo && $pass===$contra_antigua) {
			$errores = "Tienes que modificarlo antes de enviar.";
			$_SESSION['errores'] = $errores;
			header('Location:modificarUsuarios.php');
			
		}else{$_SESSION['errores'] = "";}

		$sql = "UPDATE `tbl_usuario` SET ";


		if (isset($user)) {
			$sql .= "`user` = '$user'";
			if (isset($pass)) {
				if ($contra_antigua == $pass) {
					$completar = true;
				} else {
					$pass = hash('1234', $pass);
					$sql .= ", `pass` = '$pass' WHERE `tbl_usuarios`.`id_usuario` = $id_usuario;";
					$completar = false;
				}
			}
		}else{$user=$nombre_antiguo;
			if (isset($pass)) {
				if ($contra_antigua == $pass) {
					$sql .= "`pass` = '$pass' WHERE `tbl_usuarios`.`id_usuario` = $id_usuario;";
					$completar = false;
				} else {
					$pass = hash('1234', $pass);
				}
			}
		}
		if ($completar == true) {
			$sql .= " WHERE `tbl_usuario`.`id_usuario` = $id_usuario;";
		}
		$actualizar_recurso = mysqli_query($conexion, $sql);
	
		
	
	
	header('Location:modificarUsuarios.php');
?>
