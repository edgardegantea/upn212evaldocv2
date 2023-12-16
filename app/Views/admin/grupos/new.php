<?= $this->extend('admin/template/layout');
$this->section('title') ?>Crear grupo<?= $this->endSection();

?>

<?= $this->section('content') ?>

    <div class="row py-2">
        <?php $validation = \Config\Services::validation(); ?>
    </div>


    <form method="POST" action="<?= base_url('admin/grupos') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <h5 class="card-title">Crear grupo</h5>
                <a href="<?= base_url('admin/grupos') ?>" class="btn btn-danger float-right">Cancelar y regresar</a>
            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Clave del grupo:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('clave')): ?>is-invalid<?php endif ?>"
                                   name="clave" placeholder="AA02X" value="<?php echo set_value('clave'); ?>"/>
                            <?php if ($validation->getError('clave')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('clave') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Nombre del grupo:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre" placeholder="Nombre del grupo" value="<?php echo set_value('nombre'); ?>"/>
                            <?php if ($validation->getError('nombre')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nombre') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="reset" value="Restablecer" class="btn btn-default">
            <button type="submit" class="btn btn-primary float-right">Guardar</button>
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