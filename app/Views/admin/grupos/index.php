<?= $this->extend('admin/template/layout');
$this->section('title') ?>Grupos<?= $this->endSection();
?>

<?= $this->section('content'); ?>

<div class="">

    <div class="row">
        <div class="col-xl-12">
            <?php
            if (session()->getFlashdata('success')):?>
                <div class="alert alert-success alert-dismissible" id="success-alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?php echo session()->getFlashdata('success') ?>
                </div>
            <?php elseif (session()->getFlashdata('failed')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <?php echo session()->getFlashdata('failed') ?>
                </div>
            <?php endif; ?>


            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Asignaturas</h5>
                    <a href="<?= base_url('admin/grupos/new') ?>" class="btn btn-primary float-right">Nuevo grupo</a>
                    <!-- <div class="col-xl-12 text-end"> -->
                        <a href="<?= base_url('admin/') ?>" class="btn btn-default float-right">Regresar</a>
                    <!-- </div> -->
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped">
                        <thead>
                        <tr>
                            <th>CLAVE</th>
                            <th>GRUPO</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($grupos) > 0):
                            foreach ($grupos as $grupo): ?>
                                <tr>
                                    <td><?= $grupo['clave']; ?> </td>
                                    <td>
                                        Créditos: <?= $grupo['nombre']; ?>

                                    </td>
                                    <td class="d-flex">
                                        <!-- <a href="<?= base_url('admin/grupos/' . $grupo['id']) ?>"
                                           class="btn btn-default" title="Ver"><i
                                                class="fas fa-eye"></i></a> -->
                                        <a href="<?= base_url('admin/grupos/' . $grupo['id'] . '/edit') ?>"
                                           class="btn btn-default" title="Editar"><i
                                                class="fas fa-edit"></i></a>
                                        <form class="display-none" method="post"
                                              action="<?= base_url('admin/grupos/' . $grupo['id']) ?>"
                                              id="grupoDeleteForm<?= $grupo['id'] ?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <a href="javascript:void(0)"
                                               onclick="deleteGrupo('grupoDeleteForm<?= $grupo['id'] ?>')"
                                               class="btn btn-default" title="Eliminar"><i
                                                    class="fas fa-trash text-red"></i></a>
                                        </form>
                                        <a href="<?= base_url('admin/grupos/' . $grupo['id']) ?>"
                                           class="btn btn-default" title="Asignar Estudiantes y Asignaturas"><i
                                                class="fas fa-puzzle-piece text-primary"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="5">
                                    <h6 class="text-danger text-center">No hay información de grupos registradas</h6>
                                </td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>CLAVE</th>
                            <th>GRUPO</th>
                            <th>ACCIONES</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteGrupo(formId) {
        var confirm = window.confirm('¿Desea eliminar el grupo seleccionada? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>