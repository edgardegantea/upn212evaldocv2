<?=
    $this->extend('admin/template/layout');
    $this->section('title') ?> Resultado individual <?= $this->endSection();
?>

<?= $this->section('content'); ?>
<div class="">

    <div class="card">

        <div class="card-header">
        <a href="<?= base_url('admin/evaluacion/pl') ?>" class="btn btn-default float-right mr-2"><i
                    class="fa fa-arrow-left"></i> Regresar</a>
            <h5>Resultados de <?= $professorName ?></h5>
        </div>

        <div class="card-body">
            <table class="table table-justify">
                <tr>
                    <th>Número de la pregunta</th>
                    <th>Promedio</th>
                </tr>
                <?php $contador = 1; ?>
                <?php foreach ($averageScores as $questionIndex => $scoreData): ?>
                <tr>
                    <td>Pregunta <?php echo $contador++ ?> </td>
                    <!-- <td>Pregunta <?= $questionIndex ?></td> -->
                    <td><?= number_format($scoreData['average'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>


</div>
<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>