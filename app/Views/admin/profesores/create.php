<?= $this->extend('admin/template/layout');
$this->section('title') ?>Registrar Profesor<?= $this->endSection();
?>

<?= $this->section('content') ?>

    <div class="">
        <?php $validation = \Config\Services::validation(); ?>
    </div>


    <form method="POST" action="<?= base_url('admin/profesores'); ?>">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <h5 class="card-title">Registrar profesor</h5>
                <a href="<?= base_url('admin/profesores') ?>" class="btn btn-danger float-right">Cancelar y regresar</a>
            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Nombre completo del profesor:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre" placeholder="" value="<?php echo set_value('nombre'); ?>"/>
                            <?php if ($validation->getError('nombre')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nombre') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!--
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Foto:</label>
                            <input type="file"
                                   class="form-control <?php if ($validation->getError('foto')): ?>is-invalid<?php endif ?>"
                                   name="foto" placeholder="Sube tu foto" value="<?php echo set_value('foto'); ?>"/>
                            <?php if ($validation->getError('foto')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                            -->

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