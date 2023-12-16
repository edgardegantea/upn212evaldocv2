<?= $this->extend('admin/template/layout');
$this->section('title') ?> Modalidades <?= $this->endSection();
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
                    <h5 class="card-title">Modalidades</h5>
                    <a href="<?= base_url('admin/modalidades/new') ?>" class="btn btn-primary float-right">Nueva modalidad</a>
                    <a href="<?= base_url('admin/') ?>" class="btn btn-outline-secondary float-right mr-2"><i
            class="fa fa-arrow-left"></i> Regresar</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>MODALIDAD</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if (!empty($modalidades) && is_array($modalidades)): ?>
                            <?php foreach ($modalidades as $modalidad): ?>

                                <td>
                                    <?= $modalidad['nombre'] ?>
                                </td>
                                <td class="d-flex">
                                    <a href="<?= base_url('/admin/modalidades/' . $modalidad['id']); ?>" class="btn btn-sm mx-1"
                                       title="Ver"><span class="fas fa-eye"><span></a>
                                    <a href="<?= base_url('/admin/modalidades/' . $modalidad['id']. '/edit'); ?>"
                                       class="btn btn-sm mx-1"><span class="fas fa-edit"><span></a>

                                    <form class="display-none" method="post"
                                          action="<?= base_url('/admin/modalidades/' . $modalidad['id']); ?>"
                                          id="modalidadDeleteForm<?= $modalidad['id'];?>">
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <a href="javascript:void(0)"
                                           onclick="deleteModalidad('modalidadDeleteForm<?= $modalidad['id']; ?>')"
                                           class="btn btn-sm bg-danger" title="Eliminar registro"><span
                                                class="fas fa-trash"></span></a>
                                    </form>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>MODALIDAD</th>

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

    $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#success-alert").slideUp(500);
    });


    function deleteModalidad(formId) {
        var confirm = window.confirm('¿Desea eliminar la modalidad seleccionada? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>
<?= $this->endSection(); ?>

