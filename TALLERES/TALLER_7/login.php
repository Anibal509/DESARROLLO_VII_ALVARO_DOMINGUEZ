
<!-- <?php
session_start();

// Si ya hay una sesión activa, redirigir al panel
if(isset($_SESSION['usuario'])) {
    header("Location: panel.php");
    exit();
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // En un caso real, verificaríamos contra una base de datos
    if($usuario === "admin" && $contrasena === "1234") {
        $_SESSION['usuario'] = $usuario;
        header("Location: panel.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
    <form method="post" action="">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
 -->
<?php
include 'config_sesion.php'; // Inicia la sesión y define funciones de seguridad

// Si ya hay una sesión activa, redirigir al panel
if (isset($_SESSION['usuario'])) {
    header("Location: panel.php");
    exit();
}

// Generar token CSRF (si no existe)-nuevo
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Validar token CSRF//nuevo
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Error de validación CSRF: solicitud no autorizada.");
    }

    // Obtener datos del formulario de forma segura
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    // Simulación de verificación (en un caso real sería con BD)
    if ($usuario === "admin" && $contrasena === "1234") {
        $_SESSION['usuario'] = $usuario;
        header("Location: panel.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Seguro</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <!-- Token CSRF oculto -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
