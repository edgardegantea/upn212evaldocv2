<!-- app/Views/usuarios/index.php -->
<table>
    <thead>
    <tr>
        <th>Nombre del estudiante</th>
        <th>Asignaturas cursadas</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item['estudiante']['nombre']; ?></td>
            <td>
                <?php foreach ($item['asignaturas'] as $asignatura): ?>
                    <?= $asignatura['id']; ?> <br>
                <?php endforeach; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
