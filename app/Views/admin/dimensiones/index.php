<?= $this->extend('admin/template/layout');
$this->section('title') ?>Dimensiones<?= $this->endSection();
?>

<?= $this->section('content'); ?>
<div class="d-grid gap-2 d-md-flex justify-content-sm-end">
    <a href="<?= base_url('admin/') ?>" class="btn btn-outline-secondary float-right mb-3"><i
            class="fa fa-arrow-left"></i> Regresar</a>
</div>

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
                    <h5 class="card-title">Dimensiones</h5>
                    <a href="<?= base_url('admin/dimensiones/new') ?>" class="btn btn-primary float-right">Nueva dimensión</a>
                </div>

                <div class="card-body">
                    <table id="example1" class="table">
                        <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>DIMENSIÓN</th>
                            <th>DESCRIPCIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($dimensiones) > 0):
                            foreach ($dimensiones as $dimension): ?>
                                <tr>
                                    <td>
                                        <?= $dimension['nombre'] ?>
                                    </td>
                                    <td>
                                        <?= $dimension['descripcion'] ?>
                                    </td>
                                    <td class="d-flex">
                                        <a href="<?= base_url('admin/dimensiones/' . $dimension['id']) ?>"
                                           class="btn btn-default" title="Ver"><i class="fas fa-eye"></i></a>
                                        <!--
                                        <a href="<?= base_url('admin/dimensiones/' . $dimension['id'] . '/edit') ?>"
                                           class="btn btn-default" title="Editar"><i class="fas fa-edit"></i></a>
                                        <form class="display-none" method="post"
                                              action="<?= base_url('admin/dimensiones/' . $dimension['id']) ?>"
                                              id="dimensionDeleteForm<?= $dimension['id'] ?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <a href="javascript:void(0)"
                                               onclick="deleteDimension('dimensionDeleteForm<?= $dimension['id'] ?>')"
                                               class="btn btn-default" title="Eliminar"><i class="fas fa-trash text-red"></i></a>
                                        </form>
                                        -->
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="4">
                                    <h6 class="text-danger text-center">No hay información de dimensiones registradas</h6>
                                </td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>DIMENSIÓN</th>
                            <th>DESCRIPCIÓN</th>
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
    function deleteDimension(formId) {
        var confirm = window.confirm('¿Desea eliminar la dimensión seleccionada? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>

<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>