<?= $this->extend('admin/template/layout');
$this->section('title') ?>Ver carrera<?= $this->endSection();
?>



<?= $this->section('content'); ?>
    <div class="">
        <div class="row py-4">
            <div class="text-end">
                <a href="<?= base_url('admin/carreras') ?>" class="btn btn-default">Regresar</a>
            </div>
        </div>

        <div class="card">

            <div class="card-header"><h1><?php echo trim($carrera['nombre']) ?></h1></div>

            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <label for="">Carrera:</label>
                        <?php echo trim($carrera['nombre']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Descripción:</label>
                        <?php echo trim($carrera['descripcion']) ?>
                    </div>
                </div>

            </div>

        </div>

    </div>



<?= $this->endSection() ?>