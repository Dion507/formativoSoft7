<<<<<<< HEAD
<?php

$datos = $Student->obtenerDatos();

$materias = $Student->obtenerMaterias();


// ALERT
echo '
<div class="alert alert-success" role="alert">

    <strong>¡Formulario procesado correctamente!</strong>

</div>
';


// PANEL DATOS
echo '
<div class="panel panel-primary">

    <div class="panel-heading">

        <h3 class="panel-title">
            Datos del estudiante
        </h3>

    </div>

    <div class="panel-body">

        <table class="table table-bordered table-hover">

            <tr>
                <th>Nombre</th>
                <td>'.$datos['nombre'].'</td>
            </tr>

            <tr>
                <th>Correo</th>
                <td>'.$datos['correo'].'</td>
            </tr>

            <tr>
                <th>Edad</th>
                <td>'.$datos['edad'].'</td>
            </tr>

            <tr>
                <th>Carrera</th>
                <td>'.$datos['carrera'].'</td>
            </tr>

        </table>

    </div>

</div>
';


// PANEL MATERIAS
echo '
<div class="panel panel-success">

    <div class="panel-heading">

        <h3 class="panel-title">
            Materias seleccionadas
        </h3>

    </div>

    <div class="panel-body">

        <table class="table table-striped table-bordered">

            <tr>
                <th>Nombre</th>
                <th>Codigo</th>
            </tr>
';


foreach($materias as $materia)
{
    echo '
    <tr>

        <td>'.$materia['nombre'].'</td>

        <td>'.$materia['codigo'].'</td>

    </tr>
    ';
}


echo '
        </table>

    </div>

</div>
';
=======
<?php 

>>>>>>> p1

?>