    @php
        if(!isset($meta_page_type)){
            $meta_page_type = 'website';
        }
    @endphp

    @switch($meta_page_type)
        @case('website')
            <meta property="og:type" content="website" />
            @break

        @case('article')
            {{-- Facebook Meta --}}
            <meta property="og:type" content="article" />
            <meta property="article:published_time" content="" />
            <meta property="article:modified_time" content="" />
            <meta property="article:author" content="" />
            <meta property="article:section" content="" />
            {{-- @foreach ($$module_name_singular->tags as $tag)
                <meta property="article:tag" content="{{$tag->name}}" />
            @endforeach --}}
            @break

        @case('profile')
            <meta property="og:type" content="profile" />
            <meta property="profile:first_name" content="" />
            <meta property="profile:last_name" content="" />
            <meta property="profile:username" content="" />
            <meta property="profile:gender" content="" />
            @break

        @default
    @endswitch

    <!-- Facebook Meta -->
    <meta property="og:url" content="{{url()->full()}}" />
    <meta property="og:title" content="@yield('title') | {{ config('app.name') }}" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <!-- Twitter Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="">
    <meta name="twitter:url" content="{{url()->full()}}" />
    <meta name="twitter:creator" content="">
    <meta name="twitter:title" content="@yield('title') | {{ config('app.name') }}">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <!--canonical link-->
    <link type="text/plain" rel="author" href="" />
    <link rel="canonical" href="">