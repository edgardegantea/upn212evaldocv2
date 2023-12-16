<?=
    $this->extend('admin/template/layout');
    $this->section('title') ?> Profesores evaluados <?= $this->endSection();
?>

<?= $this->section('content'); ?>
<div class="">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="card">
        <div class="card-header">
        <a href="<?= base_url('admin/evaluacion/pl') ?>" class="btn btn-default float-right mr-2"><i
                    class="fa fa-arrow-left"></i> Regresar</a>
            <h5>Gráfica representativa de resultados de <?= $professorName ?></h5>
        </div>

        <div class="card-body">
            <canvas id="barChart" width="400" height="200"></canvas>
        </div>

    </div>

    <script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var questionLabels = <?= $questionLabels ?>;
    var averageScores = <?= $averageScores ?>;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: questionLabels,
            datasets: [{
                label: 'Promedio por pregunta de evaluación',
                data: averageScores,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 5, 
                }
            }
        }
    });
    </script>
</div>
<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>