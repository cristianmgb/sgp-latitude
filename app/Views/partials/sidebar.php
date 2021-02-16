<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
        <?= anchor('admin', '<i class="fas fa-tachometer-alt c-sidebar-nav-icon"></i> Inicio', 'class="c-sidebar-nav-link"') ?>
    </li>
    <li class="c-sidebar-nav-title">Módulos</li>
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
    <li class="c-sidebar-nav-title">Configuración</li>
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