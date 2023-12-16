<?=
    $this->extend('admin/template/layout');
    $this->section('title') ?> Profesores evaluados <?= $this->endSection();
?>

<?= $this->section('content'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="">

    <div class="card mb-5">

        <div class="card-header">

            <a href="<?= base_url('admin/') ?>" class="btn btn-default float-right mr-2"><i
                    class="fa fa-arrow-left"></i> Regresar</a>
            <a href="<?= base_url('admin/evaluacion/tde') ?>" class="btn btn-outline-danger float-right mr-2" target="_blank">Descargar lista de profesores evaluados</a>

            <h3>Profesores evaluados</h3>

        </div>

        <div class="card-body">

            

            <table id="example1" class="table table-justify table-striped table-bordered table-hover">
                <thead>
                    <th>PROFESOR(A)</th>
                    <th>OPCIONES</th>
                </thead>

                <tbody>
                    <?php foreach ($professors as $profesor): ?>

                    <tr>
                        <td>
                            <?= $profesor['nombre'] ?>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-secondary"
                                href="<?= site_url('admin/evaluacion/average/' . $profesor['id']) ?>">Ver resultados</a>
                            <a class="btn btn-sm btn-outline-secondary"
                                href="<?= site_url('admin/evaluacion/cp/' . $profesor['id']) ?>">Ver comentarios</a>
                            <a class="btn btn-sm btn-outline-secondary"
                                href="<?= site_url('admin/evaluacion/gpp/' . $profesor['id']) ?>">Ver gráfica</a>
                            <a class="btn btn-sm btn-outline-danger" target="_blank"
                                href="<?= site_url('admin/evaluacion/reporte/download/' . $profesor['id']) ?>">Generar informe en PDF</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <td>PROFESOR(A)</td>
                    <td>OPCIONES</td>
                </tfoot>
            </table>
        </div>
    </div>


</div>
<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>