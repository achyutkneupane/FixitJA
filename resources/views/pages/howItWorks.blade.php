@extends('layouts.app')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="page-header-content pt-website-10">
        <div class="container-website text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="page-header-title mb-3">How It Works</h1>
                    <p class="page-header-text">Description about how FixitJA works</p>
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
<section class="bg-white py-website-10 text-justify">
    <div class="container-website">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <p class="mb-0">
                    FixItJA platform solves the common problems of both service provider and service seeker. Which is, the matching of consumers' demand for reliable and trustworthy service professionals with experienced experts that fits the bill.
                </p>
                <hr class="my-5">
                <h4 class="mb-4">
                    <div class="icon-stack bg-primary text-white mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg></div>
                    Options for FixItJA users
                </h4>
                <ol>
                    <li>Create an Account/Profile</li>
                    <li>Place a Project (available to “General Users” and “Businesses”)</li>
                </ol>
                <hr class="my-5">
                <h4 class="mb-4">
                    <div class="icon-stack bg-primary text-white mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg></div>
                    Creating Profile Account on FixItJA
                </h4>
                <ul>
                    <li>First select your category from the options(General User, Business, Fixician).</li>
                    <li>Follow steps to create your user account.</li>
                    <li>After creating your account, you will be redirected to the dashboard.</li>
                    <li>Go to profile, under Account & Privacy section select edit.</li>
                    <li>Fill all fields, some are mandatory, provide details including profile picture and save.</li>
                    <li>Congratulations, your profile is now ready to impress.</li>
                </ul>
                <hr class="my-5">
                <div class="fluid-container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="card-title text-center">General User & Business Submission Process</h3>
                            <div class="card-text row">
                                <div class="col-md-5 my-auto">
                                    <div class="list-group" id="list-generalUser" role="generalUser">
                                        <a class="d-flex flex-md-row flex-row-reverse justify-content-end my-4 active" id="list-generalUser-step1-list" data-toggle="list" href="#list-generalUser-step1" role="tab" aria-controls="step1-generalUser">
                                            <div class="ml-4 ml-md-0 mr-0 mr-md-4 my-auto selectText">Share your project with FixItJA</div>
                                            <div class="px-4 py-4 mr-4 mr-md-0 ml-0 ml-md-4 rounded-circle text-center numberRounded">1</div>
                                        </a>
                                        <a class="d-flex flex-md-row flex-row-reverse justify-content-end my-4" id="list-generalUser-step2-list" data-toggle="list" href="#list-generalUser-step2" role="tab" aria-controls="step2-generalUser">
                                            <div class="ml-4 ml-md-0 mr-0 mr-md-4 my-auto selectText">Get Matched To Qualified Fixicians</div>
                                            <div class="px-4 py-4 mr-4 mr-md-0 ml-0 ml-md-4 rounded-circle text-center numberRounded">2</div>
                                        </a>
                                        <a class="d-flex flex-md-row flex-row-reverse justify-content-end my-4" id="list-generalUser-step3-list" data-toggle="list" href="#list-generalUser-step3" role="tab" aria-controls="step3-generalUser">
                                            <div class="ml-4 ml-md-0 mr-0 mr-md-4 my-auto selectText">Get Connected</div>
                                            <div class="px-4 py-4 mr-4 mr-md-0 ml-0 ml-md-4 rounded-circle text-center numberRounded">3</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 my-auto">
                                    <div class="tab-content" id="nav-generalUser">
                                        <div class="col-12 tab-pane fade w-100 show active" id="list-generalUser-step1" role="tabpanel" aria-labelledby="list-generalUser-step1-list">
                                            <ol>
                                                <li class="my-1">Select General User or Business.</li>
                                                <li class="my-1">Select “Create Project”.</li>
                                                <li class="my-1">Share your Project with us by completing project form.</li>
                                                <li class="my-1">Fill in all required fields including, Project type, tasks details, work location.</li>
                                                <li class="my-1">Review information entered and submit .</li>
                                                <li class="my-1">Agree to Terms & Conditions.</li>
                                                <li class="my-1">Congratulations your project is now submitted for matching with a professional.</li>
                                                <li class="my-1">You will receive an email from FixItJA acknowledging your request and updates.</li>
                                            </ol>
                                        </div>
                                        <div class="col-12 tab-pane fade w-100" id="list-generalUser-step2" role="tabpanel" aria-labelledby="list-generalUser-step2-list">
                                            <ol>
                                                <li class="my-1">Select Fixician from list shown based on your project request or request referral.</li>
                                                <li class="my-1">Review Fixician profile including ratings.</li>
                                                <li class="my-1">Place request to be matched to selected Fixician.</li>
                                                <li class="my-1">You are free to ask for referrals to other professionals not shown on your screen.</li>
                                            </ol>
                                        </div>
                                        <div class="col-12 tab-pane fade w-100" id="list-generalUser-step3" role="tabpanel" aria-labelledby="list-generalUser-step3-list">
                                            <ol>
                                                <li class="my-1">Get introduced to choosed Fixician.</li>
                                                <li class="my-1">Connect with Fixician to facilitate further work collaboration.</li>
                                                <li class="my-1">Enjoy a different business process, Get blown away.</li>
                                                <li class="my-1">Provide review of worker who executed your project.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-5">
                <div class="fluid-container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="card-title text-center">Fixician Process</h3>
                            <div class="card-text row">
                                <div class="col-md-5 my-auto">
                                    <div class="list-group" id="list-fixicianProcess" role="fixicianProcess">
                                        <a class="d-flex flex-md-row flex-row-reverse justify-content-end my-4 active" id="list-fixicianProcess-step1-list" data-toggle="list" href="#list-fixicianProcess-step1" role="tab" aria-controls="step1-fixicianProcess">
                                            <div class="ml-4 ml-md-0 mr-0 mr-md-4 my-auto selectText">Share Profile with Us</div>
                                            <div class="px-4 py-4 mr-4 mr-md-0 ml-0 ml-md-4 rounded-circle text-center numberRounded">1</div>
                                        </a>
                                        <a class="d-flex flex-md-row flex-row-reverse justify-content-end my-4" id="list-fixicianProcess-step2-list" data-toggle="list" href="#list-fixicianProcess-step2" role="tab" aria-controls="step2-fixicianProcess">
                                            <div class="ml-4 ml-md-0 mr-0 mr-md-4 my-auto selectText">Get Matched With Qualified Leads</div>
                                            <div class="px-4 py-4 mr-4 mr-md-0 ml-0 ml-md-4 rounded-circle text-center numberRounded">2</div>
                                        </a>
                                        <a class="d-flex flex-md-row flex-row-reverse justify-content-end my-4" id="list-fixicianProcess-step3-list" data-toggle="list" href="#list-fixicianProcess-step3" role="tab" aria-controls="step3-fixicianProcess">
                                            <div class="ml-4 ml-md-0 mr-0 mr-md-4 my-auto selectText">Start Earning</div>
                                            <div class="px-4 py-4 mr-4 mr-md-0 ml-0 ml-md-4 rounded-circle text-center numberRounded">3</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 my-auto">
                                    <div class="tab-content" id="nav-fixicianProcess">
                                        <div class="col-12 tab-pane fade w-100 show active" id="list-fixicianProcess-step1" role="tabpanel" aria-labelledby="list-fixicianProcess-step1-list">
                                            <ol>
                                                <li class="my-1">Select <b>Become a Fixician</b>.</li>
                                                <li class="my-1">Create Account.</li>
                                                <li class="my-1">Complete Form<br><i># Select SKILLED WORKER</i></li>
                                                <li class="my-1">Verify Your Email<br><i># Access email sent to you from FixItJA and verify</i></li>
                                                <li class="my-1">Complete application ensure to include all required information.</li>
                                            </ol>
                                        </div>
                                        <div class="col-12 tab-pane fade w-100" id="list-fixicianProcess-step2" role="tabpanel" aria-labelledby="list-fixicianProcess-step2-list">
                                            <ol>
                                                <li class="my-1">Get your profile promoted to consumers islandwide.</li>
                                                <li class="my-1">Benefit from exposure being listed on FixitJA.</li>
                                                <li class="my-1">Enjoy goodwill from our process and branding.</li>
                                            </ol>
                                        </div>
                                        <div class="col-12 tab-pane fade w-100" id="list-fixicianProcess-step3" role="tabpanel" aria-labelledby="list-fixicianProcess-step3-list">
                                            <ol>
                                                <li class="my-1">Get connected with clients with immediate demand for your service</li>
                                                <li class="my-1">Get busy</li>
                                                <li class="my-1">Get recommended</li>
                                                <li class="my-1">Get Reviewed</li>
                                                <li class="my-1">Get your business going</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-5">
                <div class="fluid-container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="card-title text-center">Fixician Enroll Steps</h3>
                            <div class="card-text row">
                                <div class="col-12 py-4 d-flex flex-column">
                                    <div class="row">
                                        <div class='col-4 text-left'>
                                            <button type="button" id="prevButton" class="btn btn-outline-success"><i class="ki ki-bold-double-arrow-back mr-2"></i> Previous</button>
                                        </div>
                                        <div class='col-4 text-center my-auto' id="stepText"></div>
                                        <div class='col-4 text-right'>
                                            <button type="button" id="nextButton" class="btn btn-outline-success">Next <i class="ki ki-bold-double-arrow-next ml-2"></i></button>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row py-3">
                                        <div class="tab-content row d-flex flex-fill" id="nav-tabContent">
                                            <div class="col-12 tab-pane fade w-100 text-center show active">
                                                <h4>
                                                    Go to <a href='{{ asset('/') }}'>Home Page</a> and click on “<b>Become Our Fixician</b>” and create an account if you don’t have one.
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-1.png') }}' alt='FixitJA' class='w-75 img-thumbnail' data-toggle="modal" data-target="#step1Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step1Modal" tabindex="-1" role="dialog" aria-labelledby="step1ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-1.png') }}' alt='FixitJA' class='w-100'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    Fill the following form.<br>
                                                    <i>Select “<b>Skilled Worker</b>” in the “<b>Registration Type</b>” section</i>
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-2.png') }}' alt='FixitJA' class='w-50 img-thumbnail' data-toggle="modal" data-target="#step2Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step2Modal" tabindex="-1" role="dialog" aria-labelledby="step2ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-2.png') }}' alt='FixitJA' class='w-75'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    Check your email and click on "<b>Verify Your Email</b>" to activate your account.
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-3.png') }}' alt='FixitJA' class='w-50 img-thumbnail' data-toggle="modal" data-target="#step3Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step3Modal" tabindex="-1" role="dialog" aria-labelledby="step3ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-3.png') }}' alt='FixitJA' class='w-75'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    You will be redirected to Dashboard after logging in.<br>
                                                    Be a verified Skilled Worker by clicking on "<b>Complete Your Application</b>" from your dashboard.
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-4.png') }}' alt='FixitJA' class='w-75 img-thumbnail' data-toggle="modal" data-target="#step4Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step4Modal" tabindex="-1" role="dialog" aria-labelledby="step4ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-4.png') }}' alt='FixitJA' class='w-100'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    Enter your professional skills in this form.<br>
                                                    You can select upto 3 categories of skills.
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-5.png') }}' alt='FixitJA' class='w-75 w-md-50 img-thumbnail' data-toggle="modal" data-target="#step5Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step5Modal" tabindex="-1" role="dialog" aria-labelledby="step5ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-5.png') }}' alt='FixitJA' class='w-75'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    Upload certificate for each selected skill and list years of experience.<br>
                                                    <i>
                                                        The certificate must be in the PDF, DOC, JPEG or PNG format.<br>
                                                        The work-experience is compulsary and certificate is optional.
                                                    </i>
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-6.png') }}' alt='FixitJA' class='w-75 w-md-50 img-thumbnail' data-toggle="modal" data-target="#step6Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step6Modal" tabindex="-1" role="dialog" aria-labelledby="step6ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-6.png') }}' alt='FixitJA' class='w-75'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    Enter your education background in this form.<br>
                                                    <i>
                                                        Date fields are optional.
                                                    </i>
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-7.png') }}' alt='FixitJA' class='w-75 w-md-50 img-thumbnail' data-toggle="modal" data-target="#step7Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step7Modal" tabindex="-1" role="dialog" aria-labelledby="step7ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-7.png') }}' alt='FixitJA' class='w-75'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    Enter references for each selected skill.<br>
                                                    <i>
                                                        Email field is optional.
                                                    </i>
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-8.png') }}' alt='FixitJA' class='w-75 w-md-50 img-thumbnail' data-toggle="modal" data-target="#step8Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step8Modal" tabindex="-1" role="dialog" aria-labelledby="step8ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-8.png') }}' alt='FixitJA' class='w-75'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    Enter your brief details in this form.<br>
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-9.png') }}' alt='FixitJA' class='w-75 w-md-50 img-thumbnail' data-toggle="modal" data-target="#step9Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step9Modal" tabindex="-1" role="dialog" aria-labelledby="step9ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-9.png') }}' alt='FixitJA' class='w-75'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    Upload an image for your profile picture.
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-10.png') }}' alt='FixitJA' class='w-25 w-md-100 img-thumbnail' data-toggle="modal" data-target="#step10Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step10Modal" tabindex="-1" role="dialog" aria-labelledby="step10ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-10.png') }}' alt='FixitJA' class='w-50'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    Enter your detailed address.<br>
                                                    <i>
                                                        <b>Street Address 2</b> and <b>Postal Code</b> fields are optional.
                                                    </i>
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('images/how-it-works/step-11.png') }}' alt='FixitJA' class='w-75 w-md-50 img-thumbnail' data-toggle="modal" data-target="#step11Modal" role="button"><br>
                                                    <i>Click to Enlarge</i>
                                                </div>
                                                <div class="modal fade" id="step11Modal" tabindex="-1" role="dialog" aria-labelledby="step11ModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body w-100">
                                                                <img src='{{ asset('images/how-it-works/step-11.png') }}' alt='FixitJA' class='w-75'><br>
                                                            </div>
                                                            <div class="modal-footer d-flex flex-row justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 tab-pane fade w-100 text-center">
                                                <h4>
                                                    You have successfully submitted your application in FixitJA.<br>
                                                    Wait for our team to review your profile and approve your status.<br>
                                                    Thank-you for your patience.<br>
                                                    {{ config('app.name') }}
                                                </h4>
                                                <div class="w-100 h-auto mt-5">
                                                    <img src='{{ asset('/') }}images/logo.png' alt='FixitJA' class='w-75'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
