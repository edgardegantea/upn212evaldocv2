<!-- INICIO DE ASIDE -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-gradient-navy">

    <a href="<?= base_url('estudiante') ?>" class="brand-link">
        <img src="<?= base_url('assets/img/logo/upnloader.png'); ?>" alt="Dashboard"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Evaluación docente</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="<?= base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image"> -->
                <?= session()->get('nombre') ?> <?= session()->get('apaterno'); ?> <?= session()->get('amaterno') ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">PRINCIPAL</li>


                <!--
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-info"></i>
                        <p>Sistema en construcción</p>
                    </a>
                </li>
                -->


                <li class="nav-item">
                    <a href="<?= base_url('estudiante/evaluacion/CED') ?>" class="nav-link" target="_blank">
                        <i class="nav-icon fas fa-file-pdf"></i>
                        <p>Constancia de evaluación docente</p>
                    </a>
                </li>


                <!--
                <li class="nav-item">
                    <a href="<?= base_url('estudiante/evaluacion/') ?>" class="nav-link">
                        <i class="nav-icon fas fa-school"></i>
                        <p>Evaluación al Desempeño Docente</p>
                    </a>
                </li>
-->

            </ul>
        </nav>

    </div>

</aside>

<!-- FIN DE ASIDE -->