<?= $this->extend('admin/template/layout');

$this->section('title') ?>Ver modalidad<?= $this->endSection();

?>



<?= $this->section('content'); ?>
    <div class="">
        <div class="row py-4">
            <div class="text-end">
                <a href="<?= base_url('admin/modalidades') ?>" class="btn btn-default">Regresar</a>
            </div>
        </div>

        <div class="card">

            <div class="card-header"><h1><?php echo trim($modalidad['nombre']) ?></h1></div>

            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <label for="">Asignatura:</label>
                        <?php echo trim($modalidad['nombre']) ?>
                    </div>
                </div>

            </div>

        </div>

    </div>



<?= $this->endSection() ?>