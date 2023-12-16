<?= $this->extend('admin/template/layout');
$this->section('title') ?>Editar docente<?= $this->endSection();
?>

<?= $this->section('content') ?>

    <div class="">
        <?php $validation = \Config\Services::validation(); ?>
    </div>


    <form method="POST" action="<?= base_url('admin/profesores/' . $profesor['id']); ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <div class="col-xl-12 text-end">
                    <a href="<?= base_url('admin/profesores') ?>" class="btn btn-danger">Cancelar y regresar</a>
                </div>
                <h5 class="card-title">Actualizar datos del/la profesor/a</h5>
            </div>

            <input type="hidden" name="_method" value="PUT">

            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Nombre:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre" placeholder="AA02X"
                                   value="<?php if ($profesor['nombre']): echo $profesor['nombre']; else: set_value('nombre'); endif; ?>"/>
                            <?php if ($validation->getError('nombre')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nombre') ?>
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