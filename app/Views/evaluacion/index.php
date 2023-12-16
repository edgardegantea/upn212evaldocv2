<?= $this->extend('usuario/template/layout'); ?>

<?= $this->section('content'); ?>

<div class="row">

    <div class="col-md-3">

    </div>
    <div class="col">

        <h1 class="text-center">EVALUACIÓN AL DESEMPEÑO DOCENTE est</h1>
        <p class="mt-5 text-center">
            Apreciable estudiante de la Universidad Pedagógica Nacional Unidad 212 Teziutlán. El presente instrumento
            tiene como finalidad conocer las fortalezas y áreas de oportunidad para la mejora del servicio que se te
            brinda, no guarda relación con tu calificación, por lo que se te solicita responder con la mayor veracidad
            posible.
        </p>

        <div class="text-center">
            <a class="btn btn-warning btn-lg text-uppercase mr-5 ml-5"
                href="<?php echo base_url('admin/evaluacion/formulario') ?>">Iniciar</a>

            <!-- <a class="btn btn-danger btn-lg text-uppercase" href="<?php echo base_url('logout') ?>">Finalizar sesión</a> -->
        </div>

        <div class="float-right text-center">
            <!-- <a href="#" class="mt-5 btn btn-ligth">Necesito ayuda</a> -->
        </div>

    </div>
    <div class="col-md-3"></div>


</div>


<?= $this->endSection(); ?>