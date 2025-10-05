
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro Avanzado</title>
</head>
<body>
    <h2>Formulario de Registro Avanzado</h2>

    <form action="procesar.php" method="POST" enctype="multipart/form-data">

        <?php
        // Campo Nombre
        ?>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" 
               value="<?= isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '' ?>" required><br><br>

        <?php
        // Campo Email
        ?>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" 
               value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required><br><br>

        <?php
        // Campo Fecha de Nacimiento
        ?>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
               value="<?= isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '' ?>" required><br><br>

        <?php
        // Campo Sitio Web
        ?>
        <label for="sitio_web">Sitio web:</label>
        <input type="url" id="sitio_web" name="sitio_web"
               value="<?= isset($_POST['sitio_web']) ? htmlspecialchars($_POST['sitio_web']) : '' ?>"><br><br>

        <?php
        // Campo Género
        ?>
        <label for="genero">Género:</label>
        <select id="genero" name="genero">
            <option value="masculino" <?= (isset($_POST['genero']) && $_POST['genero'] == 'masculino') ? 'selected' : '' ?>>Masculino</option>
            <option value="femenino" <?= (isset($_POST['genero']) && $_POST['genero'] == 'femenino') ? 'selected' : '' ?>>Femenino</option>
            <option value="otro" <?= (isset($_POST['genero']) && $_POST['genero'] == 'otro') ? 'selected' : '' ?>>Otro</option>
        </select><br><br>

        <?php
        // Campo Intereses
        ?>
        <label>Intereses:</label><br>
        <input type="checkbox" id="deportes" name="intereses[]" value="deportes"
            <?= (isset($_POST['intereses']) && in_array('deportes', $_POST['intereses'])) ? 'checked' : '' ?>>
        <label for="deportes">Deportes</label><br>

        <input type="checkbox" id="musica" name="intereses[]" value="musica"
            <?= (isset($_POST['intereses']) && in_array('musica', $_POST['intereses'])) ? 'checked' : '' ?>>
        <label for="musica">Música</label><br>

        <input type="checkbox" id="lectura" name="intereses[]" value="lectura"
            <?= (isset($_POST['intereses']) && in_array('lectura', $_POST['intereses'])) ? 'checked' : '' ?>>
        <label for="lectura">Lectura</label><br><br>

        <?php
        // Campo Comentarios
        ?>
        <label for="comentarios">Comentarios:</label><br>
        <textarea id="comentarios" name="comentarios" rows="4" cols="50"><?= isset($_POST['comentarios']) ? htmlspecialchars($_POST['comentarios']) : '' ?></textarea><br><br>

        <?php
        // Campo Foto
        ?>
        <label for="foto_perfil">Foto de Perfil:</label>
        <input type="file" id="foto_perfil" name="foto_perfil"><br><br>

        <?php
        // Botones
        ?>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">

    </form>

    <?php
    // Enlace al resumen de registros
    ?>
    <br>
    <a href="resumen.php">Ver registros guardados</a>

</body>
</html>
