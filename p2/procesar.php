<?php 

include 'ClaseEstudiante.php';

// Inicializar variables
$carreraOn = [ //Reutilizar en salida.php
    "DS" => "Desarrolo de Software",
    "redes" => "Redes",
    "ciber" => "Ciberseguridad"
];
$codigos = [
    // Desarrollo de Software
    "DS101" => "Programación I",
    "DS202" => "Base de Datos",
    "DS303" => "Ingeniería de Software",

    // Redes
    "RED101" => "Redes I",
    "RED202" => "Seguridad Informática",

    // Ciberseguridad
    "CIB101" => "Criptografía",
    "CIB202" => "Análisis Forense",
    "CIB303" => "Hackeo Ético"
];

$datosEstudiante = [ // Inicializa arreglo unidimencional de los datos del estudiante 
    "nombre" => $_POST['nombre'],
    "correo" => $_POST['correo'],
    "edad" => $_POST['edad'],
    "carrera" => $carreraOn[$_POST['carreras']]
];

$nombreCodigo = "";

$materia = $_POST['car'];
$materiaBi = [];

// Codigo para crear materas en arreglo bidimencional de materias
foreach($materia as $codigo){
    foreach($codigos as $clave => $valor){
        if($codigo == $clave){
            $nombreCodigo = $valor;
        }
    }

    $materiaBi[] = [
        "nombre" => $nombreCodigo,
        "codigo" => $codigo
    ];
}

validarEstudiante($datosEstudiante); // Metodo que valida los campos nombre, correo, edad

function validarEstudiante($datosEstudiante){
    // Patronres
    $patrones = [
        "nombres" => "/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/",
        "correos" => "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/",
        "edades" => "/^[1-9][0-9]{0,2}$/"
    ];

    try {
        if($datosEstudiante["nombre"] == '' || $datosEstudiante["correo"] == '' || $datosEstudiante["edad"] == ''){
            throw new Exception("Ingrese los campos necesarios");
            return;
        }
        // Valida nombres
        if(!(preg_match($patrones["nombres"],$datosEstudiante["nombre"]))){
            throw new Exception("Los patrones del nombre no coenciden");
            return;
        }

        // Valida correo usando la funcion filter_var
        if(!(filter_var($datosEstudiante["correo"], FILTER_VALIDATE_EMAIL))){
            throw new Exception("Los patrones del correo no coenciden");
            return;
        }

        // Valida edad
        if(!(preg_match($patrones["edades"],$datosEstudiante["edad"]))){
            throw new Exception("Los patrones de la edad no coenciden");
            return;
        }
        
       
    } catch (Exception $e){
        return "Error: ".$e -> getMessage();
    }
}

// Borrar despues


// Inicializar la clase estudiante 
$Student = new Estudiante($materiaBi,$datosEstudiante);

include 'salida.php';

?>