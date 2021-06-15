@extends('layouts.app')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="page-header-content pt-website-10">
        <div class="container-website text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="page-header-title mb-3">{{ $page_title }}</h1>
                    <p class="page-header-text">{{ $page_description }}</p>
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
            <div class="col-lg-10 text-justify">
                <p><b>FixitJA</b>’s platform facilitates business transactions between consumers and professionals in different trade sectors. We continue to add to the list of professionals available to provide extended services to the consuming public. However, If you are a professional with a trade not listed on the website, please registerto our platform and add your trade for review and consideration. Likewise, if you are a consumer in need of a specialised task that requires a special skill set not yet represented on this platform, please make a request to us and we will have it added.</p>
                <div class="card-website bg-light shadow-none">
                    <div class="card-website-body">
                        <h6>Here are some of the services listed below that we currently offer</h6>
                        <ul class="mb-0">
                            <li class="text-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit?</li>
                        </ul>
                    </div>
                </div>
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
