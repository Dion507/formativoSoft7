<?php
/**
 * procesar.php — FormativoForm_P1 (GET)
 * ============================================================
 * Procesamiento y validación PHP del lado servidor.
 *
 * Flujo:
 *   1. Verifica que los datos llegaron vía GET
 *   2. Sanitiza con htmlspecialchars / trim / filter_var
 *   3. Valida con preg_match y bloque try / catch
 *   4. Si válido → crea objeto Persona e incluye salida.php
 *   5. Si error  → redirige a index.php con parámetro ?error=
 *
 * Asignatura : Desarrollo de Software VII
 * Módulo     : II — Aplicaciones Web Interactivas en PHP
 * Docente    : Ing. María Yahaira Tejedor M. MSc.
 * ============================================================
 */

require_once 'Clase.php'; // Incluir la clase Persona

// ── 1. Verificar que la petición sea GET con datos ───────────
if ($_SERVER['REQUEST_METHOD'] !== 'GET' || empty($_GET['nombre_apellido'])) {
    header('Location: index.php');
    exit;
}

// ── 2. Array de errores de validación ────────────────────────
$errores = [];

// ── 3. Bloque try-catch principal ────────────────────────────
try {

    // ── NOMBRE Y APELLIDO ────────────────────────────────────
    if (empty(trim($_GET['nombre_apellido']))) {
        throw new InvalidArgumentException('El campo Nombre y Apellido es obligatorio.');
    }

    // Sanitizar: eliminar HTML malicioso y espacios extra
    $nombreApellido = trim(htmlspecialchars($_GET['nombre_apellido'], ENT_QUOTES, 'UTF-8'));

    /**
     * Validar con preg_match:
     * Patrón: dos o más palabras separadas por espacio.
     * Solo letras incluyendo tildes y ñ (español / portugués).
     */
    if (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ]{2,}(\s[A-Za-zÁÉÍÓÚáéíóúÑñ]{2,})+$/', $nombreApellido)) {
        throw new InvalidArgumentException(
            'Nombre y Apellido solo debe contener letras y espacios (mínimo nombre y un apellido).'
        );
    }

    // ── SEXO ─────────────────────────────────────────────────
    if (empty($_GET['sexo'])) {
        throw new InvalidArgumentException('Debe seleccionar su Sexo.');
    }

    $sexo = trim(htmlspecialchars($_GET['sexo'], ENT_QUOTES, 'UTF-8'));

    // Lista blanca de valores permitidos
    if (!in_array($sexo, ['Femenino', 'Masculino'], true)) {
        throw new InvalidArgumentException('El valor de Sexo no es válido.');
    }

    // ── NACIONALIDAD ─────────────────────────────────────────
    if (empty($_GET['nacionalidad'])) {
        throw new InvalidArgumentException('Debe seleccionar su Nacionalidad.');
    }

    $nacionalidad = trim(htmlspecialchars($_GET['nacionalidad'], ENT_QUOTES, 'UTF-8'));

    // Lista blanca de países del formulario
    $nacionesValidas = [
        'Argentina','Bolivia','Brasil','Chile','Colombia',
        'Costa Rica','Ecuador','Guatemala','Honduras','México',
        'Nicaragua','Panamá','Paraguay','Perú','Uruguay','Venezuela'
    ];

    if (!in_array($nacionalidad, $nacionesValidas, true)) {
        throw new InvalidArgumentException('La Nacionalidad seleccionada no es válida.');
    }

    // ── INTERESES (array de checkboxes) ─────────────────────
    if (empty($_GET['intereses']) || !is_array($_GET['intereses'])) {
        throw new InvalidArgumentException('Debe seleccionar al menos un Interés.');
    }

    $interesesPermitidos = ['Cine','Deportes','Internet','Libros','Música','Tecnología'];
    $intereses = [];

    foreach ($_GET['intereses'] as $item) {
        $sanitizado = trim(htmlspecialchars($item, ENT_QUOTES, 'UTF-8'));
        // Validar que cada ítem esté en la lista blanca
        if (!in_array($sanitizado, $interesesPermitidos, true)) {
            throw new InvalidArgumentException("Interés '$sanitizado' no reconocido.");
        }
        $intereses[] = $sanitizado;
    }

    // ── ACERCA DE VOS ────────────────────────────────────────
    if (empty(trim($_GET['acerca_de_vos']))) {
        throw new InvalidArgumentException('El campo Acerca de vos es obligatorio.');
    }

    $acercaDe = trim(htmlspecialchars($_GET['acerca_de_vos'], ENT_QUOTES, 'UTF-8'));

    /**
     * Validar con preg_match:
     * El texto debe tener entre 10 y 500 caracteres.
     * El modificador 's' hace que el punto coincida con saltos de línea.
     */
    if (!preg_match('/^.{10,500}$/s', $acercaDe)) {
        throw new InvalidArgumentException(
            'Acerca de vos debe tener entre 10 y 500 caracteres.'
        );
    }

    // ── TODOS LOS DATOS SON VÁLIDOS ──────────────────────────
    // Construir el array asociativo 1D con todos los campos
    $datosPersona = [
        'nombre_apellido' => $nombreApellido,
        'sexo'            => $sexo,
        'nacionalidad'    => $nacionalidad,
        'intereses'       => $intereses,    // sub-array de intereses
        'acerca_de_vos'   => $acercaDe,
    ];

    // Instanciar el objeto Persona mediante su constructor
    $persona = new Persona($datosPersona);

    // Incluir la vista de salida (pasa $persona en scope)
    include 'salida.php';
    exit;

} catch (InvalidArgumentException $e) {
    // Redirigir al formulario con el mensaje de error en la URL
    $errorCodificado = urlencode($e->getMessage());
    header("Location: index.php?error=$errorCodificado");
    exit;

} catch (Exception $e) {
    // Error inesperado
    $errorCodificado = urlencode('Error inesperado. Por favor intente nuevamente.');
    header("Location: index.php?error=$errorCodificado");
    exit;
}
?>
