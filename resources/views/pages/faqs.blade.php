@extends('layouts.app')
@section('content')
<main>
    <!-- Page Header-->
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
        <div class="svg-border-rounded text-light">
            <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </header>
    <section class="bg-light py-website-10">
        <div class="container-website">
            <div class="accordion accordion-faq mb-5 text-justify" id="FAQAccordian">
                <div class="card-website accordion-faq-item mb-4">
                    <a class="card-website-header" id="FAQHeadingOne" data-toggle="collapse" data-target="#FAQCollapseOne" aria-expanded="true" aria-controls="FAQCollapseOne" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Who should use FixitJA?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse show" id="FAQCollapseOne" aria-labelledby="FAQHeadingOne" data-parent="#FAQAccordian">
                        <div class="card-website-body">Anyone who need the services of a professional for repairs or new constructions.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item my-4">
                    <a class="card-website-header collapsed" id="FAQHeadingTwo" data-toggle="collapse" data-target="#FAQCollapseTwo" aria-expanded="true" aria-controls="FAQCollapseTwo" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Are we able to see the cost of labour online?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseTwo" aria-labelledby="FAQHeadingTwo" data-parent="#FAQAccordian">
                        <div class="card-website-body">There are some Professionals who choose to have their hourly charges listed on the platform. There are other jobs that first requires assessments of the tasks before cost of the job can be determined.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingThree" data-toggle="collapse" data-target="#FAQCollapseThree" aria-expanded="true" aria-controls="FAQCollapseThree" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">How does it work?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseThree" aria-labelledby="FAQHeadingThree" data-parent="#FAQAccordian">
                        <div class="card-website-body">Consumers needing a repair job done merely log onto the platform review the professionals’ profile, see which one fits their work requirements and submit their project to commence discussion.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingFour" data-toggle="collapse" data-target="#FAQCollapseFour" aria-expanded="true" aria-controls="FAQCollapseThree" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Why use FixItJA?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseFour" aria-labelledby="FAQHeadingFour" data-parent="#FAQAccordian">
                        <div class="card-website-body">Convenience, Assurance of work assigned, Background checks on Professionals, several options fromwhich to choose, Convenient payment options.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingFive" data-toggle="collapse" data-target="#FAQCollapseFive" aria-expanded="true" aria-controls="FAQCollapseThree" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Is there a cost to register to FixItJA?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseFive" aria-labelledby="FAQHeadingFive" data-parent="#FAQAccordian">
                        <div class="card-website-body">Currently Professionals are allowed to register for free. Businesses and other consumers registration and listing projects are free on our platform.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingSix" data-toggle="collapse" data-target="#FAQCollapseSix" aria-expanded="true" aria-controls="FAQCollapseThree" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Why Businesses?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseSix" aria-labelledby="FAQHeadingSix" data-parent="#FAQAccordian">
                        <div class="card-website-body">Our goal is to cater our services to meet the needs of all consumers, “General Users”, “Businesses” and Trades Professionals. There are other services not suitable for “General Users” that will be added as options for businesses to subscribe for use in their operations.</div>
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
</main>
@endsection
