<?= $this->extend('admin/template/layout');
$this->section('title') ?>Editar sede<?= $this->endSection();
$this->section('encabezado') ?><p class="text-uppercase">Editar datos de la sede seleccionada</p><?= $this->endSection();
?>

<?= $this->section('content') ?>

    <div class="">
        <?php $validation = \Config\Services::validation(); ?>
        <div class="row py-4">
            <div class="col-xl-12 text-end">
                <a href="<?= base_url('admin/sedes') ?>" class="btn btn-danger">Cancelar y regresar</a>
            </div>
        </div>
    </div>


    <form method="POST" action="<?= base_url('admin/sedes/' . $sede['id']); ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <h5 class="card-title">Actualizar datos de la asignatura</h5>
            </div>

            <input type="hidden" name="_method" value="PUT">

            <div class="card-body">


                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Sede:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre"
                                   value="<?php if ($sede['nombre']): echo $sede['nombre']; else: set_value('nombre'); endif; ?>"/>
                            <?php if ($validation->getError('nombre')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nombre') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Teléfono:</label>
                            <input type="tel"
                                   class="form-control <?php if ($validation->getError('telefono')): ?>is-invalid<?php endif ?>"
                                   name="telefono"
                                   value="<?php if ($sede['telefono']): echo $sede['telefono']; else: set_value('telefono'); endif; ?>"/>
                            <?php if ($validation->getError('telefono')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('telefono') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Correo electrónico:</label>
                            <input type="email"
                                   class="form-control <?php if ($validation->getError('email')): ?>is-invalid<?php endif ?>"
                                   name="email"
                                   value="<?php if ($sede['email']): echo $sede['email']; else: set_value('email'); endif; ?>"/>
                            <?php if ($validation->getError('email')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Sitio web:</label>
                            <input type="url"
                                   class="form-control <?php if ($validation->getError('website')): ?>is-invalid<?php endif ?>"
                                   name="website"
                                   value="<?php if ($sede['website']): echo $sede['website']; else: set_value('website'); endif; ?>"/>
                            <?php if ($validation->getError('website')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('website') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Facebook:</label>
                            <input type="url"
                                   class="form-control <?php if ($validation->getError('facebook')): ?>is-invalid<?php endif ?>"
                                   name="facebook"
                                   value="<?php if ($sede['facebook']): echo $sede['facebook']; else: set_value('facebook'); endif; ?>"/>
                            <?php if ($validation->getError('facebook')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('facebook') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>


        <div class="card-footer">
            <input type="reset" value="Restablecer" class="btn btn-default">
            <button type="submit" class="btn btn-primary float-right">Actualizar</button>
        </div>
        </div>
    </form>


    <script>
        $(function () {
            <?php if (session()->has('success')) { ?>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Registro realizado con éxito',
                text: '<?= session('success'); ?>'
                showConfirmButton: false,
                timer: 1500
            })
            <?php } ?>

        });
    </script>

<?= $this->endSection() ?>