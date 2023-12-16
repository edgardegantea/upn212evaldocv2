<?=
    $this->extend('admin/template/layout');
    $this->section('title') ?> Resultados <?= $this->endSection();
?>



<?= $this->section('content'); ?>
<div class="">


    <h1>Responses by Professor</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Asignatura ID</th>
                <th>Profesor ID</th>
                <th>Respuestas</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evaluaciones as $evaluacion): ?>
                <tr>
                    <td><?= $evaluacion['asignatura_id'] ?></td>
                    <td><?= $evaluacion['profesor_id'] ?></td>
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