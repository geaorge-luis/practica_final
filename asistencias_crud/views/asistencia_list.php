<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Asistencias</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Asistencias</h1>
    <a href="index.php?action=create">Nueva Asistencia</a>
    <table>
        <tr>
            <th>Nombre</th><th>Hora</th><th>Fecha</th><th>Estado</th><th>Observaciones</th><th>Acciones</th>
        </tr>
        <?php foreach ($asistencias as $a): ?>
        <tr>
            <td><?= htmlspecialchars($a['nombre']) ?></td>
            <td><?= $a['hora'] ?></td>
            <td><?= $a['fecha'] ?></td>
            <td><?= $a['estado'] ?></td>
            <td><?= $a['observaciones'] ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $a['id'] ?>">Editar</a>
                <a href="index.php?action=delete&id=<?= $a['id'] ?>" onclick="return confirm('¿Eliminar asistencia?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>