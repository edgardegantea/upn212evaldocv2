<?= $this->extend('admin/template/layout');

$this->section('title') ?> Ver sede <?= $this->endSection();

$this->section('encabezado') ?><p class="text-uppercase">Información de la sede seleccionada</p><?= $this->endSection();

?>



<?= $this->section('content'); ?>
    <div class="">
        <div class="row py-4">
            <div class="text-end">
                <a href="<?= base_url('admin/sedes') ?>" class="btn btn-default">Regresar</a>
            </div>
        </div>

        <div class="card">

            <div class="card-header"><h1><?php echo trim($sede['nombre']) ?></h1></div>

            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <label for="">Asignatura:</label>
                        <?php echo trim($sede['nombre']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Teléfono de contacto: </label>
                        <?php echo trim($sede['telefono']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Correo electrónico: </label>
                        <?php echo trim($sede['email']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Sitio web: </label>
                        <?php echo trim($sede['website']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Perfil de Facebook: </label>
                        <?php echo trim($sede['facebook']) ?>
                    </div>
                </div>

            </div>

        </div>

    </div>



<?= $this->endSection() ?>