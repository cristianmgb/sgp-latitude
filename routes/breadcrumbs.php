<?php

// Inicio
Breadcrumbs::for('home.index', function ($trail) {
    $trail->push('Inicio', route('home.index'));
});

// Inicio > Asociados
Breadcrumbs::for('associates.index', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Asociados', route('associates.index'));
});
// Inicio > Asociados > Nuevo Asociado
Breadcrumbs::for('associates.create', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Asociados', route('associates.index'));
    $trail->push('Nuevo Asociado', route('associates.create'));
});
// Inicio > Asociados > Editar Asociado
Breadcrumbs::for('associates.edit', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Asociados', route('associates.index'));
    $trail->push('Editar Asociado', route('associates.edit', $id ?? ''));
});
// Inicio > Asociados > Ver Asociado
Breadcrumbs::for('associates.show', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Asociados', route('associates.index'));
    $trail->push('Ver Asociado', route('associates.show', $id ?? ''));
});

// Inicio > Contratistas
Breadcrumbs::for('contractors.index', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Contratistas', route('contractors.index'));
});
// Inicio > Contratistas > Nuevo Contratista
Breadcrumbs::for('contractors.create', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Contratistas', route('contractors.index'));
    $trail->push('Nuevo Contratista', route('contractors.create'));
});
// Inicio > Contratistas > Editar Contratista
Breadcrumbs::for('contractors.edit', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Contratistas', route('contractors.index'));
    $trail->push('Editar Contratista', route('contractors.edit', $id ?? ''));
});
// Inicio > Contratistas > Ver Contratista
Breadcrumbs::for('contractors.show', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Contratistas', route('contractors.index'));
    $trail->push('Ver Contratista', route('contractors.show', $id ?? ''));
});

// Inicio > Impuestos
Breadcrumbs::for('taxes.index', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Impuestos', route('taxes.index'));
});
// Inicio > Impuestos > Nuevo Impuesto
Breadcrumbs::for('taxes.create', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Impuestos', route('taxes.index'));
    $trail->push('Nuevo Impuesto', route('taxes.create'));
});
// Inicio > Impuestos > Editar Impuesto
Breadcrumbs::for('taxes.edit', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Impuestos', route('taxes.index'));
    $trail->push('Editar Impuesto', route('taxes.edit', $id ?? ''));
});
// Inicio > Impuestos > Ver Impuesto
Breadcrumbs::for('taxes.show', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Impuestos', route('taxes.index'));
    $trail->push('Ver Impuesto', route('taxes.show', $id ?? ''));
});

// Inicio > Pólizas
Breadcrumbs::for('policies.index', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Pólizas', route('policies.index'));
});
// Inicio > Pólizas > Nuevo Póliza
Breadcrumbs::for('policies.create', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Pólizas', route('policies.index'));
    $trail->push('Nuevo Póliza', route('policies.create'));
});
// Inicio > Pólizas > Editar Póliza
Breadcrumbs::for('policies.edit', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Pólizas', route('policies.index'));
    $trail->push('Editar Póliza', route('policies.edit', $id ?? ''));
});
// Inicio > Pólizas > Ver Póliza
Breadcrumbs::for('policies.show', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Pólizas', route('policies.index'));
    $trail->push('Ver Póliza', route('policies.show', $id ?? ''));
});

// Inicio > Proyectos
Breadcrumbs::for('projects.index', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Proyectos', route('projects.index'));
});
// Inicio > Proyectos > Nuevo Proyecto
Breadcrumbs::for('projects.create', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Proyectos', route('projects.index'));
    $trail->push('Nuevo Proyecto', route('projects.create'));
});
// Inicio > Proyectos > Editar Proyecto
Breadcrumbs::for('projects.edit', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Proyectos', route('projects.index'));
    $trail->push('Editar Proyecto', route('projects.edit', $id ?? ''));
});
// Inicio > Proyectos > Ver Proyecto
Breadcrumbs::for('projects.show', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Proyectos', route('projects.index'));
    $trail->push('Ver Proyecto', route('projects.show', $id ?? ''));
});
// Inicio > Usuarios
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Usuarios', route('users.index'));
});
// Inicio > Usuarios > Nuevo Usuario
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Usuarios', route('users.index'));
    $trail->push('Nuevo Usuario', route('users.create'));
});
// Inicio > Usuarios > Editar Usuario
Breadcrumbs::for('users.edit', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Usuarios', route('users.index'));
    $trail->push('Editar Usuario', route('users.edit', $id ?? ''));
});
// Inicio > Usuarios > Ver Usuario
Breadcrumbs::for('users.show', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Usuarios', route('users.index'));
    $trail->push('Ver Usuario', route('users.show', $id ?? ''));
});
// Inicio > Roles
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Roles', route('roles.index'));
});
// Inicio > Roles > Nuevo Rol
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Roles', route('roles.index'));
    $trail->push('Nuevo Rol', route('roles.create'));
});
// Inicio > Roles > Editar Rol
Breadcrumbs::for('roles.edit', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Roles', route('roles.index'));
    $trail->push('Editar Rol', route('roles.edit', $id ?? ''));
});
// Inicio > Roles > Ver Rol
Breadcrumbs::for('roles.show', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Roles', route('roles.index'));
    $trail->push('Ver Rol', route('roles.show', $id ?? ''));
});
// Inicio > Permisos
Breadcrumbs::for('permissions.index', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Permisos', route('permissions.index'));
});
// Inicio > Permisos > Nuevo Permiso
Breadcrumbs::for('permissions.create', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Permisos', route('permissions.index'));
    $trail->push('Nuevo Permiso', route('permissions.create'));
});
// Inicio > Permisos > Editar Permiso
Breadcrumbs::for('permissions.edit', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Permisos', route('permissions.index'));
    $trail->push('Editar Permiso', route('permissions.edit', $id ?? ''));
});
// Inicio > Permisos > Ver Permiso
Breadcrumbs::for('permissions.show', function ($trail) {
    $trail->parent('home.index');
    $trail->push('Permisos', route('permissions.index'));
    $trail->push('Ver Permiso', route('permissions.show', $id ?? ''));
});