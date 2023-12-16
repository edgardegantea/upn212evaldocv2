<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | <?= $this->renderSection('title'); ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="icon" href="<?php echo base_url('assets/img/logo/upnloader.png'); ?>">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">


    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/yeti/bootstrap.min.css"
          integrity="sha384-mLBxp+1RMvmQmXOjBzRjqqr0dP9VHU2tb3FK6VB0fJN/AOu7/y+CAeYeWJZ4b3ii" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css?v=3.2.0'); ?>">

</head>


<body class="hold-transition sidebar-mini layout-fixed">

<?= $this->include('admin/template/aside'); ?>

<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <!-- <img class="animation__wobble" src="<?= base_url('assets/img/logo/upnloader.png'); ?>" alt="AdminLTELogo"
                height="300" width="300"> -->
    </div>

    <nav class="main-header navbar navbar-expand bg-navy navbar-dark">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <!-- <a href="/" class="nav-link">Inicio</a> -->
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link mr-3" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"> </i> <?= session()->get('nombre') ?>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- <a href="#" class="dropdown-item">
                        <i class="fas fa-cog"></i> Configuraciones
                    </a> -->
                    <!-- <a href="<?= base_url('admin/perfil') ?>" class="dropdown-item">
                            <i class="fas fa-user"></i> Perfil
                        </a> -->
                    <a href="<?= base_url('logout'); ?>" class="dropdown-item">
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                    </a>
                </div>
            </li>
        </ul>
    </nav>


    <div>

        <div class="content-wrapper" style="background-color: #bbbbbb">

            <section class="content-header">
                <?= $this->renderSection('encabezado'); ?>
            </section>

            <section class="content">
                <div class="container-fluid">

                    <?= $this->renderSection('content'); ?>

                </div>

            </section>


        </div>
    </div>
    <div class="text-center text-primary">
        <?= $this->include('admin/template/footer'); ?>
    </div>
</div>

<?= $this->include('admin/template/js'); ?>

<?= $this->include('admin/template/css'); ?>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>">
</script>

<script src="<?= base_url('assets/dist/js/adminlte.js?v=3.2.0'); ?>"></script>


<script src="<?= base_url('assets/plugins/jquery-mousewheel/jquery.mousewheel.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/raphael/raphael.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-mapael/jquery.mapael.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-mapael/maps/usa_states.min.js'); ?>"></script>

<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- <script src="<?= base_url('assets/dist/js/adminlte.js'); ?>"></script> -->
<script src="<?= base_url('assets/dist/js/pages/dashboard2.js'); ?>"></script>


</body>

</html>