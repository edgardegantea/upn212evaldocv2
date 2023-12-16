<?= $this->extend('admin/template/layout'); ?>

<?= $this->section('content'); ?>

<div class="row">

    <div class="col-md-3">

    </div>
    <div class="col">

        <h3 class="text-center">COMENTARIOS DE EVALUACIÓN DOCENTE</h3>
        <p class="mt-5 text-center text-uppercase">
            
        </p>

    </div>
    <div class="col-md-3"></div>
</div>


<section>
    <h1>Resultados</h1>


    <table class="table table-justify table-striped">
        <thead>
            <th style="width: 25%">Profesor</th>
            <th>Comentario</th>
        </thead>

        <tbody>

            <?php foreach ($cpd as $comentario): ?>

                <tr>
                <td><?= $comentario->nombre ?></td>
                <td><?= $comentario->comentario ?></td>
            </tr>
                
            <?php endforeach; ?>
            
        </tbody>

        <tfoot>
            <th>Profesor</th>
            <th>Comentario</th>
        </tfoot>
    </table>
</section>




<?= $this->endSection(); ?>