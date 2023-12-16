<?= $this->extend('admin/template/layout'); ?>

<?= $this->section('content'); ?>
<!-- <h1>Panel de control de <?= session()->get('nombre'); ?></h1> -->


<div class="row">
    <div class="small-box bg-light col-md mr-2">
        <div class="inner">
            <h3><?= $distinctProfessorsCount ?></h3>
            <p>Profesores evaluados</p>
        </div>
        <div class="icon">
            <i class="fas fa-user"></i>
        </div>
        <a href="<?= base_url('admin/evaluacion/pl') ?>" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>


    <div class="small-box bg-light col-md mr-2">
        <div class="inner">
            <h3><?= $distinctSubjectsCount ?></h3>
            <p>Asignaturas evaluadas</p>
        </div>
        <div class="icon">
            <i class="fas fa-bookmark"></i>
        </div>
        <a href="<?= base_url('admin/asignaturas') ?>" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>

</div>


<div class="row">
    <div class="small-box bg-light col-md mr-2">
        <div class="inner">
            <h3><?= $studentCount ?></h3>
            <p>Estudiantes</p>
        </div>
        <div class="icon">
            <i class="fas fa-user-graduate"></i>
        </div>
        <a href="<?= base_url('admin/usuarios/bu'); ?>" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>

    <div class="small-box bg-light col-md mr-2">
        <div class="inner">
            <h3><?= $preguntas ?></h3>
            <p>Preguntas de evaluación</p>
        </div>
        <div class="icon">
            <i class="fas fa-question"></i>
        </div>
        <a href="<?= base_url('admin/preguntas'); ?>" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>


<?= $this->endSection(); ?>