<?= $this->extend('admin/template/layout');
$this->section('title') ?> Sedes <?= $this->endSection();
?>



<?= $this->section('content'); ?>
<div class="d-grid gap-2 d-md-flex justify-content-sm-end">
    <a href="<?= base_url('admin/') ?>" class="btn btn-default float-right mb-3"><i class="fa fa-arrow-left"></i> Regresar</a>
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
                    <h5 class="card-title">Sedes</h5>
                    <a href="<?= base_url('admin/sedes/new') ?>" class="btn btn-primary float-right">Nueva
                        sede</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SEDE</th>
                            <th>TELÉFONO</th>
                            <th>CORREO ELECTRÓNICO</th>
                            <th>WEBSITE</th>
                            <th>FACEBOOK</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if (!empty($sedes) && is_array($sedes)): ?>
                            <?php foreach ($sedes as $sede): ?>

                                <td>
                                    <?= $sede['nombre'] ?>
                                </td>

                                <td>
                                    <?= $sede['telefono'] ?>
                                </td>

                                <td>
                                    <?= $sede['email'] ?>
                                </td>

                                <td>
                                    <?= $sede['website'] ?>
                                </td>

                                <td>
                                    <?= $sede['facebook'] ?>
                                </td>

                                <td class="d-flex">
                                    <a href="<?= base_url('/admin/sedes/' . $sede['id']); ?>" class="btn btn-sm mx-1"
                                       title="Ver"><span class="fas fa-eye"><span></a>
                                    <a href="<?= base_url('/admin/sedes/' . $sede['id']. '/edit'); ?>"
                                       class="btn btn-sm mx-1"><span class="fas fa-edit"><span></a>

                                    <form class="display-none" method="post"
                                          action="<?= base_url('/admin/sedes/' . $sede['id']); ?>"
                                          id="sedeDeleteForm<?= $sede['id'];?>">
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <a href="javascript:void(0)"
                                           onclick="deleteSede('sedeDeleteForm<?= $sede['id']; ?>')"
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
                            <th>SEDE</th>
                            <th>TELÉFONO</th>
                            <th>CORREO ELECTRÓNICO</th>
                            <th>WEBSITE</th>
                            <th>FACEBOOK</th>
                            <th>ACCIONES</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/template/datatables'); ?>

<script>

    $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#success-alert").slideUp(500);
    });


    function deleteSede(formId) {
        var confirm = window.confirm('¿Desea eliminar la sede seleccionada? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>
<?= $this->endSection(); ?>

