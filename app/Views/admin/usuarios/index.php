<?=
    $this->extend('admin/template/layout');
    $this->section('title') ?> Usuarios <?= $this->endSection();
?>



<?= $this->section('content'); ?>
<div class="d-grid gap-2 d-md-flex justify-content-sm-end">

</div>

<div class="">


    <div class="row">
        <div class="col-xl-12">
            <?php
            if(session()->getFlashdata('success')):?>
            <div class="alert alert-success alert-dismissible" id="success-alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?php echo session()->getFlashdata('success') ?>
            </div>
            <?php elseif(session()->getFlashdata('failed')):?>
            <div class="alert alert-danger alert-dismissible">
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button> -->
                <?php echo session()->getFlashdata('failed') ?>
            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Usuarios del sistema</h5>
                    <a href="<?= base_url('admin/usuarios/bu') ?>" class="btn btn-warning float-right ml-2">Búsqueda de usuarios</a>
                    <a href="<?= base_url('admin/usuarios/new') ?>" class="btn btn-primary float-right">Nuevo
                        usuario</a>
                    <a href="<?= base_url('admin/csv/sdue') ?>" class="btn btn-secondary float-right ml-2 mr-2">Importar
                        CSV</a>
                    <a href="<?= base_url('admin/') ?>" class="btn btn-default float-right mr-2"><i
                            class="fa fa-arrow-left"></i> Regresar</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>MATRÍCULA</th>
                                <th>PERFIL</th>
                                <th>NOMBRE</th>
                                <th>CORREO ELECTRÓNICO</th>
                                <th>SEXO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        if (count($usuarios) > 0):
                            foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?= $usuario['codigo'] ?> </td>
                                <td>
                                    <?php if ($usuario['rol'] == 'admin') : ?>
                                    <p class="text-uppercase badge bg-danger"><?= $usuario['rol'] ?></p>
                                    <?php elseif ($usuario['rol'] == 'docente') : ?>
                                    <p class="text-uppercase badge bg-primary"><?= $usuario['rol'] ?></p>
                                    <?php else : ?>
                                    <p class="text-uppercase badge bg-secondary"><?= $usuario['rol'] ?></p>
                                    <?php endif; ?>
                                </td>

                                <td><?= $usuario['nombre'] ?> <?= $usuario['apaterno'] ?> <?= $usuario['amaterno'] ?>
                                </td>
                                <td><?= $usuario['email'] ?></td>
                                <td><?= $usuario['sexo'] ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('admin/usuarios/'.$usuario['id']) ?>"
                                            class="btn btn-default" title="Ver"><i class="fas fa-eye"></i></a>
                                        <!-- <a href="<?= base_url('admin/usuarios/'.$usuario['id'].'/edit') ?>" class="btn btn-default" title="Editar"><i class="fas fa-edit"></i></a> -->
                                        <form class="" method="post"
                                            action="<?= base_url('admin/usuarios/'.$usuario['id'])?>"
                                            id="usuarioDeleteForm<?=$usuario['id']?>">
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <a href="javascript:void(0)"
                                                onclick="deleteUsuario('usuarioDeleteForm<?=$usuario['id']?>')"
                                                class="btn btn-default" title="Eliminar"><i
                                                    class="fas fa-trash text-red"></i></a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="4">
                                    <h6 class="text-danger text-center">No hay información de usuarios registrados</h6>
                                </td>
                            </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
    $("#success-alert").slideUp(500);
});


function deleteUsuario(formId) {
    var confirm = window.confirm('¿Desea eliminar al usuario seleccionado? Esta acción es irreversible.');
    if (confirm == true) {
        document.getElementById(formId).submit();
    }
}
</script>


<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>