<?= $this->extend('docente/template/layout');

$this->section('title') ?> Asignaturas <?= $this->endSection();

$this->section('encabezado') ?><p class="text-uppercase">Asignaturas</p><?= $this->endSection();

?>



<?= $this->section('content'); ?>

<div class="">
    <div class="row py-4">
        <div class="col-xl-12 text-end">
            <a href="<?= base_url('docente/') ?>" class="btn btn-default">Regresar</a>
        </div>
    </div>

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
                    <a href="<?= base_url('docente/asignaturas/new') ?>" class="btn btn-primary float-right">Nueva asignatura</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ASIGNATURA</th>
                            <th>RESUMEN</th>
                            <th>DESCRIPCIÓN</th>
                            <th>TEMARIO</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($asignaturas) > 0):
                            foreach ($asignaturas as $asignatura): ?>
                                <tr>
                                    <td><?= $asignatura['nombre']; ?> </td>
                                    <td>
                                        <p>Créditos: <?= $asignatura['creditos']; ?></p>
                                        <p>Horas D/S/M: <?= $asignatura['horasSemana']; ?></p>

                                    </td>
                                    <td><?= $asignatura['descripcion'] ?> </td>
                                    <td><?= $asignatura['temario'] ?></td>
                                    <td class="d-flex">
                                        <a href="<?= base_url('docente/asignaturas/' . $asignatura['id']) ?>"
                                           class="btn btn-sm btn-info mx-1" title="Ver"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('docente/asignaturas/' . $asignatura['id'] . '/edit') ?>"
                                           class="btn btn-sm btn-success mx-1" title="Editar"><i
                                                class="fas fa-edit"></i></a>
                                        <form class="display-none" method="post"
                                              action="<?= base_url('docente/asignaturas/' . $asignatura['id']) ?>"
                                              id="asignaturaDeleteForm<?= $asignatura['id'] ?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <a href="javascript:void(0)"
                                               onclick="deleteAsignatura('asignaturaDeleteForm<?= $asignatura['id'] ?>')"
                                               class="btn btn-sm btn-danger" title="Eliminar"><i
                                                    class="fas fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="5">
                                    <h6 class="text-danger text-center">No hay información de asignaturas registradas</h6>
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
        var confirm = window.confirm('¿Desea eliminar la asignatura seleccionada? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>
