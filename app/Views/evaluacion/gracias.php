<?= $this->extend('usuario/template/layout'); ?>

<?= $this->section('content'); ?>

    <div class="row">
        <div class="text-center mb-5 text-uppercase">
            Periodo evaluado: 2023-2 (Del 17 de agosto de 2023 al 24 de noviembre de 2023)
        </div>
        <div class="text-center text-uppercase mb-5">
            Alumno: <?= session()->get('nombre') ?> <?= session()->get('apaterno') ?> <?= session()->get('amaterno') ?>
        </div>

        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            <h1>Lista de Asignaturas Evaluadas</h1>

            <table class="table mt-5 mb-5 bg-light text-black">
                <thead>
                <tr>
                    <th>ASIGNATURA</th>
                    <th>CÓDIGO ÚNICO DE REFERENCIA</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($evaluatedSubjectsAndReferenceCodes as $data): ?>
                    <tr>
                        <td><?= $data->subjectName ?></td>
                        <td><?= $data->evaluationCode ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="mt-5 mb-5">
                <h3>Favor de verificar que haya evaluado todas las asignaturas cursadas</h3>
            </div>

            <div class="mt-5">
                <a class="btn btn-danger btn-lg text-uppercase" href="<?php echo base_url('estudiante/') ?>">Volver al
                    panel
                    de control</a>
            </div>


        </div>
        <div class="col-md-2"></div>


        <?= $this->endSection(); ?>

    </div>

<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>