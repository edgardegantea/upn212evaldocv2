<!-- INICIO DE ASIDE -->
<aside class="main-sidebar sidebar-dark-navy bg-navy elevation-4 active">

    <a href="<?= base_url('/admin'); ?>" class="brand-link" style="text-decoration: none">
        <img src="<?= base_url('assets/img/logo/upnloader.png'); ?>" alt="Dashboard"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UPN 212 Teziutlán</span>
    </a>

    <div class="sidebar">

        <div class="user-panel ml-1 mt-3 pb-3 mb-3 d-flex">
            <!--
            <div class="image text-center ml-2">
                <img src="<?= base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" title="<?= session()->get('nombre') ?> <?= session()->get('apaterno'); ?> <?= session()->get('amaterno') ?>">
            </div>
        -->
            <?= session()->get('nombre') ?> <?= session()->get('apaterno'); ?> <?= session()->get('amaterno') ?>
        </div>


        <!--
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        -->


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">PRINCIPAL</li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/usuarios/bu'); ?>" class="nav-link bg-red">
                        <i class="nav-icon fas fa-cog text-light"></i>
                        <p>OPERACIONES CON USUARIOS</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?= base_url('admin/evaluacion/') ?>" class="nav-link">
                        <i class="fas fa-circle text-red nav-icon"></i>
                        <p>EVALUACIÓN AL DESEMPEÑO DOCENTE</p>
                    </a>

                    <!--
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="<?= base_url('logout'); ?>" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                        </a>
                    </div>
-->

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/evaluacion/') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aplicación de evaluación docente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/evaluacion/pl') ?>" class="nav-link">
                                <i class="far fa-circle text-green nav-icon"></i>
                                <p>Resultados de evaluación docente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/evaluacion/pl') ?>" class="nav-link">
                                <i class="far fa-circle text-orange nav-icon"></i>
                                <p>Comentarios de estudiantes hacia los docentes</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header">MÓDULOS DEL SISTEMA</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/usuarios'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Usuarios</p>
                    </a>
                </li>

                <!--
                <li class="nav-item">
                    <a href="<?= base_url('admin/areas'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-user"></i>
                        <p>Áreas</p>
                    </a>
                </li>
-->

                <li class="nav-item">
                    <a href="<?= base_url('admin/profesores'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profesores</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/asignaturas'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>Asignaturas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/estudiantes'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Estudiantes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/grupos'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users-line"></i>
                        <p>Grupos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/periodosescolares'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-timeline"></i>
                        <p>Periodos escolares</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="<?= base_url('admin/sedes'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-school"></i>
                        <p>Sedes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/carreras'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Carreras</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/modalidades'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-voicemail"></i>
                        <p>Modalidades</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/dimensiones'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>Dimensiones</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/preguntas'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-question"></i>
                        <p>Preguntas de evaluación</p>
                    </a>
                </li>



                <li class="nav-header">RECURSOS ADICIONALES</li>
                <li class="nav-item">
                    <a href="https://drive.google.com/drive/folders/1zuseH7Dziw9Nbr9sjn52HUCK9gAcnWYI?usp=sharing"
                        target="_blank" class="nav-link">
                        <i class="fas fa-list text-primary nav-icon"></i>
                        <p>ESTUDIANTES - EMAILS Y CONTRASEÑAS DE ACCESO</p>
                    </a>
                </li>
            </ul>


        </nav>

    </div>

</aside>

<!-- FIN DE ASIDE -->