<?=
    $this->extend('admin/template/layout');
    $this->section('title') ?> Usuarios <?= $this->endSection();
?>



<?= $this->section('content'); ?>
<div class="">



    <h1>Búsqueda de usuarios</h1>

    <form method="get" action="<?php echo base_url('admin/usuarios/bu'); ?>">
        <label>Buscar por Perfil (administrador, estudiante), Matrícula, Nombre o Correo Electrónico:</label>
        <div class="row">
            <div class="col">
                <input class="form-control" autofocus type="text" name="search" value="<?php echo $searchTerm; ?>">
            </div>
            <div class="col">
                <button class="btn btn-primary" type="submit">Buscar</button>
                <a href="<?= base_url('admin/usuarios/') ?>" class="btn btn-default float-right"><i
                        class="fa fa-arrow-left"></i> Regresar</a>
            </div>
        </div>
    </form>

    <div class="mt-5">
        <table class="table">
            <tr style="background-color: black; color: white">
                <th>ID</th>
                <th>PERFIL</th>
                <th>MATRÍCULA</th>
                <th>NOMBRE</th>
                <th>CORREO ELECTRÓNICO</th>
                <th>SEXO</th>
                <th>ACCIONES</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <th><?php echo $usuario['rol']; ?></th>
                <th><?php echo $usuario['codigo']; ?></th>
                <td><?php echo $usuario['nombre']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['sexo']; ?></td>
                <td>
                    <!-- <a href="<?php echo base_url('/admin/usuarios/pdfUsuario/' . $usuario['id']); ?>"
                        target="_blank">PDF</a> -->
                    <a href="<?= base_url('admin/usuarios/'.$usuario['id'].'/edit') ?>"
                        class="btn btn-default float-left" title="Editar"><i class="fas fa-edit"></i></a>

                    <a href="<?php echo base_url('admin/usuarios/edit_password/' . $usuario['id']); ?>"
                        class="btn btn-default float-left"><i class="fas fa-key"></i></a>



                    <form class="float-left" method="post" action="<?= base_url('admin/usuarios/'.$usuario['id'])?>"
                        id="usuarioDeleteForm<?=$usuario['id']?>">
                        <input type="hidden" name="_method" value="DELETE" />
                        <a href="javascript:void(0)" onclick="deleteUsuario('usuarioDeleteForm<?=$usuario['id']?>')"
                            class="btn btn-default float-left" title="Eliminar"><i class="fas fa-trash text-red"></i></a>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>


<script>
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