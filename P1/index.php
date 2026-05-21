<?php

// Capturar mensaje de error si fue redirigido desde procesar.php
$mensajeError = '';
if (!empty($_GET['error'])) {
    $mensajeError = htmlspecialchars(urldecode($_GET['error']), ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormativoForm P1 (GET) | UTP Dev Software VII</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../otros/otro.css">
</head>
<body>

<!--INICIA NAVBAR-->
<?php include '../otros/nav.html'; ?>
<!-- FIN NAVBAR -->
<!-- INICIA  HERO -->
     <?php include '../otros/hero.html'; ?>
<!-- FIN HERO -->
<!-- ====================================================
     CONTENIDO PRINCIPAL
     ==================================================== -->
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-9 col-xl-8">

            <?php if ($mensajeError): ?>
            <!-- Alert de error desde procesar.php -->
            <div class="alert-utp-danger alert alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Error de validación:</strong> <?= $mensajeError ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
            <?php endif; ?>

            <!-- Tarjeta principal del formulario -->
            <div class="card-main">
                <div class="card-header-utp">
                    <i class="bi bi-clipboard2-data-fill"></i>
                    Datos Personales
                    <span class="header-subtitle">Todos los campos con * son obligatorios</span>
                </div>
                <div class="card-body">

                    <!--
                        FORMULARIO GET
                        method="get" → datos viajan en la URL como ?campo=valor
                        action="procesar.php" → destino de procesamiento
                    -->
                    <form id="frmPrincipal" method="get" action="procesar.php" novalidate>

                        <!-- ── SECCIÓN 1: Nombre y Apellido ──────────── -->
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="bi bi-person-badge-fill"></i> Identificación
                            </div>

                            <label for="nombre_apellido" class="form-label">
                                Nombre y Apellido <span class="text-danger">*</span>
                            </label>
                            <div class="input-icon">
                                <i class="bi bi-person i-icon"></i>
                                <!--
                                    type="text"   → campo de texto
                                    pattern       → regex: mínimo nombre + apellido, solo letras
                                    required      → obligatorio (HTML5)
                                    title         → mensaje tooltip de validación
                                    autocomplete  → sugerencia del navegador
                                -->
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nombre_apellido"
                                    name="nombre_apellido"
                                    placeholder="Ej.: Ana María García"
                                    pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]{2,}(\s[A-Za-zÁÉÍÓÚáéíóúÑñ]{2,})+$"
                                    title="Ingrese al menos nombre y apellido. Solo letras y espacios."
                                    required
                                    autocomplete="name">
                            </div>
                            <div class="invalid-feedback" id="errNombre" style="display:none;">
                                <i class="bi bi-x-circle me-1"></i>Ingrese nombre y apellido completo (solo letras).
                            </div>
                        </div>

                        <!-- ── SECCIÓN 2: Sexo ────────────────────────── -->
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="bi bi-gender-ambiguous"></i> Sexo
                            </div>
                            <div class="d-flex flex-wrap gap-3">
                                <!--
                                    type="radio"  → selector único
                                    name="sexo"   → mismo nombre agrupa los radios
                                    required      → al menos uno seleccionado
                                -->
                                <label class="option-pill">
                                    <input type="radio" name="sexo" value="Femenino" required>
                                    <i class="bi bi-gender-female text-danger"></i> Femenino
                                </label>
                                <label class="option-pill">
                                    <input type="radio" name="sexo" value="Masculino">
                                    <i class="bi bi-gender-male text-primary"></i> Masculino
                                </label>
                            </div>
                            <div class="text-danger small mt-1" id="errSexo" style="display:none;">
                                <i class="bi bi-x-circle me-1"></i>Seleccione su sexo.
                            </div>
                        </div>

                        <!-- ── SECCIÓN 3: Nacionalidad ────────────────── -->
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="bi bi-globe-americas"></i> Nacionalidad
                            </div>
                            <label for="nacionalidad" class="form-label">
                                Seleccione su país de origen <span class="text-danger">*</span>
                            </label>
                            <!--
                                select → lista desplegable
                                required → usuario debe elegir opción válida
                                Primera opción con value="" fuerza selección
                            -->
                            <select class="form-select" id="nacionalidad" name="nacionalidad" required>
                                <option value="">— Seleccione su nacionalidad —</option>
                                <option value="Argentina">🇦🇷 Argentina</option>
                                <option value="Bolivia">🇧🇴 Bolivia</option>
                                <option value="Brasil">🇧🇷 Brasil</option>
                                <option value="Chile">🇨🇱 Chile</option>
                                <option value="Colombia">🇨🇴 Colombia</option>
                                <option value="Costa Rica">🇨🇷 Costa Rica</option>
                                <option value="Ecuador">🇪🇨 Ecuador</option>
                                <option value="Guatemala">🇬🇹 Guatemala</option>
                                <option value="Honduras">🇭🇳 Honduras</option>
                                <option value="México">🇲🇽 México</option>
                                <option value="Nicaragua">🇳🇮 Nicaragua</option>
                                <option value="Panamá">🇵🇦 Panamá</option>
                                <option value="Paraguay">🇵🇾 Paraguay</option>
                                <option value="Perú">🇵🇪 Perú</option>
                                <option value="Uruguay">🇺🇾 Uruguay</option>
                                <option value="Venezuela">🇻🇪 Venezuela</option>
                            </select>
                            <div class="text-danger small mt-1" id="errNacionalidad" style="display:none;">
                                <i class="bi bi-x-circle me-1"></i>Seleccione su nacionalidad.
                            </div>
                        </div>

                        <!-- ── SECCIÓN 4: Intereses ───────────────────── -->
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="bi bi-heart-fill"></i> Intereses
                                <span class="ms-auto text-muted fw-normal" style="font-size:0.78rem;text-transform:none;letter-spacing:0;">
                                    Seleccione uno o más
                                </span>
                            </div>
                            <!--
                                type="checkbox"   → selección múltiple
                                name="intereses[]" → [] hace que PHP lo reciba como array
                            -->
                            <div class="check-grid">
                                <label class="check-card">
                                    <input type="checkbox" name="intereses[]" value="Cine">
                                    <i class="bi bi-camera-reels text-warning"></i> Cine
                                </label>
                                <label class="check-card">
                                    <input type="checkbox" name="intereses[]" value="Deportes">
                                    <i class="bi bi-trophy text-success"></i> Deportes
                                </label>
                                <label class="check-card">
                                    <input type="checkbox" name="intereses[]" value="Internet">
                                    <i class="bi bi-wifi text-info"></i> Internet
                                </label>
                                <label class="check-card">
                                    <input type="checkbox" name="intereses[]" value="Libros">
                                    <i class="bi bi-book text-secondary"></i> Libros
                                </label>
                                <label class="check-card">
                                    <input type="checkbox" name="intereses[]" value="Música">
                                    <i class="bi bi-music-note-beamed text-danger"></i> Música
                                </label>
                                <label class="check-card">
                                    <input type="checkbox" name="intereses[]" value="Tecnología">
                                    <i class="bi bi-cpu text-primary"></i> Tecnología
                                </label>
                            </div>
                            <div class="text-danger small mt-2" id="errIntereses" style="display:none;">
                                <i class="bi bi-x-circle me-1"></i>Seleccione al menos un interés.
                            </div>
                        </div>

                        <!-- ── SECCIÓN 5: Acerca de vos ───────────────── -->
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="bi bi-chat-left-quote-fill"></i> Acerca de ti
                            </div>
                            <label for="acerca_de_vos" class="form-label">
                                Cuéntanos sobre ti <span class="text-danger">*</span>
                            </label>
                            <!--
                                textarea    → campo multilínea
                                minlength   → mínimo 10 caracteres (HTML5)
                                maxlength   → máximo 500 caracteres
                                required    → obligatorio
                            -->
                            <textarea
                                class="form-control"
                                id="acerca_de_vos"
                                name="acerca_de_vos"
                                rows="4"
                                placeholder="Escribe una breve descripción sobre ti, tus hobbies, metas..."
                                minlength="10"
                                maxlength="500"
                                required></textarea>
                            <div class="char-counter" id="charCounter">0 / 500 caracteres</div>
                            <div class="text-danger small mt-1" id="errAcerca" style="display:none;">
                                <i class="bi bi-x-circle me-1"></i>Mínimo 10 caracteres requeridos.
                            </div>
                        </div>

                        <hr class="sep">

                        <!-- ── BOTONES ────────────────────────────────── -->
                        <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center">
                            <p class="text-muted small mb-0">
                                <i class="bi bi-info-circle me-1 text-utp"></i>

                            </p>
                            <div class="d-flex gap-2">
                                <button type="reset" class="btn-utp-outline btn">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i>Limpiar
                                </button>
                                <button type="submit" class="btn-utp btn">
                                    <i class="bi bi-send-fill me-2"></i>Enviar
                                </button>
                            </div>
                        </div>

                    </form>
                </div><!-- /card-body -->
            </div><!-- /card-main -->

        </div>
    </div>
</main>

<!--inicia FOOTER -->
<?php include '../otros/foot.html'; ?>
<!--Termina FOOTER -->
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc4s9bIOgUxi8T/jzmBRr4phA1EYkM/v2qb1mFJhZD/I"
        crossorigin="anonymous"></script>

<script>
/**
 * ============================================================
 * Validaciones JavaScript — lado cliente
 * Complementan las validaciones HTML5 nativas
 * ============================================================
 */

// ── Contador de caracteres en textarea ────────────────────
const textarea    = document.getElementById('acerca_de_vos');
const charCounter = document.getElementById('charCounter');

textarea.addEventListener('input', function () {
    const len = this.value.length;
    charCounter.textContent = len + ' / 500 caracteres';
    charCounter.className   = 'char-counter';
    if (len > 450) charCounter.classList.add('warn');
    if (len > 490) charCounter.classList.add('danger');
});

// ── Validación personalizada al enviar ─────────────────────
const form = document.getElementById('frmPrincipal');

form.addEventListener('submit', function (e) {
    let valido = true;

    // Validar nombre (regex coincide con el del HTML)
    const nombre = document.getElementById('nombre_apellido').value.trim();
    const regexNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ]{2,}(\s[A-Za-zÁÉÍÓÚáéíóúÑñ]{2,})+$/;
    const errNombre = document.getElementById('errNombre');
    if (!nombre || !regexNombre.test(nombre)) {
        errNombre.style.display = 'block';
        valido = false;
    } else {
        errNombre.style.display = 'none';
    }

    // Validar sexo (radio)
    const sexoSeleccionado = document.querySelector('input[name="sexo"]:checked');
    const errSexo = document.getElementById('errSexo');
    if (!sexoSeleccionado) {
        errSexo.style.display = 'block';
        valido = false;
    } else {
        errSexo.style.display = 'none';
    }

    // Validar nacionalidad (select)
    const nac = document.getElementById('nacionalidad').value;
    const errNac = document.getElementById('errNacionalidad');
    if (!nac) {
        errNac.style.display = 'block';
        valido = false;
    } else {
        errNac.style.display = 'none';
    }

    // Validar intereses (al menos uno marcado)
    const interesesMarcados = document.querySelectorAll('input[name="intereses[]"]:checked');
    const errIntereses = document.getElementById('errIntereses');
    if (interesesMarcados.length === 0) {
        errIntereses.style.display = 'block';
        valido = false;
    } else {
        errIntereses.style.display = 'none';
    }

    // Validar textarea (longitud)
    const acerca = textarea.value.trim();
    const errAcerca = document.getElementById('errAcerca');
    if (acerca.length < 10) {
        errAcerca.style.display = 'block';
        valido = false;
    } else {
        errAcerca.style.display = 'none';
    }

    if (!valido) {
        e.preventDefault();
        // Scroll suave al primer error
        const primerError = document.querySelector('[style*="block"]');
        if (primerError) primerError.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});

// ── Limpiar errores en tiempo real ────────────────────────
document.getElementById('nombre_apellido').addEventListener('input', function () {
    const regex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ]{2,}(\s[A-Za-zÁÉÍÓÚáéíóúÑñ]{2,})+$/;
    document.getElementById('errNombre').style.display =
        regex.test(this.value.trim()) ? 'none' : (this.value ? 'block' : 'none');
});

document.querySelectorAll('input[name="sexo"]').forEach(r =>
    r.addEventListener('change', () =>
        document.getElementById('errSexo').style.display = 'none'));

document.getElementById('nacionalidad').addEventListener('change', function () {
    document.getElementById('errNacionalidad').style.display = this.value ? 'none' : 'block';
});

document.querySelectorAll('input[name="intereses[]"]').forEach(cb =>
    cb.addEventListener('change', () => {
        const alguno = document.querySelectorAll('input[name="intereses[]"]:checked').length > 0;
        document.getElementById('errIntereses').style.display = alguno ? 'none' : 'block';
    }));

textarea.addEventListener('input', function () {
    document.getElementById('errAcerca').style.display =
        this.value.trim().length >= 10 ? 'none' : 'block';
});
</script>

</body>
</html>
