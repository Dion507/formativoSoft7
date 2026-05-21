<?php
/**
 * Clase.php — FormativoForm_P1 (GET)
 * ============================================================
 * Clase Persona: modela los datos capturados en el formulario.
 * Utiliza un constructor para inicializar el objeto y arrays
 * asociativos para gestionar la información internamente.
 *
 * Asignatura : Desarrollo de Software VII
 * Módulo     : II — Aplicaciones Web Interactivas en PHP
 * Docente    : Ing. María Yahaira Tejedor M. MSc.
 * ============================================================
 */
class Persona
{
    // ── Propiedades privadas ─────────────────────────────────
    private string $nombreApellido;  // Nombre completo del usuario
    private string $sexo;            // Femenino | Masculino
    private string $nacionalidad;    // País de origen
    private array  $intereses;       // Array de intereses seleccionados
    private string $acercaDe;        // Descripción personal

    /**
     * Constructor: recibe un array asociativo 1D con todos
     * los campos del formulario y asigna cada valor a la propiedad
     * correspondiente del objeto.
     *
     * @param array $datos Array asociativo con claves:
     *   'nombre_apellido' | 'sexo' | 'nacionalidad' |
     *   'intereses'(array) | 'acerca_de_vos'
     */
    public function __construct(array $datos)
    {
        $this->nombreApellido = $datos['nombre_apellido'];
        $this->sexo           = $datos['sexo'];
        $this->nacionalidad   = $datos['nacionalidad'];
        $this->intereses      = $datos['intereses'];    // sub-array
        $this->acercaDe       = $datos['acerca_de_vos'];
    }

    /**
     * ObtenerDatos(): devuelve un array asociativo 1D con los
     * datos básicos de la persona (sin los intereses).
     *
     * @return array ['Nombre y Apellido', 'Sexo', 'Nacionalidad', ...]
     */
    public function ObtenerDatos(): array
    {
        return [
            'Nombre y Apellido' => $this->nombreApellido,
            'Sexo'              => $this->sexo,
            'Nacionalidad'      => $this->nacionalidad,
            'Acerca de vos'     => $this->acercaDe,
        ];
    }

    /**
     * ObtenerIntereses(): devuelve el array de intereses.
     *
     * @return array Lista indexada de intereses seleccionados.
     */
    public function ObtenerIntereses(): array
    {
        return $this->intereses;
    }

    /**
     * ObtenerArrayCompleto(): devuelve el array asociativo 1D
     * completo incluyendo el sub-array de intereses. Útil para
     * mostrar la representación interna del objeto.
     *
     * @return array Todos los datos del objeto Persona.
     */
    public function ObtenerArrayCompleto(): array
    {
        return [
            'nombre_apellido' => $this->nombreApellido,
            'sexo'            => $this->sexo,
            'nacionalidad'    => $this->nacionalidad,
            'intereses'       => $this->intereses,
            'acerca_de_vos'   => $this->acercaDe,
        ];
    }
}
?>
