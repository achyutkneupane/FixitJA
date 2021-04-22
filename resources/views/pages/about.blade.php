@extends('layouts.app')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="page-header-content pt-website-10">
        <div class="container-website text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="page-header-title mb-3">{{ $content->title }}</h1>
                    <p class="page-header-text">{{ $content->sub_title }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
        </svg>
    </div>
</header>
<section class="bg-white py-website-10">
    <div class="container-website">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                {!! $content->content !!}
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-light">
        <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
        </svg>
    </div>
</section>
@endsection
