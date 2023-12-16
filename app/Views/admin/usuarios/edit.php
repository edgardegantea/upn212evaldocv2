<?= $this->extend('admin/template/layout');
$this->section('title') ?>Editar usuario<?= $this->endSection();
$this->section('encabezado') ?><p class="text-uppercase">Editar datos del usuario seleccionado</p><?= $this->endSection();
?>

<?= $this->section('content') ?>

<div class="">
    <?php $validation = \Config\Services::validation(); ?>
    <div class="row py-4">
        <div class="col-xl-12 text-end">
            <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-danger">Cancelar y regresar</a>
        </div>
    </div>
</div>




<form method="POST" action="<?= base_url('admin/usuarios/' . $usuario['id']); ?>">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">


    <div class="card primary">
        <div class="card-header">
            <h5 class="card-title">Actualizar datos del usuario</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3 has-validation">
                        <label class="form-label">PERFIL:</label>
                        <select class="form-control" name="rol" id="">
                            <option value="estudiante">Estudiante</option>
                            <option value="docente">Docente</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-3 has-validation">
                        <label class="form-label">Matrícula:</label>
                        <input type="text"
                            class="form-control <?php if ($validation->getError('codigo')): ?>is-invalid<?php endif ?>"
                            name="codigo" placeholder="Matrícula"
                            value="<?php if ($usuario['codigo']): echo $usuario['codigo']; else: set_value('codigo'); endif ?>" />
                        <?php if ($validation->getError('codigo')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('codigo') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group mb-3 has-validation">
                        <label class="form-label">Sexo:</label>
                        <select class="form-control" name="sexo" id="">
                            <option value="Mujer">Mujer</option>
                            <option value="Hombre">Hombre</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    <div class="form-group mb-3 has-validation">
                        <label class="form-label">Nombre:</label>
                        <input type="text"
                            class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                            name="nombre" placeholder="Matrícula"
                            value="<?php if ($usuario['nombre']): echo $usuario['nombre']; else: set_value('nombre'); endif ?>" />
                        <?php if ($validation->getError('nombre')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nombre') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!--
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Apellido paterno:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('apaterno')): ?>is-invalid<?php endif ?>"
                                   name="apaterno" placeholder="Matrícula"
                                   value="<?php if ($usuario['apaterno']): echo $usuario['apaterno']; else: set_value('apaterno'); endif ?>"/>
                            <?php if ($validation->getError('apaterno')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('apaterno') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Apellido materno:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('amaterno')): ?>is-invalid<?php endif ?>"
                                   name="amaterno" placeholder="Apellido materno"
                                   value="<?php if ($usuario['amaterno']): echo $usuario['amaterno']; else: set_value('amaterno'); endif ?>"/>
                            <?php if ($validation->getError('amaterno')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('amaterno') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                            -->
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3 has-validation">
                        <label class="form-label">Correo electrónico:</label>
                        <input type="text"
                            class="form-control <?php if ($validation->getError('email')): ?>is-invalid<?php endif ?>"
                            name="email" placeholder="Matrícula"
                            value="<?php if ($usuario['email']): echo $usuario['email']; else: set_value('email'); endif ?>" />
                        <?php if ($validation->getError('email')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <input type="hidden" name="password" value="<?php echo set_value('password'); ?>">

                <div class="col-md-4">
                    <div class="form-group mb-3 has-validation">
                        <label class="form-label">Foto:</label>
                        <input type="text"
                            class="form-control <?php if ($validation->getError('foto')): ?>is-invalid<?php endif ?>"
                            name="foto" placeholder="Sin foto"
                            value="<?php if ($usuario['foto']): echo $usuario['foto']; else: set_value('foto'); endif ?>" />
                        <?php if ($validation->getError('foto')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto') ?>
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
$(function() {
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