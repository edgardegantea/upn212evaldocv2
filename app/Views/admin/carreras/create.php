<?= $this->extend('admin/template/layout');
$this->section('title') ?>Crear carrera<?= $this->endSection();
?>

<?= $this->section('content') ?>

    <div class="">
        <?php $validation = \Config\Services::validation(); ?>
    </div>

    <form method="POST" action="<?= base_url('admin/carreras') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <h5 class="card-title">Crear carrera</h5>
                <a href="<?= base_url('admin/carreras') ?>" class="btn btn-danger float-right">Cancelar y regresar</a>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Carrera:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre" placeholder="Ingrese el nombre de la carrera" value="<?php echo set_value('nombre'); ?>"/>
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
                            <label class="form-label">Descripción:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('descripcion')): ?>is-invalid<?php endif ?>"
                                   name="descripcion" placeholder="Ingrese la descripción de la carrera" value="<?php echo set_value('descripcion'); ?>"/>
                            <?php if ($validation->getError('descripcion')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('descripcion') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Créditos:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('creditos')): ?>is-invalid<?php endif ?>"
                                   name="creditos" placeholder="Ingrese la cantidad de creditos de la carrera" value="<?php echo set_value('creditos'); ?>"/>
                            <?php if ($validation->getError('creditos')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('creditos') ?>
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