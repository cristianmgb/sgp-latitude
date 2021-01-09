<!doctype html>
<html lang="es" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->renderSection('title') ?></title>
        <!--  App CSS (Do not remove) -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/dist/css/dash.css'); ?>">
    </head>
    <body class="c-app c-legacy-theme">
        <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
            <div class="c-sidebar-brand d-lg-down-none">
                <h5 class="c-sidebar-brand-full">
                    <i class="fas fa-server fa-sm text-white"></i> SGP Latitude
                </h5>
                <i class="fas fa-server fa-lg text-white c-sidebar-brand-minimized"></i>
            </div>
            <ul class="c-sidebar-nav">
                <li class="c-sidebar-nav-item">
                    <?= anchor('admin/inicio', '<i class="fas fa-tachometer-alt c-sidebar-nav-icon"></i> Inicio', 'class="c-sidebar-nav-link"') ?>
                </li>
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                    <?= anchor('#', '<i class="fas fa-user-friends c-sidebar-nav-icon"></i> Asociados', 'class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"') ?>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <?= anchor('admin/asociado/nuevo', '<i class="fas fa-plus fa-sm c-sidebar-nav-icon"></i> Nuevo', 'class="c-sidebar-nav-link"') ?>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <?= anchor('admin/asociados', '<i class="fas fa-list-ul fa-sm c-sidebar-nav-icon"></i> Listado', 'class="c-sidebar-nav-link"') ?>
                        </li>
                    </ul>
                </li>
                <li class="c-sidebar-nav-item">
                    <?= anchor('admin/contratistas', '<i class="fas fa-people-carry c-sidebar-nav-icon"></i> Contratistas', 'class="c-sidebar-nav-link"') ?>
                </li>
                <li class="c-sidebar-nav-item">
                    <?= anchor('admin/impuestos', '<i class="fas fa-tags c-sidebar-nav-icon"></i> Impuestos', 'class="c-sidebar-nav-link"') ?>
                </li>
                <li class="c-sidebar-nav-item">
                    <?= anchor('admin/polizas', '<i class="fas fa-vote-yea c-sidebar-nav-icon"></i> Polizas', 'class="c-sidebar-nav-link"') ?>
                </li>
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                    <?= anchor('#', '<i class="fas fa-building c-sidebar-nav-icon"></i> Proyectos', 'class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"') ?>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <?= anchor('admin/proyecto/nuevo', '<i class="fas fa-plus fa-sm c-sidebar-nav-icon"></i> Nuevo', 'class="c-sidebar-nav-link"') ?>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <?= anchor('admin/proyectos', '<i class="fas fa-list-ul fa-sm c-sidebar-nav-icon"></i> Listado', 'class="c-sidebar-nav-link"') ?>
                        </li>
                    </ul>
                </li>
                <li class="c-sidebar-nav-item">
                    <?= anchor('admin/roles', '<i class="fas fa-user-tag c-sidebar-nav-icon"></i> Roles', 'class="c-sidebar-nav-link"') ?>
                </li>
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                    <?= anchor('#', '<i class="fas fa-users c-sidebar-nav-icon"></i> Usuarios', 'class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"') ?>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <?= anchor('admin/usuario/nuevo', '<i class="fas fa-plus fa-sm c-sidebar-nav-icon"></i> Nuevo', 'class="c-sidebar-nav-link"') ?>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <?= anchor('admin/usuarios', '<i class="fas fa-list-ul fa-sm c-sidebar-nav-icon"></i> Listado', 'class="c-sidebar-nav-link"') ?>
                        </li>
                    </ul>
                </li>
            </ul>
            <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
        </div>
        <div class="c-wrapper" id="dash">
            <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
                <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="c-header-brand d-lg-none" href="#">
                    <i class="fas fa-bars"></i>
                </a>
                <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="c-header-nav ml-auto mr-2">
                    <li class="c-header-nav-item dropdown">
                        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="c-avatar">
                                <i class="fas fa-cogs"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right py-0 mt-3">
                            <div class="dropdown-header bg-dark py-2 text-center text-white">
                                <strong>Configuración</strong>
                            </div>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user-cog mr-2"></i> Pérfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-sign-out-alt mr-2"></i> Salir
                            </a>
                        </div>
                    </li>
                </ul>
                <?= $this->renderSection('breadcrumb') ?>
            </header>
            <div class="c-body">
                <main class="c-main fade-in">
                    <div class="container-fluid">
                        <!-- Contenido y carga dinámica de las vistas -->
                        <?= $this->renderSection('content') ?>
                    </div>
                </main>
                <footer class="c-footer">
                    <div>
                        Hecho con <i class="fas fa-heart"></i> por <a href="https://cihispano.org/" target="_blank">CiHispano</a>
                    </div>
                    <div class="ml-auto">Potenciado por <a href="https://coreui.io/" target="_blank">CoreUI</a></div>
                </footer>
            </div>
        </div>
        <!-- App JS (Do not remove) -->
        <script src="<?php echo base_url('/dist/js/commons.js'); ?>"></script>
        <script src="<?php echo base_url('/dist/js/dash.js'); ?>"></script>
    </body>
</html>