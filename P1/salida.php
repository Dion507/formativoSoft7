<?php
/**
 * salida.php — FormativoForm_P1 (GET)
 * ============================================================
 * Página de resultados: muestra los datos procesados usando
 * componentes Bootstrap (cards, tabla, badges, alerts).
 * Este archivo es incluido por procesar.php, que pasa el
 * objeto $persona (instancia de la clase Persona) en el scope.
 *
 * Asignatura : Desarrollo de Software VII
 * Módulo     : II — Aplicaciones Web Interactivas en PHP
 * Docente    : Ing. María Yahaira Tejedor M. MSc.
 * ============================================================
 */

// Verificar que el objeto llegó desde procesar.php
if (!isset($persona) || !($persona instanceof Persona)) {
    header('Location: index.php');
    exit;
}

// Obtener datos mediante los métodos de la clase
$datosPrincipales = $persona->ObtenerDatos();        // Array 1D (sin intereses)
$intereses        = $persona->ObtenerIntereses();    // Array de intereses
$arrayCompleto    = $persona->ObtenerArrayCompleto(); // Array 1D completo
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado — FormativoForm P1 (GET) | UTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<!-- ====================================================
     NAVBAR
     ==================================================== -->
<nav class="navbar navbar-expand-lg navbar-utp">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <div class="brand-icon"><i class="bi bi-mortarboard-fill"></i></div>
            <span>UTP <span style="opacity:0.6;font-weight:400">·</span> Dev Software VII</span>
        </a>
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarRes"
                aria-controls="navbarRes" aria-expanded="false" aria-label="Menú">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarRes">
            <ul class="navbar-nav ms-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        <i class="bi bi-ui-checks"></i> Formulario P1
                        <span class="navbar-badge">GET</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../p2/index.php">
                        <i class="bi bi-person-vcard"></i> Formulario P2
                        <span class="navbar-badge">POST</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ====================================================
     HERO BANNER
     ==================================================== -->
<div class="page-hero">
    <div class="container">
        <div class="hero-badge">
            <i class="bi bi-check-circle-fill"></i> Resultado — GET
        </div>
        <h1><i class="bi bi-person-check-fill me-2"></i>Datos Registrados Correctamente</h1>
        
    </div>
</div>

<!-- ====================================================
     CONTENIDO PRINCIPAL
     ==================================================== -->
