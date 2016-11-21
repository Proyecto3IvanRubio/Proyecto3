<!--
Author: Alejandro
CoAuthor: Ivan
CoAuthor: Miguel
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Educa y Aprende | Home </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>
</head>
<body>
   <!--- start-header---->
  <div class="wrapper">
    <!--start-header---->
		 <div class="header">
	       <div class="container header_top">
				<div class="logo" style="width: 50%;">
				  <a href="index.html"><img src="images/logo.png" style="width:70%;" alt=""></a>
				</div>
		  		<div class="menu">

					<ul class="nav" id="nav">
					  <li class="current"><a href="index.html">Inicio</a></li>
            <li><a href="reservas.html">Reservas</a></li>
            <li><a href="historial.html">Historial</a></li>
            <li><a href="incidencias.html">Incidencias</a></li>
            <li><a href="finalizarReserva.html">Finalizar Reserva</a></li>
					  <div class="clearfix"></div>
					</ul>
					<script type="text/javascript" src="js/responsive-nav.js"></script>
				</div>
	  			<div class="clearfix"> </div>
			    <!--//End-top-nav---->
			 </div>
		</div>
	<!--- //End-header---->

	<?php

		//realizamos la conexión
			$conexion = mysqli_connect('localhost', 'root','', 'bd_bicis');
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

     <div class="container banner">
	 	<div class="row">
	 			<form name="f1" action="VerMaterialesDisponibles.php" method="GET" onsubmit="return validar();">

        <table style="border-spacing: 15px; border-collapse: inherit;" >
        <tr>
          <td>
          <br/>
             <strong><h2><u>Reserva:</u></h2><br/></strong>

 	<strong>Tipo Recurso :    </strong>

            <select name="material" id="material">
            <optgroup label="Aulas">
              <option value="Aula1" >Aula de Mates</option>
              <option value="Aula2">Aula de Inglés</option>
              <option value="Aula3">Aula de Castellano</option>
              <option value="Aula4">Aula de Física</option>
              <option value="Aula5" >Aula de Informática 1</option>
              <option value="Aula6">Aula de Informática 2</option>
              <option value="Aula7" >Sala de Reuniones</option>
              <option value="Aula8">Despacho de Entrevistas 1</option>
              <option value="Aula9" >Despacho de Entrevistas 2</option>
              </optgroup>


              <optgroup label="Portátiles">
              <option value="Portatil1">Portátil 1</option>
              <option value="Portatil2">Portátil 2</option>
              <option value="Portatil3" >Portátil 3</option>
              </optgroup>

              <optgroup label="Móviles">
              <option value="Movil1">Móvil 1</option>
              <option value="Movil2">Móvil 2</option>
              </optgroup>

              <optgroup label="Otros">
              <option value="Proyector">Proyector</option>
              <option value="Carro">Carro</option>
              </optgroup>

             <a href="../HTML/VerMaterialesDisponibles.php" target="_self"> <input style  ="background-color:#90EE90 ; margin-left: 10px;" type="submit" name="reservar" value="Reservar"/><br/><br/></td>


          </select><br/>
    </td>
</tr>
<tr>
<td></td>
<br/>

</tr>

        </table>

	 				<span></span>

	 	 </div>
	 </div>
	 <div class="main">
	 	<div class='container content_top'>
	 		<div class='row'>
	 			<div class="col-md-4 flag_grid">
	 			</div>
	 		</div>
	 	</div>
	 	<div class='container content_middle'>
	 		<div class="row">
	 			<div class="col-md-8 middle_left">
	 			</div>
	 			<div class="col-md-4">


							  <div class="clear"></div>
						  </ul>

							     </div>

 </div>
</body>
</html>
