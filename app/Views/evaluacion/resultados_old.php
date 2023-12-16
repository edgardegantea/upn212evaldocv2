<?= $this->extend('admin/template/layout'); ?>

<?= $this->section('content'); ?>

<div class="row">

    <div class="col-md-3">

    </div>
    <div class="col">

        <h3 class="text-center">RESULTADOS DE EVALUACIÓN DOCENTE</h3>
        <p class="mt-5 text-center text-uppercase">
            Módulo en construcción
        </p>

    </div>
    <div class="col-md-3"></div>
</div>


<section>
    <h1>Resultados</h1>


    <table class="table table-justify table-striped">
        <thead>
            <th>Profesor</th>
            <th>A1</th>
            <th>A2</th>
            <th>A3</th>
            <th>A4</th>
            <th>A5</th>
            <th>A6</th>
            <th>A7</th>
        </thead>

        <tbody>
            <tr>
                <?php foreach($resultados as $r) : ?>
                    <td><?= $r->pregunta1 ?></td>
                    <!-- <td><?= $r['pregunta2'] ?></td>
                    <td><?= $r['pregunta3'] ?></td>
                    <td><?= $r['pregunta4'] ?></td>
                    <td><?= $r['pregunta5'] ?></td> -->
                <?php endforeach; ?>
            </tr>
        </tbody>

        <tfoot>
            <th>Profesor</th>
            <th>A1</th>
            <th>A2</th>
            <th>A3</th>
            <th>A4</th>
            <th>A5</th>
            <th>A6</th>
            <th>A7</th>
        </tfoot>
    </table>
</section>




<?= $this->endSection(); ?>