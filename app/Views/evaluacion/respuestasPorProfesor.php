<?=
    $this->extend('admin/template/layout');
    $this->section('title') ?> Usuarios <?= $this->endSection();
?>



<?= $this->section('content'); ?>
<div class="">



    <h1>Respuestas por profesor</h1>
    <table border="1" class="table table-justify">
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
                <th>Respuestas</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evaluaciones as $evaluacion): ?>
                <tr>
                    <td><?= $evaluacion['asignatura_nombre'] ?></td>
                    <td><?= $evaluacion['profesor_nombre'] ?></td>
                    <td>
                        <!-- Parse and display the results of the questions -->
                        <ul>
                            <?php
                            $respuestas = json_decode($evaluacion['respuestas'], true);
                            foreach ($respuestas as $question => $answer):
                            ?>
                                <li>
                                    <?= $question ?>: <?= $answer ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <!-- End of results -->
                    </td>
                    <td><?= $evaluacion['comentario'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    


    <?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>