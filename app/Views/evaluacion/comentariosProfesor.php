<?=
    $this->extend('admin/template/layout');
    $this->section('title') ?> Resultados <?= $this->endSection();
?>

<?= $this->section('content'); ?>
<div class="">

    <div class="card mb-5">

        <div class="card-header">
            <a href="<?= base_url('admin/evaluacion/pl') ?>" class="btn btn-default float-right mr-2"><i
                    class="fa fa-arrow-left"></i> Regresar</a>
            <h5>Comentarios para <?= $profesor['nombre'] ?></h5>

        </div>

        <div class="card-body">

            <ul class="list-group list-group-flush">

                <?php if (empty($comments)): ?>
                <li>Sin comentarios</li>
                <?php else: ?>
                <?php foreach ($comments as $comment): ?>
                <li class="list-group-item"><?= $comment['comentario'] ?></li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>





</div>
<?= $this->endSection(); ?>


<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>