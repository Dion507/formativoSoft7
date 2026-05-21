<?php 
<<<<<<< HEAD
if(isset($_POST['aceptar0'])){
	$carrera = $_POST['carreras'] ?? '';
}
=======
$carrera = $_POST['carreras'] ?? '';
>>>>>>> p1
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/css/estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation"> <!-- NAVBAR -->
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li ><a href="#">P1</a></li>
							<li class="active"><a href="#">P2</a></li>
						</ul>
						
						
<<<<<<< HEAD
					</div><!-- /.navbar-collapse -->
=======
					</div>
>>>>>>> p1
				</div>
			</nav>	<!-- TERMINA NAVBAR -->

			<main> <!-- INICIA MAIN -->
				<div class="panel panel-default" class="otro"> <!-- INICIA PANEL -->
					<div class="panel-body" >
						<div class="contenedor"> <!-- INICIA CONTENEDOR -->
<<<<<<< HEAD
							

							 <div class="cajas">
<form method="POST" class="form1">
								<fieldset> <!-- INICIA FIELD 1 -->
										<legend>Datos personales</legend>
										<p>Nombre <input type="text" name="nombre" id="input" class="form-control" value="" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" required="required"  title=""></p>
										<p>Correo electronico <input type="email" name="correo" id="input" class="form-control" value="" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" required="required" title=""></p>
										<p>Edad <input type="number" name="edad" id="input" class="form-control" value="" min="1" max="150" pattern="/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.com$/" required="required" title=""></p>
=======
							<form method="POST" class="form1">
								<fieldset> <!-- INICIA FIELD 1 -->
										<legend>Datos personales</legend>
										<p>Nombre <input type="text" name="nombre" id="input" class="form-control" value="" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" required="required"  title=""></p>
										<p>Correo electronico <input type="email" name="correo" id="input" class="form-control" value="" pattern="/^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/" required="required" title=""></p>
										<p>Edad <input type="number" name="edad" id="input" class="form-control" value="" min="0" required="required" title=""></p>
>>>>>>> p1
								</fieldset> <!-- TERMINA FIELD 1 -->

								<fieldset><!-- INICIA FIELD 2-->
									<legend>Carrera y materias</legend>
									<select name="carreras" id="input" class="form-control" required="required">
										<option value="DS">Desarrolo de Software</option>
										<option value="redes">Redes</option>
										<option value="ciber">Ciberseguridad</option>
									</select> <!-- TERMINA FIELD 2-->
								</fieldset>

<<<<<<< HEAD
								<input type="submit" name="aceptar0" value="mostrar">
=======
								<input type="submit" value="mostrar">
>>>>>>> p1
							</form>

							<?php 
							if($carrera != '')
							{
							?>
							
<<<<<<< HEAD
							<form method="POST" class="form1">
=======
							<form method="POST" action="/p2/procesar.php" class="form1">
>>>>>>> p1
								<input type="hidden" name="carreras" id="input" class="form-control" value="<?php echo $carrera;?>">
								<input type="hidden" name="nombre" id="input" class="form-control" value="<?php echo $_POST['nombre'];?>">
								<input type="hidden" name="correo" id="input" class="form-control" value="<?php echo $_POST['correo'];?>">
								<input type="hidden" name="edad" id="input" class="form-control" value="<?php echo $_POST['edad'];?>">
								
								<?php 
								if($carrera == 'DS'){
									echo '<div class="maters">
									<h1>Seleccione materias</h1><br> 
									<input type="checkbox" name="car[]" value="DS101">Programación I  <br>
									<input type="checkbox" name="car[]" value="DS202">Base de Datos  <br>
								    <input type="checkbox" name="car[]" value="DS303">Ingeniería de Software 
								</div>
									';
								} elseif ($carrera == 'redes') {
									echo '
									<div class="maters">
									<h1>Seleccione materias</h1><br> 
									<input type="checkbox" name="car[]" value="RED101">Redes I  <br>
									<input type="checkbox" name="car[]" value="RED202">Seguridad Informática <br>
								</div>
									';
								} elseif($carrera == 'ciber'){
									echo '
									<div class="maters">
									<h1>Seleccione materias</h1><br> 
									<input type="checkbox" name="car[]" value="CIB101">Criptografía <br>
									<input type="checkbox" name="car[]" value="CIB202">Análisis de Forense<br>
									<input type="checkbox" name="car[]" value="CIB303">Hackeo Ético
								</div>
									';
								}
								?>

<<<<<<< HEAD
								<input type="submit" name="aceptar" value="Aceptar">
=======
								<input type="submit" value="Aceptar">
>>>>>>> p1
							</form>
						     <?php 
						     }
						     ?>
<<<<<<< HEAD
							 </div>

							 <div class="resultados">
								<?php 
							 if(isset($_POST['aceptar'])){
								include 'procesar.php';
								
								$proceso = new proceso();
								$validar = $proceso -> validarEstudiante();

                                if($validar === true)
                                {
									$Student = $proceso->Student;
									include 'salida.php';
                                } 
                                else
                                {    
                                echo '
                                <div class="alert alert-danger">
                                '.$validar.'
                                </div>
                                ';
                                }
							 }
							 ?>
							 </div>

							 
=======
>>>>>>> p1
						</div> <!-- TERMINA CONTENEDOR -->
					</div>
				</div> <!-- TERMINA PANEL -->
			</main> <!-- TERMINA MAIN -->
		</body>
</html>