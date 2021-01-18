<!doctype html>
<html lang="es" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->renderSection('title') ?></title>
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('/dist/img/apple-icon-57x57.png'); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('/dist/img/apple-icon-60x60.png'); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('/dist/img/apple-icon-72x72.png'); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('/dist/img/apple-icon-76x76.png'); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('/dist/img/apple-icon-114x114.png'); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('/dist/img/apple-icon-120x120.png'); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('/dist/img/apple-icon-144x144.png'); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('/dist/img/apple-icon-152x152.png'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('/dist/img/apple-icon-180x180.png'); ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('/dist/img/android-icon-192x192.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/dist/img/favicon-32x32.png'); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('/dist/img/favicon-96x96.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/dist/img/favicon-16x16.png'); ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo base_url('/dist/img/favicon/ms-icon-144x144.png'); ?>">
        <meta name="theme-color" content="#ffffff">
        <!--  App CSS (Do not remove) -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/dist/css/dash.css'); ?>">
    </head>
    <body class="c-app c-legacy-theme">
        <?= $this->include('partials/topbar') ?>
        <div class="c-wrapper" id="dash">
            <?= $this->include('partials/aside') ?>
            <div class="c-body">
                <main class="c-main fade-in">
                    <div class="container-fluid">
                        <?= $this->renderSection('content') ?>
                    </div>
                </main>
                <?= $this->include('partials/footer') ?>
            </div>
        </div>
        <!-- App JS (Do not remove) -->
        <script src="<?php echo base_url('/dist/js/commons.js'); ?>"></script>
        <script src="<?php echo base_url('/dist/js/dash.js'); ?>"></script>
    </body>
</html>