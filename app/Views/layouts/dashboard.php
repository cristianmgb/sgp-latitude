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