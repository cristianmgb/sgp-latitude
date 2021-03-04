<div class="c-sidebar c-sidebar-fixed c-sidebar-lg-show c-sidebar-minimized" id="sidebar">
    <div class="c-sidebar-brand bg-white d-lg-down-none">
		<img src="{{ asset('img/brand-full.png') }}" alt="Logo Lattitude" class="c-sidebar-brand-full w-50 mx-auto">
        <img src="{{ asset('img/brand-minimized.png') }}" alt="Logo Lattitude" class="c-sidebar-brand-minimized w-50 mx-auto">
    </div>
    @include('partials.sidebar')
    <button class="c-sidebar-minimizer c-class-toggler"
    	type="button" data-target="_parent"
     	data-class="c-sidebar-minimized"
    ></button>
</div>