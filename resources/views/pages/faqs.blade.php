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
                    <a class="card-website-header collapsed" id="FAQHeadingFour" data-toggle="collapse" data-target="#FAQCollapseFour" aria-expanded="true" aria-controls="FAQCollapseFour" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Why use FixItJA?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseFour" aria-labelledby="FAQHeadingFour" data-parent="#FAQAccordian">
                        <div class="card-website-body">Convenience, Assurance of work assigned, Background checks on Professionals, several options fromwhich to choose, Convenient payment options.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingFive" data-toggle="collapse" data-target="#FAQCollapseFive" aria-expanded="true" aria-controls="FAQCollapseFive" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Is there a cost to register to FixItJA?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseFive" aria-labelledby="FAQHeadingFive" data-parent="#FAQAccordian">
                        <div class="card-website-body">Currently Professionals are allowed to register for free. Businesses and other consumers registration and listing projects are free on our platform.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingSix" data-toggle="collapse" data-target="#FAQCollapseSix" aria-expanded="true" aria-controls="FAQCollapseSix" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Why Businesses?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseSix" aria-labelledby="FAQHeadingSix" data-parent="#FAQAccordian">
                        <div class="card-website-body">Our goal is to cater our services to meet the needs of all consumers, “General Users”, “Businesses” and Trades Professionals. There are other services not suitable for “General Users” that will be added as options for businesses to subscribe for use in their operations.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingSeven" data-toggle="collapse" data-target="#FAQCollapseSeven" aria-expanded="true" aria-controls="FAQCollapseSeven" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">What are some dangers of hiring a trades professional without researching their background?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseSeven" aria-labelledby="FAQHeadingSeven" data-parent="#FAQAccordian">
                        <div class="card-website-body">
                            <ol>
                                <li>Some jobs example Electrical wiring and installations require a licensed electrician to certify the work before one can successfully apply for electrification of ones premises.  Several electrical trades personal are not licensed and therefore unable to certify jobs. The result is often waiting for months to have your premises electrified.</li>
                                <li>Some trades men pretend to have experience and performed work the have not. The result of hiring is often, poor workman ship in most cases and loss of money and other resources in other cases.</li>
                            </ol>
                            <b>Leave it to the professional team to do the vetting for you.</b>
                        </div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingEight" data-toggle="collapse" data-target="#FAQCollapseEight" aria-expanded="true" aria-controls="FAQCollapseEight" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">What does the commonly used terms represent?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseEight" aria-labelledby="FAQHeadingEight" data-parent="#FAQAccordian">
                        <div class="card-website-body">
                            <p><b>General User</b> is the term used to refer to people who are interested in having work done at their personal home or any other personal space or properties.</p>
                            <p><b>Fixician</b> is term used to describe trade professionals.</p>
                            <p><b>Business</b> is the term used to refer to organizations using FixItJA platform to access one or more services offered by FixItJA.</p>
                        </div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingNine" data-toggle="collapse" data-target="#FAQCollapseNine" aria-expanded="true" aria-controls="FAQCollapseNine" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Is there a cost to register on FixItJA platform?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseNine" aria-labelledby="FAQHeadingNine" data-parent="#FAQAccordian">
                        <div class="card-website-body">No, at the moment registering to our platform is free for all categories i.e. General Users, Businesses, Fixicians /Trade professionals.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingTen" data-toggle="collapse" data-target="#FAQCollapseTen" aria-expanded="true" aria-controls="FAQCollapseTen" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">What services can be requested through FixItJA?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseTen" aria-labelledby="FAQHeadingTen" data-parent="#FAQAccordian">
                        <div class="card-website-body">Any project requiring trades professionals to work on these projects can be listed.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingEleven" data-toggle="collapse" data-target="#FAQCollapseEleven" aria-expanded="true" aria-controls="FAQCollapseEleven" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">What if the categories section does not list the services required for my project?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseEleven" aria-labelledby="FAQHeadingEleven" data-parent="#FAQAccordian">
                        <div class="card-website-body">If required services are not currently listed, please provide us your project categoryand we will review and add to our list.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingTwelve" data-toggle="collapse" data-target="#FAQCollapseTwelve" aria-expanded="true" aria-controls="FAQCollapseTwelve" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Where can FixItJA service be accessed?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseTwelve" aria-labelledby="FAQHeadingTwelve" data-parent="#FAQAccordian">
                        <div class="card-website-body">The services can be accessed anywhere in Jamaica.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingThirteen" data-toggle="collapse" data-target="#FAQCollapseThirteen" aria-expanded="true" aria-controls="FAQCollapseThirteen" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Do I need to register to create a project?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseThirteen" aria-labelledby="FAQHeadingThirteen" data-parent="#FAQAccordian">
                        <div class="card-website-body">Businesses and General Users does not need to register to create a project request.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingFourteen" data-toggle="collapse" data-target="#FAQCollapseFourteen" aria-expanded="true" aria-controls="FAQCollapseFourteen" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">How can we contact FixItJA representative?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseFourteen" aria-labelledby="FAQHeadingFourteen" data-parent="#FAQAccordian">
                        <div class="card-website-body">Through phone or email: <a href='tel:+18765270157'>876-527-0157</a> or <a href='mailto:service@fixitja.com'>service@fixitja.com</a></div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingFifteen" data-toggle="collapse" data-target="#FAQCollapseFifteen" aria-expanded="true" aria-controls="FAQCollapseFifteen" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Who can sign up as a Fixician?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseFifteen" aria-labelledby="FAQHeadingFifteen" data-parent="#FAQAccordian">
                        <div class="card-website-body">Any skilled experienced professional seeking to have their skills marketed to consumers island wide.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingSixteen" data-toggle="collapse" data-target="#FAQCollapseSixteen" aria-expanded="true" aria-controls="FAQCollapseSixteen" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Do I need to choose from professionals / Fixicians listed in my area to work on my project?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseSixteen" aria-labelledby="FAQHeadingSixteen" data-parent="#FAQAccordian">
                        <div class="card-website-body">No, you can request other referrals from FixItJA to work your project, if you choosenot to select from those presented.</div>
                    </div>
                </div>
                <div class="card-website accordion-faq-item mt-4">
                    <a class="card-website-header collapsed" id="FAQHeadingSeventeen" data-toggle="collapse" data-target="#FAQCollapseSeventeen" aria-expanded="true" aria-controls="FAQCollapseSeventeen" href="javascript:void(0);">
                        <div class="accordion-faq-item-heading">Is there an age limit to sign up as a Fixician?<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down accordion-faq-item-heading-arrow">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></div>
                    </a>
                    <div class="collapse" id="FAQCollapseSeventeen" aria-labelledby="FAQHeadingSeventeen" data-parent="#FAQAccordian">
                        <div class="card-website-body">With the exception of minors, there is no limitations on who can sign up based on age, sex or religion.</div>
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
