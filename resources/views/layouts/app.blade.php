<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="5vNFZJlx-U06x1mqVJskNMGK2FtW1EtHv2owoub6S5Q" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Title Section --}}
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="title" content="{{ config('app.name') }} | @yield('title', $page_title ?? '')" />
    <meta name="description" content="@yield('page_description', $page_description ?? '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}
    {{-- Global Theme Styles (used by all pages) --}}
    @foreach (config('layout.resources.css') as $style)
    <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css" />
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
    <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css" />
    @endforeach

    {{-- Includable CSS --}}
    @yield('styles')

    {{-- Website template styles --}}
    @if (isset($show_sidebar) && !$show_sidebar)
    <link href="{{ asset('css/website/styles.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @endif
    
    <link href="{{ asset('css/custom/custom-css.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet"> -->
</head>

<body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

    @if (isset($show_sidebar) && !$show_sidebar)
    @if (isset($show_navbar) && $show_navbar)
    @include('layouts.partials._navbar')
    @yield('content')
    @include('layouts.partials.extras._scrolltop')
    @include('layouts.partials._footer')
    @else
    @yield('content')
    @endif
    @else
    @guest
    @if (isset($show_navbar) && $show_navbar)
    @include('layouts.partials._navbar')
    @yield('content')
    @include('layouts.partials.extras._scrolltop')
    @include('layouts.partials._footer')
    @else
    @yield('content')
    @endif
    @endguest
    @auth
    @if (config('layout.page-loader.type') != '')
    @include('layouts.partials._page-loader')
    @endif
    @include('layouts.base._layout')
    @endauth
    @endif

    <script>
        var HOST_URL = "{{ route('quick-search') }}";
    </script>

    {{-- Global Config (global config for global JS scripts) --}}
    <script>
        var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!};
    </script>

    {{-- Global Theme JS Bundle (used by all pages) --}}
    @foreach (config('layout.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach
    {{-- Includable JS --}}
    @yield('scripts')
    {{-- Website Templates Scripts --}}
    @if (isset($show_sidebar) && !$show_sidebar)
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/website/scripts.js') }}" type="text/javascript"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            disable: 'mobile',
            duration: 600,
            once: true,
        });
    </script>
    @endif

    {{-- Toastr Controller --}}
    {{-- Author: Achyut Neupane --}}

    @if (session()->has('toast'))
    <script>
        toastr.{{ session('toast')['class'] }}("{{ session('toast')['message'] }}");
    </script>
    @endif
    <script>
        var aside = document.getElementById('kt_aside');
        if (JSON.stringify(aside) != "null") {
            var el = document.getElementById('kt_profile_aside');
            var toggler = document.getElementById('kt_subheader_mobile_toggle');
            if (JSON.stringify(el) != "null") {
                toggler.innerHTML = "<span></span>";
            } else {
                toggler.innerHTML = "";
            }
        }
    </script>
</body>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3QFKBQFZG6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3QFKBQFZG6');
</script>
</html>
