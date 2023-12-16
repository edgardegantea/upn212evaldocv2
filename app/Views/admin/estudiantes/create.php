<?= $this->extend('admin/template/layout');
$this->section('title') ?>Crear estudiante<?= $this->endSection();
?>

<?= $this->section('content') ?>

    <div class="">
        <?php $validation = \Config\Services::validation(); ?>
    </div>


    <form method="POST" action="<?= base_url('admin/estudiantes') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <h5 class="card-title">Crear usuario</h5>
                <a href="<?= base_url('admin/estudiantes') ?>" class="btn btn-danger float-right">Cancelar y regresar</a>
            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">MATRÍCULA:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('codigo')): ?>is-invalid<?php endif ?>"
                                   name="codigo" placeholder="2301D" value="<?php echo set_value('codigo'); ?>"/>
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
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Fecha de nacimiento:</label>
                            <input type="date"
                                   class="form-control <?php if ($validation->getError('fechaNacimiento')): ?>is-invalid<?php endif ?>"
                                   name="fechaNacimiento" placeholder="Tu fecha de nacimiento" value="<?php echo set_value('fechaNacimiento'); ?>"/>
                            <?php if ($validation->getError('fechaNacimiento')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fechaNacimiento') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Nombre (s):</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre" placeholder="Tu nombre" value="<?php echo set_value('nombre'); ?>"/>
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
                            <label class="form-label">Apellido Paterno:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('apaterno')): ?>is-invalid<?php endif ?>"
                                   name="apaterno"
                                   placeholder="Tu apellido paterno" value="<?php echo set_value('apaterno'); ?>"/>
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
                                   name="amaterno" placeholder="Tu apellido materno"
                                   value="<?php echo set_value('amaterno'); ?>"/>
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
                    <div class="col md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Correo electrónico:</label>
                            <input type="email"
                                   class="form-control <?php if ($validation->getError('email')): ?>is-invalid<?php endif ?>"
                                   name="email" placeholder="Tu correo electrónico"
                                   value="<?php echo set_value('email'); ?>"/>
                            <?php if ($validation->getError('email')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Contraseña:</label>
                            <input type="password"
                                   class="form-control <?php if ($validation->getError('password')): ?>is-invalid<?php endif ?>"
                                   name="password" placeholder="Tu contraseña"
                                   value="<?php echo set_value('password'); ?>"/>
                            <?php if ($validation->getError('password')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
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

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Información acerca de tí:</label>
                            <textarea
                                class="form-control <?php if ($validation->getError('description')): ?>is-invalid<?php endif ?>"
                                name="bio" placeholder="Coméntanos sobre tí"><?php echo set_value('bio'); ?></textarea>
                            <?php if ($validation->getError('bio')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bio') ?>
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