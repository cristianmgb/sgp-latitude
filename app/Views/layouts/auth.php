<!doctype html>
<html lang="es" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$this->renderSection('title')?></title>
        <!--  App CSS (Do not remove) -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/dist/css/app.css'); ?>">
    </head>
    <body class="c-app flex-row align-items-center">
        <main role="main" class="container" id="app">
            <!-- Contenido y carga dinámica de las vistas -->
            <?=$this->renderSection('content')?>
        </main>
        <!-- App JS (Do not remove) -->
        <script src="<?php echo base_url('/dist/js/commons.js'); ?>"></script>
        <script src="<?php echo base_url('/dist/js/app.js'); ?>"></script>
    </body>
</html>