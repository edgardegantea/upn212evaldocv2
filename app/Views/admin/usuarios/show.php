<?= $this->extend('admin/template/layout');
$this->section('title') ?> Ver usuario <?= $this->endSection(); ?>



<?= $this->section('content'); ?>
    <div class="">
        <div class="row py-4">
            <div class="text-end">
                <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-default">Regresar</a>
            </div>
        </div>

        <div class="card">

            <div class="card-header"><h1><?php echo trim($usuario['nombre']) ?> <?php echo trim($usuario['apaterno']) ?> <?php echo trim($usuario['amaterno']) ?></h1></div>

            <div class="card-body">


                <div class="row">
                    <div class="col-md-4">
                        <label for="">Perfil:</label> <?php echo trim($usuario['rol']) ?>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">MATRÍCULA:</label>
                            <?php echo trim($usuario['codigo']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Sexo:</label>
                            <?php echo trim($usuario['sexo']) ?>
                        </div>
                    </div>
                </div>

                <div class="row card-subtitle mb-2 text-body-secondary">
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Nombre (s):</label>
                            <?php echo trim($usuario['nombre']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Apellido Paterno:</label>
                            <?php echo trim($usuario['apaterno']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Apellido materno:</label>
                            <?php echo trim($usuario['amaterno']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Correo electrónico:</label>
                            <?php echo trim($usuario['email']) ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Foto:</label>
                            <?php echo trim($usuario['foto']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">

                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>

<?= $this->endSection() ?>