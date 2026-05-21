<?php 

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

$datosEstudiante = [
    "nombre" => $_POST['nombre'],
    "correo" => $_POST['correo'],
    "edad" => $_POST['edad']
];

$nombreCodigo = "";

$materia = $_POST['car'];
$materiaBi = [];

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



validarEstudiante($datosEstudiante);

function validarEstudiante($datosEstudiante){
    $patrones = [
        "nombres" => "/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/",
        "correos" => "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/",
        "edades" => "/^[1-9][0-9]{0,2}$/"
    ];

    try {

        if(!(preg_match($patrones["nombres"],$datosEstudiante["nombre"]))){
            throw new Exception("Los patrones del nombre no coenciden");
            return;
        }
        if(!(preg_match($patrones["correos"],$datosEstudiante["correo"]))){
            throw new Exception("Los patrones del correo no coenciden");
            return;
        }
        if(!(preg_match($patrones["edades"],$datosEstudiante["edad"]))){
            throw new Exception("Los patrones de la edad no coenciden");
            return;
        }

    } catch (Exception $e){
        return "Error: ".$e -> getMessage();
    }
}
echo $carrera;
echo '<br>';
print_r($materiaBi);
echo '<br>';
print_r($datosEstudiante);

?>