<?= $this->extend('admin/template/layout');
$this->section('title') ?>Profesores<?= $this->endSection();
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
                    <h5 class="card-title">Profesores</h5>
                    <a href="<?= base_url('admin/profesores/new') ?>" class="btn btn-primary float-right">Nuevo profesor</a>
                    <a href="<?= base_url('admin/csv/sdp') ?>" class="btn btn-secondary float-right ml-2 mr-2">Importar CSV</a>
                    <a href="<?= base_url('admin/') ?>" class="btn btn-default float-right mr-2"><i
            class="fa fa-arrow-left"></i> Regresar</a>
                </div>

                <div class="card-body">
                    <table id="example1" class="table">
                        <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>PROFESOR</th>
                            <th>ÁREA</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($profesores) > 0):
                            foreach ($profesores as $profesor): ?>
                                <tr>
                                    <!-- <td><?= $profesor->id ?> </td> -->
                                    <td>
                                        <?= $profesor->nombre ?>
                                    </td>
                                    <td>
                                        <?= $profesor->nombreArea ?>
                                    </td>
                                    <td class="d-flex">
                                        <a href="<?= base_url('admin/profesores/' . $profesor->id) ?>"
                                           class="btn btn-default" title="Ver"><i class="fas fa-eye"></i></a>
                                        

                                        <a href="<?= base_url('admin/profesores/' . $profesor->id . '/edit') ?>"
                                           class="btn btn-default" title="Editar"><i class="fas fa-edit"></i></a>

                                        
                                           <form class="display-none" method="post"
                                              action="<?= base_url('admin/profesores/' . $profesor->id) ?>"
                                              id="profesorDeleteForm<?= $profesor->id ?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <a href="javascript:void(0)"
                                               onclick="deleteProfesor('profesorDeleteForm<?= $profesor->id ?>')"
                                               class="btn btn-default" title="Eliminar"><i class="fas fa-trash text-red"></i></a>
                                        </form>
                                        
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="4">
                                    <h6 class="text-danger text-center">No hay información de profesores registrados</h6>
                                </td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>PROFESOR</th>
                            <th>ÁREA</th>
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
    function deleteProfesor(formId) {
        var confirm = window.confirm('¿Desea eliminar al profesor seleccionado? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>

<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>