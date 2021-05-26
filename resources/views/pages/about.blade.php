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
                <p>Our business was started with the goal of providing consumers throughout this beautifulregion a reliable and reputable medium that matches demand for services with reputable skilled professionals who are screened and vetted for the role they seek to preform for consumers. We seek to provide consumers peace of mind knowing the persons entrusted to perform specialised tasks at their homes or businesses are true professionals, entering with the sole intent of honorable executing their duties in a professional manner.</p>

                <p>Integral to our business is, highlighting the range and skills-set of our residents, through the marketing exposure we provide these qualified pre-screened professionals. In so doing we provide the general consuming public a medium that facilitate the matching of their need for repairs and the demands for skilled specialists with the supply of reputable pre-screened professionals from which to choose.</p>

                <p>With FIXIT-JA,users can view average project costs, find local pre-screened home professionals, and instantly book appointments online. <b>Our mission is to create a better connection between the right consumer and the right service professional. We want you to get your job done right!</b></p>

                <p>Operating in the Caribbean region we showcase the talents of independent professionals and match the right talents with the demands for their services.We also hold each side accountable to keep up their end of the arrangements. We are a truly customer centric organization, which hopefully is reflected through our processes and ease of use of our platform.</p>
                <h1>What differentiates FIXIT-JA</h1>
                <ol>
                <li>This platform is focussed on skilled self-employed individuals working as independent contractors (IC) who prefer the world of being independent entrepreneurs rather than people seeking full time employment with other businesses.</li>
                <li>We are committed to providing The ENTREPRENEURS (IC) listed on our platform exposure of their skills and expertise as we match the demand for their talent with the right consumers.</li>
                <li>We provide a reputable medium where needs and supply of services intersects.</li>
                <li>We find talented individuals nationwide and provide a launchpad for their talents to be noticed and made accessible based on demand for their specialities.</li>
                <li>We provide consumers a platform where they can make independent selections of individuals to fulfill their required tasks, assisted by online system to aid in the evaluation of these individuals.</li>
                <li>Our medium provides exposure of skilled worker to the consuming public demanding their services to fulfill contingency needs, requiring immediate attention.</li>
                <li>We are experts in what we do and want to share our expertise with businesses through providing among other benefits a strong online presence and marketing.</li>
                <li>We add value to all our relationships whether they result in a revenue stream or not.</li>
                <li>We are your dynamic partner blending digital distribution, process automation with talent acquisition strategy addressing your skills needs.</li>
                <li>We are your local partner with one priority, ensuring happy satisfied customers.</li>
                </ol>
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
