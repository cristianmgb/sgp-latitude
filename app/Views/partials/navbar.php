<nav class="navbar navbar-expand-md navbar-light navbar-ci fixed-top p-4">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('/'); ?>">
            <img src="<?php echo base_url('/dist/img/logo-header.png'); ?>" alt="cihispano-logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-ci" aria-controls="navbar-ci" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbar-ci">
            <ul class="navbar-nav nav-ci ml-auto">
                <li class="nav-item active">
                    <?= anchor('/', 'Inicio <span class="sr-only">(current)</span>', 'class="nav-link"') ?>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="nosotros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nosotros</a>
                    <div class="dropdown-menu mt-3" aria-labelledby="nosotros">
                        <?= anchor('/acerca', 'Quiénes somos ?', 'class="dropdown-item"') ?>
                        <div class="dropdown-divider"></div>
                        <?= anchor('/donacion', 'Donaciones', 'class="dropdown-item"') ?>
                        <div class="dropdown-divider"></div>
                        <?= anchor('/faqs', 'FAQs', 'class="dropdown-item"') ?>
                        <div class="dropdown-divider"></div>
                        <?= anchor('/soporte', 'Soporte y Ayuda', 'class="dropdown-item"') ?>
                    </div>
                </li>
                <li class="nav-item">
                    <?= anchor('/tutoriales', 'Tutoriales', 'class="nav-link"') ?>
                </li>
                <li class="nav-item">
                    <?= anchor('/hecho-en-codeigniter', 'Hecho en CI', 'class="nav-link"') ?>
                </li>
                <li class="nav-item">
                    <?= anchor('/contacto', 'Contacto', 'class="nav-link"') ?>
                </li>
            </ul>
        </div>
    </div>
</nav>