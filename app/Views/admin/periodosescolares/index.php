<?= $this->extend('admin/template/layout');

$this->section('title') ?> Periodos escolares <?= $this->endSection();
?>

<?= $this->section('content'); ?>

<?php 
use system\Codeigniter\I18n\Time;
helper('date');
?>


<div class="">
    <div class="row">
        <div class="col-xl-12 text-end">
            
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
                    <h3 class="card-title">Periodos Escolares</h3>
                    <a href="<?= base_url('admin/periodosescolares/new') ?>" class="btn btn-primary float-right">Nuevo periodo escolar</a>
                    <a href="<?= base_url('admin/') ?>" class="btn btn-default float-right mr-2">Regresar</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRE</th>
                            <th>TIPO</th>
                            <th>INICIO</th>
                            <th>TÉRMINO</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($periodosescolares) > 0):
                            foreach ($periodosescolares as $pe): ?>
                                <tr>
                                    <td><?= $pe['codigo']; ?></td>
                                    <td><?= $pe['nombre'] ?></td>
                                    <td><?= $pe['tipo'] ?> </td>
                                    <td>
                                        <!--
                                        <?php
                                            $datetime = new \DateTime($pe['fechaInicio'], new \DateTimeZone("America/Mexico_City"));
                                            print $datetime->format('d-M-Y');
                                        ?>
                                    -->

                                        <?php
                                            $datetime = (new \CodeIgniter\I18n\Time($pe['fechaInicio'], "America/Mexico_City", "es"));
                                            print $datetime->format('Y-m-d');
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $datetime = (new \CodeIgniter\I18n\Time($pe['fechaFin'], "America/Mexico_City", "es"));
                                            print $datetime->format('Y-m-d');
                                        ?>
                                    </td>
                                    <td class="d-flex">
                                        <!-- <a href="<?= base_url('admin/periodosescolares/' . $pe['id']) ?>"
                                           class="btn btn-sm btn-info mx-1" title="Ver"><i
                                                class="bi bi-info-square"></i></a> -->
                                        <!--
                                        <a href="<?= base_url('admin/periodosescolares/' . $pe['id'] . '/edit') ?>"
                                           class="btn btn-sm btn-success mx-1" title="Editar"><i
                                                class="bi bi-pencil-square"></i></a>
                                            -->
                                        <form class="display-none" method="post"
                                              action="<?= base_url('admin/periodosescolares/' . $pe['id']) ?>"
                                              id="peDeleteForm<?= $pe['id'] ?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <a href="javascript:void(0)"
                                               onclick="deletePE('peDeleteForm<?= $pe['id'] ?>')"
                                               class="btn btn-sm btn-danger" title="Eliminar"><i
                                                    class="fas fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="5">
                                    <h6 class="text-danger text-center">No hay información de periodos escolares registrados</h6>
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
    function deletePE(formId) {
        var confirm = window.confirm('¿Desea eliminar el periodo escolar seleccionado? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>
