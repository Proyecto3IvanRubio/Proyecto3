<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <title>Log-in</title>
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
		$sql = "SELECT * FROM tbl_usuario WHERE usuario_usuario = '$user' AND password_usuario ='$pass'	";
		$usuarios= mysqli_query($conexion, $sql);
		echo "$sql";
		if(mysqli_num_rows($usuarios)>0){
			header('Location: ../HTML/index.html');
		}
		else{
			header('Location: login.html');
		}
	mysqli_close($conexion);
		?>
</body>
</html>
