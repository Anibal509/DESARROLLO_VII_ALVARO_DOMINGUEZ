<?php
require_once 'validaciones.php';
require_once 'sanitizacion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errores = [];
    $datos = [];

    // Campos a procesar (incluye fecha de nacimiento)
    $campos = ['nombre', 'email', 'fecha_nacimiento', 'sitio_web', 'genero', 'intereses', 'comentarios'];

    foreach ($campos as $campo) {
        if (isset($_POST[$campo])) {
            $valor = $_POST[$campo];
            $funcSan = "sanitizar" . ucfirst($campo);
            $funcVal = "validar" . ucfirst($campo);

            $valorSanitizado = function_exists($funcSan) ? call_user_func($funcSan, $valor) : $valor;
            $datos[$campo] = $valorSanitizado;

            if (function_exists($funcVal) && !call_user_func($funcVal, $valorSanitizado)) {
                $errores[] = "El campo $campo no es válido.";
            }
        }
    }

    // Calcular edad automáticamente
    if (!empty($_POST['fecha_nacimiento'])) {
        $fechaNacimiento = new DateTime($_POST['fecha_nacimiento']);
        $hoy = new DateTime();
        $datos['edad'] = $hoy->diff($fechaNacimiento)->y;
    }

    // Procesar foto de perfil con nombre único
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] !== UPLOAD_ERR_NO_FILE) {
        if (!validarFotoPerfil($_FILES['foto_perfil'])) {
            $errores[] = "La foto de perfil no es válida.";
        } else {
            if (!is_dir('uploads')) mkdir('uploads', 0755, true);
            $nombreArchivo = uniqid() . "_" . basename($_FILES['foto_perfil']['name']);
            $rutaDestino = 'uploads/' . $nombreArchivo;

            if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $rutaDestino)) {
                $datos['foto_perfil'] = $rutaDestino;
            } else {
                $errores[] = "Hubo un error al subir la foto de perfil.";
            }
        }
    }

    // Persistencia: guardar en JSON si no hay errores
    $archivoJSON = 'registros.json';
    if (empty($errores)) {
        $registros = file_exists($archivoJSON) ? json_decode(file_get_contents($archivoJSON), true) : [];
        $registros[] = $datos;
        file_put_contents($archivoJSON, json_encode($registros, JSON_PRETTY_PRINT));
    }

    // Mostrar resultados
    if (empty($errores)) {
        echo "<h2>Datos Recibidos:</h2>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Campo</th><th>Valor</th></tr>";
        foreach ($datos as $campo => $valor) {
            echo "<tr>";
            echo "<th>" . ucfirst($campo) . "</th>";
            if (is_array($valor)) {
                echo "<td>" . implode(", ", $valor) . "</td>";
            } elseif ($campo == 'foto_perfil') {
                echo "<td><img src='$valor' width='100'></td>";
            } else {
                echo "<td>" . htmlspecialchars($valor) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>Errores:</h2><ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }

    echo "<br><a href='formulario.php'>Volver al formulario</a>";
} else {
    echo "Acceso no permitido. Por favor use el formulario.";
}
?>
