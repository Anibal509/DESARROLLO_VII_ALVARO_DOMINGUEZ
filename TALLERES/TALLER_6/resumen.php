
<?php
$archivoJSON = 'registros.json';
$registros = file_exists($archivoJSON) ? json_decode(file_get_contents($archivoJSON), true) : [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Registros</title>
</head>
<body>
    <h2>Resumen de Registros</h2>
    <a href="formulario.php">Volver al formulario</a><br><br>
    <?php if (!empty($registros)): ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Fecha Nacimiento</th>
            <th>Sitio Web</th>
            <th>Género</th>
            <th>Intereses</th>
            <th>Comentarios</th>
            <th>Foto</th>
        </tr>
        <?php foreach ($registros as $r): ?>
        <tr>
            <td><?= htmlspecialchars($r['nombre']) ?></td>
            <td><?= htmlspecialchars($r['email']) ?></td>
            <td><?= htmlspecialchars($r['edad']) ?></td>
            <td><?= htmlspecialchars($r['fecha_nacimiento'] ?? '') ?></td>
            <td><?= htmlspecialchars($r['sitio_web'] ?? '') ?></td>
            <td><?= htmlspecialchars($r['genero']) ?></td>
            <td><?= is_array($r['intereses']) ? implode(", ", $r['intereses']) : '' ?></td>
            <td><?= htmlspecialchars($r['comentarios']) ?></td>
            <td><?php if(!empty($r['foto_perfil'])): ?>
                <img src="<?= $r['foto_perfil'] ?>" width="80">
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p>No hay registros guardados aún.</p>
    <?php endif; ?>
</body>
</html>
