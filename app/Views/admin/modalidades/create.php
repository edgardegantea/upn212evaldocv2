<?= $this->extend('admin/template/layout');
$this->section('title') ?>Crear modalidad<?= $this->endSection();
$this->section('encabezado') ?><p class="text-uppercase">Nueva modalidad</p><?= $this->endSection();
?>

<?= $this->section('content') ?>

    <div class="">
        <?php $validation = \Config\Services::validation(); ?>
        <div class="row py-4">
            <div class="col-xl-12 text-end">
                <a href="<?= base_url('admin/modalidades') ?>" class="btn btn-danger">Cancelar y regresar</a>
            </div>
        </div>
    </div>


    <form method="POST" action="<?= base_url('admin/modalidades') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <h5 class="card-title">Crear modalidad</h5>
            </div>


            <div class="card-body">


                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Modalidad:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre" placeholder="Ingrese el nombre de la modalidad" value="<?php echo set_value('nombre'); ?>"/>
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