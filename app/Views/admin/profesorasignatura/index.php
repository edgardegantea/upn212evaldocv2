<!-- app/Views/assign_subjects.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Asignar Materias a Docente</title>
</head>
<body>

<h2>Asignar Materias a Docente</h2>

<form method="post" action="<?= base_url('admin/guardarAsignacion'); ?>">
    <label for="profesor">Docente:</label>
    <select name="profesor" required>
        <?php foreach ($profesores as $profesor): ?>
            <option value="<?= $profesor['id'] ?>"><?= $profesor['nombre'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Materias:</label><br>
    <?php foreach ($asignaturas as $asignatura): ?>
        <input type="checkbox" name="asignaturas[]" value="<?= $asignatura['id'] ?>">
        <?= $asignatura['clave'] ?> <?= $asignatura['nombre'] ?><br>
    <?php endforeach; ?>

    <button type="submit">Asignar Materias</button>
</form>

</body>
</html>
