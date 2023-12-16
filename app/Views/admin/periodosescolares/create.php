<?= $this->extend('admin/template/layout');
$this->section('title') ?>Crear asignatura<?= $this->endSection();
?>

<?= $this->section('content') ?>

    <div class="row py-2">
        <?php $validation = \Config\Services::validation(); ?>
    </div>


    <form method="POST" action="<?= base_url('admin/periodosescolares') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <h5 class="card-title">Nuevo periodo escolar</h5>
                <a href="<?= base_url('admin/asignaturas') ?>" class="btn btn-danger float-right">Cancelar y regresar</a>
            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Periodo escolar:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre" value="<?php echo set_value('nombre'); ?>"/>
                            <?php if ($validation->getError('nombre')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nombre') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Código:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('codigo')): ?>is-invalid<?php endif ?>"
                                   name="codigo" value="<?php echo set_value('codigo'); ?>"/>
                            <?php if ($validation->getError('codigo')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('codigo') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Tipo:</label>

                            <select name="tipo" class="form-select">
                                <option value="Ordinario">Ordinario</option>
                                <option value="Extraodinario">Extraordinario</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Fecha de inicio:</label>
                            <input type="date"
                                   class="form-control <?php if ($validation->getError('fechaInicio')): ?>is-invalid<?php endif ?>"
                                   name="fechaInicio" value="<?php echo set_value('fechaInicio'); ?>"/>
                            <?php if ($validation->getError('fechaInicio')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fechaInicio') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Fecha de finalización:</label>
                            <input type="date"
                                   class="form-control <?php if ($validation->getError('fechaFin')): ?>is-invalid<?php endif ?>"
                                   name="fechaFin" value="<?php echo set_value('fechaFin'); ?>"/>
                            <?php if ($validation->getError('fechaFin')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fechaFin') ?>
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