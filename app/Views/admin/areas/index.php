<?= $this->extend('admin/template/layout');
$this->section('title') ?>Áreas<?= $this->endSection();
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
                    <h5 class="card-title">Áreas</h5>

                    <a href="<?= base_url('admin/') ?>" class="btn btn-default float-right ml-2">Regresar</a>


                    <a href="<?= base_url('admin/areas/new') ?>" class="btn btn-primary float-right">Nueva área</a>
                    
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped">
                        <thead>
                        <tr>
                            <th>ÁREA</th>
                            <!-- <th>RESUMEN</th> -->
                            <th>DESCRIPCIÓN</th>
                            <!-- <th>TEMARIO</th>
                            <th>ACCIONES</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($areas) > 0):
                            foreach ($areas as $area): ?>
                                <tr>
                                    <td><?= $area['nombre']; ?> </td>
                                    <!-- <td>
                                        <p>Créditos: <?= $area['creditos']; ?></p>
                                        <p>Horas D/S/M: <?= $area['horasSemana']; ?></p>

                                    </td> -->
                                    <td><?= $area['descripcion'] ?> </td>
                                    <!-- <td><?= $area['temario'] ?></td>
                                    <td class="d-flex">
                                        <a href="<?= base_url('admin/areas/' . $area['id']) ?>"
                                           class="btn btn-default" title="Ver"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('admin/areas/' . $area['id'] . '/edit') ?>"
                                           class="btn btn-default" title="Editar"><i
                                                class="fas fa-edit"></i></a>
                                        <form class="display-none" method="post"
                                              action="<?= base_url('admin/areas/' . $area['id']) ?>"
                                              id="asignaturaDeleteForm<?= $area['id'] ?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <a href="javascript:void(0)"
                                               onclick="deleteAsignatura('asignaturaDeleteForm<?= $area['id'] ?>')"
                                               class="btn btn-default" title="Eliminar"><i
                                                    class="fas fa-trash text-red"></i></a>
                                        </form>
                                    </td> -->
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="5">
                                    <h6 class="text-danger text-center">No hay información de areas registradas</h6>
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
    function deleteAsignatura(formId) {
        var confirm = window.confirm('¿Desea eliminar el área seleccionada? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>