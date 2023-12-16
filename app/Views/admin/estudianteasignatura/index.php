<!-- app/Views/assign_subjects.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Asignar Materias a Docente</title>
</head>
<body>

<h2>Asignar Materias a Docente</h2>

<form method="post" action="<?= base_url('admin/guardarAsignacionAE'); ?>">
    <label for="estudiante">Estudiante:</label>
    <select name="estudiante" required>
        <?php foreach ($estudiantes as $estudiante): ?>
            <option value="<?= $estudiante['id'] ?>"><?= $estudiante['codigo'] ?> <?= $estudiante['nombre'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Materias:</label><br>
    <?php foreach ($asignaturas as $asignatura): ?>
        <input type="checkbox" name="asignaturas[]" value="<?= $asignatura['id'] ?>">
        <?= $asignatura['clave'] ?> <?= $asignatura['nombre'] ?><br>
    <?php endforeach; ?>

    <button type="submit">Asignar Materias a estudiante</button>
</form>

</body>
</html>
