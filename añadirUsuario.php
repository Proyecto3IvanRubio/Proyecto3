<?php session_start();
		//realizamos la conexión
	$conexion = mysqli_connect('localhost', 'root', '', 'bd_proyecto3');
		
		if (!$conexion) {
		    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}
		extract($_REQUEST);
		
		$sql1 = "SELECT * FROM tbl_usuario WHERE user = $user LIMIT 1";
		$newUser = mysqli_query($conexion, $sql1);
		
		if (mysqli_num_rows($newUser)===0) {
			$errores = '<li>El nombre de usuario ya existe</li><br>';
			$_SESSION['errores'] = $errores;
			header('Location:añadirUsuario.php');
		}
		if ($pass != $pass2) {
			$errorPass = '<li>Las contraseñas no coinciden</li>';
			$_SESSION['errorPass'] = $errorPass;
			header('Location:afegirUsuari.php');
		}
		$pass = hash('1234', $pass);
		$sql = "INSERT INTO `tbl_usuario` (`id_usuario`, `usuario_usuario`, `password_usuario`, `habilitado`) VALUES (NULL, '$user', '$pass', '1');";
		$_SESSION['Correcto'] = "Se ha añadido el usuario correctamente";
		$actualizar_recurso = mysqli_query($conexion, $sql);
		header('Location:añadirUsuario.php');
	
		
	
	
?>