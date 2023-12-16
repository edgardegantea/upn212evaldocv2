<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de Evaluación Docente UPN-212-Teziutlán">
    <meta name="author" content="Edgar Degante Aguilar">
    <title>UPN212 - Evaluación Docente</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="<?php echo base_url('assets/img/logo/upn-logo-tez.jpg'); ?>" sizes="32x32" type="image/png">
    <link rel="icon" href="<?php echo base_url('assets/img/logo/upn-logo-tez.jpg'); ?>" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="<?php echo base_url('assets/img/logo/upnloader.png'); ?>">
    <!-- <meta name="theme-color" content="#712cf9"> -->


    <style>
    #h1 #h2 #h3 #h4 #h5 #h6 #p {
        color: white;
    }

    #body {
        background-color: #0a53be;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(255, 255, 255, 100);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 180, 100), inset 0 .125em .5em rgba(0, 0, 255, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/cover.css'); ?>" rel="stylesheet">
</head>

<body class="d-flex h-100 text-light" style="background-color: #0a53be">


    <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">

        <header class="mb-auto">
            <!--
        <div>
            
            <h3 class="float-md-start mb-0">UPN212</h3>
            
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/">Inicio</a>
                <a class="nav-link fw-bold py-1 px-0" href="instrucciones">Instrucciones</a>
                <a class="nav-link fw-bold py-1 px-0" href="acercade">Acerca de</a>
                <a class="nav-link fw-bold py-1 px-0" href="contacto">Contacto</a>
            </nav>
        </div>
    -->
        </header>

        <main class="">


            <?php $this->renderSection('content'); ?>


        </main>

        <footer class="mt-auto text-center text-light">
            <p>Developed by edegantea, for <a style="link: none" href="http://www.upn212teziutlan.edu.mx/"
                    target="_blank" class="text-light">UPN-212-Teziutlán</a>. <?php echo date('Y'); ?>.
            </p>
        </footer>
    </div>

    <script type="text/javascript" src="<?php echo base_url('assets/js/color-modes.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>

</html>