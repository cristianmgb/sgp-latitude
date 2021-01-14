<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <img src="<?php echo base_url('/dist/img/brand-full.png'); ?>" alt="Logo Lattitude"  class="c-sidebar-brand-full w-50 mx-auto">
        <img src="<?php echo base_url('/dist/img/brand-minimized.png'); ?>" alt="Logo Lattitude"  class="c-sidebar-brand-minimized">
    </div>
    <?= $this->include('partials/sidebar') ?>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>