@section('styles')
    <style>
        div.list-group a div.numberRounded {
            background-color: #e3e3e3;
            color: #000000;
            font-weight: bolder;
        }
        div.list-group a.active div.numberRounded {
            background-color: #C9F7F5;
            color: #7c7c7c;
            font-weight: bolder;
        }
        div.list-group a div.selectText {
            color: #7c7c7c;
            font-weight: bolder;
        }
        div.list-group a.active div.selectText {
            color: #000000;
            font-weight: bolder;
        }
    </style>
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script>
        buttonManip();
        $("#prevButton").on("click", function (e) {
            e.preventDefault();
            var index = $("#nav-tabContent div.active").index() + 1;
            var position = index - 1;
            manip(index, position);
        });
        $("#nextButton").on("click", function (e) {
            e.preventDefault();
            var index = $("#nav-tabContent div.active").index() + 1;
            var position = index + 1;
            manip(index, position);
        });
        function manip(index, position) {
            $("#nav-tabContent div:nth-child(" + index + ")").removeClass(
                "show active"
            );
            $("#nav-tabContent div:nth-child(" + position + ")").addClass(
                "show active"
            );
            buttonManip();
        }
        function buttonManip() {
            var index = $("#nav-tabContent div.active").index()+1;
            var total = $("#nav-tabContent").children().length;
            if (index == 1) {
                $("#prevButton").hide();
            } else {
                $("#prevButton").show();
            }
            if (index == total) {
                $("#nextButton").hide();
            } else {
                $("#nextButton").show();
            }
            $('div#stepText').text('Step '+index+' of '+total);
        }
    </script>
@endsection
