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
            <div class="col-lg-10 py-3 text-justify">
                <p>FIXIT-JA uses an extensive screening process to screen businesses and business owners/principals. We perform screening when a business applies to join our network and, if the business is accepted, whenever concerns are brought to our attention, we assure you it will be investigated and where necessary action taken to remedy your concerns. We welcome your feedback on all the pros in our network as we are accountable to you our customers. if any member associated with our organization doesn't meet the agreed operational standards and fulfill our commitments to our customers, please <a href="{{ route('contactUs') }}">contact us</a> so we can investigate. We're committed to maintaining a network of trusted home service business partners, and those who don't meet our criteria will be rejected or promptly removed from our network.</p>
                <p>We require all users - pros and homeowners - alike to uphold our core values as outlined in our Code of Conduct.</p>
                <p>Please see FIXIT-JA <a href="{{ route('termsandconditions') }}">Terms and Conditions</a> for more detailed information on our pro requirements, screening processes, and disclaimers.</p>
                <ul>
                <li><b>CRIMINAL BACKGROUND CHECKS</b>: We conduct background checks on the principal of each registered organization that is involved with our organization. This includes a review of criminal convictions and for sex offences.</li>
                <li>We verify certifications and require individuals and businesses to attest they do have the relevant licensing to practice their trades.</li>
                <li><b>RATINGS</b>: Service professionals receive ratingsfrom fixit-JAthrough CUSTOMERS. Once apro is rated, we require them to maintain an overall average of 3 stars or greater.</li>
                </ul>
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