<main class="container my-5">

    <!-- Alert de éxito -->
    <div class="alert-utp-success alert alert-dismissible fade show mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <strong>¡Formulario procesado con éxito!</strong>
        El objeto <code>Persona</code> fue instanciado correctamente con los datos validados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>

    <div class="row g-4">

        <!-- ── CARD 1: Datos Personales ─────────────────── -->
        <div class="col-12 col-md-7">
            <div class="card-result h-100">
                <div class="card-header-utp">
                    <i class="bi bi-person-fill"></i> Datos Personales
                    <span class="ms-auto" style="font-size:0.75rem;opacity:0.8;">Obtener Datos</span>
                </div>
                <div class="p-0">
                    <!--
                        Tabla Bootstrap con los datos del array asociativo.
                        Iteramos $datosPrincipales con foreach.
                    -->
                    <table class="table-utp table table-hover mb-0">
                        <thead>
                            <tr>
                                <th><i class="bi bi-key me-1"></i>Campo</th>
                                <th><i class="bi bi-card-text me-1"></i>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datosPrincipales as $clave => $valor): ?>
                            <tr>
                                <td class="td-key">
                                    <i class="bi bi-dash me-1 text-utp"></i>
                                    <?= htmlspecialchars($clave) ?>
                                </td>
                                <td>
                                    <?php if ($clave === 'Sexo'): ?>
                                        <?= $valor === 'Femenino'
                                            ? '<i class="bi bi-gender-female text-danger me-1"></i>'
                                            : '<i class="bi bi-gender-male text-primary me-1"></i>' ?>
                                    <?php elseif ($clave === 'Nacionalidad'): ?>
                                        <i class="bi bi-globe-americas me-1 text-utp"></i>
                                    <?php endif; ?>
                                    <?= htmlspecialchars($valor) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ── CARD 2: Intereses ─────────────────────────── -->
        <div class="col-12 col-md-5">
            <div class="card-result h-100">
                <div class="card-header-utp">
                    <i class="bi bi-heart-fill"></i> Intereses
                    <span class="ms-auto" style="font-size:0.75rem;opacity:0.8;">Obtener Intereses</span>
                </div>
                <div class="p-3">
                    <p class="text-muted small mb-3">
                        <i class="bi bi-info-circle me-1"></i>
                        <strong><?= count($intereses) ?></strong> interés(es) seleccionado(s):
                    </p>
                    <?php
                    // Mapa de íconos por interés
                    $iconosIntereses = [
                        'Cine'       => ['bi-camera-reels', 'text-warning'],
                        'Deportes'   => ['bi-trophy', 'text-success'],
                        'Internet'   => ['bi-wifi', 'text-info'],
                        'Libros'     => ['bi-book', 'text-secondary'],
                        'Música'     => ['bi-music-note-beamed', 'text-danger'],
                        'Tecnología' => ['bi-cpu', 'text-primary'],
                    ];
                    foreach ($intereses as $interes):
                        $icono = $iconosIntereses[$interes] ?? ['bi-star', 'text-utp'];
                    ?>
                        <span class="badge-utp">
                            <i class="bi <?= $icono[0] ?>"></i>
                            <?= htmlspecialchars($interes) ?>
                        </span>
                    <?php endforeach; ?>

                    <!-- Tabla de intereses como array indexado -->
                    <hr class="sep mt-3">
                   
                    
                </div>
            </div>
        </div>

        

        <!-- ── CARD 4: Acerca de vos ─────────────────────── -->
        <div class="col-12">
            <div class="card-result">
                <div class="card-header-utp">
                    <i class="bi bi-chat-quote-fill"></i> Acerca de vos
                </div>
                <div class="p-3">
                    <div class="blockquote-utp">
                        <i class="bi bi-quote" style="font-size:1.5rem;color:var(--utp-lavender);"></i>
                        <p class="mb-0 mt-1">
                            <?= nl2br(htmlspecialchars($arrayCompleto['acerca_de_vos'])) ?>
                        </p>
                        <footer class="mt-2 small text-utp fw-semibold">
                            <i class="bi bi-person-fill me-1"></i>
                            <?= htmlspecialchars($arrayCompleto['nombre_apellido']) ?>
                            &nbsp;·&nbsp;
                            <i class="bi bi-globe-americas me-1"></i>
                            <?= htmlspecialchars($arrayCompleto['nacionalidad']) ?>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /row -->

    <!-- ── Botones de acción ─────────────────────────────── -->
    <div class="d-flex flex-wrap gap-3 justify-content-center mt-4">
        <a href="index.php" class="btn-utp-outline btn">
            <i class="bi bi-arrow-left-circle me-1"></i>Nuevo Registro
        </a>
        <a href="../p2/index.php" class="btn-utp btn">
            <i class="bi bi-person-vcard me-1"></i>Ir a Formulario P2
        </a>
    </div>

</main>

<!-- ====================================================
     FOOTER
     ==================================================== -->
<footer class="footer-utp">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="footer-brand">
                    <i class="bi bi-mortarboard-fill"></i>
                    Formativo Formulario
                </div>
                <p>
                    Módulo II — Aplicaciones Web Interactivas en PHP<br>
                    Facultad de Ingeniería de Sistemas Computacionales
                </p>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <p class="fw-bold text-white mb-2" style="font-size:0.85rem;">Integrantes:</p>
                <p>
                    <br class="badge-outline-utp">Oliver González </br>
                    <br class="badge-outline-utp">Daniel Ubarte 5</br>
                    <br class="badge-outline-utp">Gerardo Tejada</br>
                    <br class="badge-outline-utp">Miguel Gomez</br>
                </p>
            </div>
            <div class="col-md-3">
                <p class="fw-bold text-white mb-2" style="font-size:0.85rem;">Docente</p>
                <p>
                    <i class="bi bi-person-workspace me-1"></i>
                    Ing. María Yahaira Tejedor M. MSc.<br>
                    <i class="bi bi-building me-1"></i> UTP Panamá
                </p>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="footer-bottom">
            <span>© 2025 Universidad Tecnológica de Panamá — Desarrollo de Software VII</span>
            <div class="footer-links">
                <a href="index.php"><i class="bi bi-house-fill"></i> P1</a>
                <a href="../p2/index.php"><i class="bi bi-person-vcard-fill"></i> P2</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc4s9bIOgUxi8T/jzmBRr4phA1EYkM/v2qb1mFJhZD/I"
        crossorigin="anonymous"></script>
</body>
</html>
