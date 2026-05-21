<?php 

class Estudiante
{
    public $datos;
	public $materias;
	
	function __construct($mater,$data)
	{
		
        $this->datos=$data;
        $this->materias=$mater;
	}

	function obtenerDatos(){
	return $this -> datos;
    }
    
	function obtenerMaterias(){
    return $this -> materias;
    }
}


?>

