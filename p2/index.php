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
						
						
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>	<!-- TERMINA NAVBAR -->

			<main> <!-- INICIA MAIN -->
				<div class="panel panel-default" class="otro"> <!-- INICIA PANEL -->
					<div class="panel-body" >
						<div class="contenedor">
							<form method="POST" action="" class="form1">
									<fieldset> <!-- INICIA FIELD 1 -->
										<legend>Datos personales</legend>
										<p>Nombre <input type="text" name="nombre" id="input" class="form-control" value="" required="required" pattern="" title=""></p>
										<p>Correo electronico <input type="email" name="" id="input" class="form-control" value="" required="required" title=""></p>
										<p>Edad <input type="number" name="" id="input" class="form-control" value="" min="{5"} max="" step="" required="required" title=""></p>
										
									</fieldset> <!-- TERMINA FIELD 1 -->

									<fieldset>
										<legend>Carrera y materias</legend> 
										<form  method="POST" action="<?php ?>" class="form2">
											<label>Seleccione carrerra</label>
											 <select name="carreras" id="input" class="form-control">
												<option value="ds">Desarrollo de Software</option>
												<option value="redes">Redes</option>
												<option value="ciber">Ciberseguridad</option>
											</select>

										</form>
									</fieldset>
								</form>
						</div>
					</div>
				</div> <!-- TERMINA PANEL -->
			</main> <!-- TERMINA MAIN -->
		</body>
</html>