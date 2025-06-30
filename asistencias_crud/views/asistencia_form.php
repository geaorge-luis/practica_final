<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario Asistencia</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1><?= isset($asistencia) ? 'Editar' : 'Nueva' ?> Asistencia</h1>
    <form method="post" action="index.php?action=<?= isset($asistencia) ? 'update&id=' . $asistencia['id'] : 'store' ?>">
        <label>Nombre: <input type="text" name="nombre" value="<?= $asistencia['nombre'] ?? '' ?>" required></label><br>
        <label>Hora: <input type="time" name="hora" value="<?= $asistencia['hora'] ?? '' ?>" required></label><br>
        <label>Fecha: <input type="date" name="fecha" value="<?= $asistencia['fecha'] ?? '' ?>" required></label><br>
        <label>Estado:
            <select name="estado">
                <?php
                $estados = ['PRESENTE', 'AUSENTE', 'TARDE', 'JUSTIFICADO'];
                foreach ($estados as $estado) {
                    $selected = ($asistencia['estado'] ?? 'PRESENTE') === $estado ? 'selected' : '';
                    echo "<option value=\"$estado\" $selected>$estado</option>";
                }
                ?>
            </select>
        </label><br>
        <label>Observaciones:<br>
            <textarea name="observaciones"><?= $asistencia['observaciones'] ?? '' ?></textarea>
        </label><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>