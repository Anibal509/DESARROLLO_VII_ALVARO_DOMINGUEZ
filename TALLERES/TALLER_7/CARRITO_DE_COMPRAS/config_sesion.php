
<?php
// Configuración segura de la sesión
session_start([
    'cookie_lifetime' => 86400, // Sesión dura 24 horas si se cierra el navegador
    'cookie_httponly' => true,   // Accesible solo por HTTP, no JS
    'cookie_secure' => false,    // Cambiar a true si usas HTTPS
    'use_strict_mode' => true,   //protege la sesión de IDs falsos.
    'use_only_cookies' => true   //asegura que la sesión solo viaje por cookies, no por URL.
]);

// Función para sanear datos de entrada
//se usa antes de mostrar cualquier dato que venga del usuario o de la sesión.
//Protege la  aplicación contra  ataques XSS(Cross-Site Scripting )inyeccion de script malicioso 


function limpiar($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}
?>
