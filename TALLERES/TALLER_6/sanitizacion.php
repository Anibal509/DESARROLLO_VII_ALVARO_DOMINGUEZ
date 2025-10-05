 <?php
/* function sanitizarNombre($nombre) {
    return filter_var(trim($nombre), FILTER_SANITIZE_STRING);
}

function sanitizarEmail($email) {
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}

function sanitizarEdad($edad) {
    return filter_var($edad, FILTER_SANITIZE_NUMBER_INT);
}

function sanitizarSitioWeb($sitioWeb) {
    return filter_var(trim($sitioWeb), FILTER_SANITIZE_URL);
}

function sanitizarGenero($genero) {
    return filter_var(trim($genero), FILTER_SANITIZE_STRING);
}

function sanitizarIntereses($intereses) {
    return array_map(function($interes) {
        return filter_var(trim($interes), FILTER_SANITIZE_STRING);
    }, $intereses);
}

function sanitizarComentarios($comentarios) {
    return htmlspecialchars(trim($comentarios), ENT_QUOTES, 'UTF-8');
} */

//--Cambio realizados para eliminar los warnig de (FILTER_SANITIZE_STRING )al procesar el formulario .
// 1. Se eliminó FILTER_SANITIZE_STRING porque está obsoleto en PHP 8.1+
// 2. Se reemplazó por htmlspecialchars para sanitizar los strings de manera segura

function sanitizarNombre($nombre) {
    // Reemplazamos FILTER_SANITIZE_STRING por htmlspecialchars
    return htmlspecialchars(trim($nombre), ENT_QUOTES, 'UTF-8');
}

function sanitizarEmail($email) {
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}

function sanitizarEdad($edad) {
    return filter_var($edad, FILTER_SANITIZE_NUMBER_INT);
}

function sanitizarSitioWeb($sitioWeb) {
    return filter_var(trim($sitioWeb), FILTER_SANITIZE_URL);
}

function sanitizarGenero($genero) {
    return htmlspecialchars(trim($genero), ENT_QUOTES, 'UTF-8');
}

function sanitizarIntereses($intereses) {
    return array_map(function($interes) {
        return htmlspecialchars(trim($interes), ENT_QUOTES, 'UTF-8');
    }, $intereses);
}

function sanitizarComentarios($comentarios) {
    return htmlspecialchars(trim($comentarios), ENT_QUOTES, 'UTF-8');
}
?>
