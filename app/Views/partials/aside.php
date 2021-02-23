<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <i class="fas fa-bars"></i>
    </button>
    <?=anchor('#', '<i class="fas fa-bars"></i>', 'class="c-header-brand d-lg-none"')?>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <i class="fas fa-bars"></i>
    </button>
    <ul class="c-header-nav ml-auto mr-2">
        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar">
                    <i class="fas fa-user-circle fa-lg"></i>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right py-0 mt-3">
                <div class="dropdown-header bg-dark py-2 text-center text-white">
                    <strong>Configuración</strong>
                </div>
                <div class="dropdown-header py-2 text-center">
                    <strong><?=session()->getFlashdata('firt_name')?></strong>
                </div>
                <?=anchor('#', '<i class="fas fa-user-cog mr-2"></i> Pérfil', 'class="dropdown-item"')?>
                <?=anchor('auth/logout', '<i class="fas fa-sign-out-alt mr-2"></i> Salir', 'class="dropdown-item"')?>
            </div>
        </li>
    </ul>
    <?=$this->renderSection('breadcrumb')?>
</header>