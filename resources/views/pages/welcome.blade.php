@extends('layouts.app')
@section('content')

<!-- Page Header-->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary">
    <div class="page-header-content pt-website-10">
        <div class="container-website">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="row align-items-center">
                        <h1 class="page-header-title">Find Best Fixician to Work On Any Project</h1>
                        <p class="page-header-text mb-5">Trusted local pros (Fixician) available to address your home or business projects – Simple Click, create project and be impressed.</p>
                    </div>
                    <form action="{{ route('categoryRequest') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-9" style="padding: 0;">
                                <select class="form-control-website kt-select2 select2" id="kt_select2_1" name="catId">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ ucwords($category->name) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-3 text-right">
                                <button class="btn-website btn-website-teal font-weight-500 mr-2">Go</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 d-none d-lg-block" data-aos="fade-up" data-aos-delay="100"><img class="img-fluid" src="{{asset('images/website/mainbg.svg')}}" /></div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" />
        </svg>
    </div>
</header>
<section class="bg-white py-website-10">
    <div class="container-website">
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Tiles Widget 25-->
                <div class="card-website card-website-custom bgi-no-repeat bgi-size-cover gutter-b bg-primary" style="background-image: url({{asset('images/website/repairman1.svg')}})">
                    <div class="card-website-body d-flex-website">
                        <div class="d-flex-website flex-column-website align-items-start flex-grow-1">
                            <div class="flex-grow-1">
                                <a href="#" class="text-white font-weight-bolder font-size-h3">How FixitJA works?</a>
                                <p class="text-white opacity-75 font-weight-bold mt-3 custom-paragraph custom-paragraph-width-80">
                                    The focus of this site is on the skilled self-employed individuals working as independent contractors (IC) who prefer the world of being independent entrepreneurs rather than people seeking full time employment with other businesses.
                            </div>
                            <a href="#" class="btn btn-link btn-link-white font-weight-bold">Read More
                                <span class="svg-icon svg-icon-lg svg-icon-white">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span></a>
                        </div>
                    </div>
                </div>
                <!--end::Tiles Widget 25-->
            </div>
        </div>
        <div class="row justify-content-center text-center mb-2">
            <div class="col-lg-8 py-website-5" style="box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);">
                <a class="btn-website btn-website-teal font-weight-500 mb-3" href="/project/create">Get Started Now!</a>
                <h2 class="text-black">No need to create an account to place your project</h2>
                <p class="lead text-black-50">
                    We have made it very easy to place your project in our FixitJA system.
                    Enter your information and within few steps you are ready to submit your request.
                    We will contact you once your request is submitted for further process.
                </p>
            </div>
        </div>
        <div class="row justify-content-center text-center py-website-5">
            <div class="badge badge-transparent-dark badge-pill badge-marketing text-white">OR</div>
        </div>
        <div class="p-5" style="box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);">
            <div class="row justify-content-center text-center mb-2">
                <div class="col-lg-8 mb-3">
                    <a class="btn-website btn-website-teal font-weight-500 mb-3" href="/register">Create An Account</a>
                    <h2 class="text-black">For more convinience in your project</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="file-plus"></i></div>
                    <h3>Place a project</h3>
                    <p class="mb-0">
                        Placing your project is very easy and can be accoplished in few steps.
                        All your have to give is your project information.
                    </p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="list"></i></div>
                    <h3>Track your project</h3>
                    <p class="mb-0">
                        Once your are sighned up with us, all of your project can be tracked and status can be viewed in the dashboard.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="edit"></i></div>
                    <h3>Review our services</h3>
                    <p class="mb-0">
                        Your review & feedback is very important for us to improve and to make our system more better in future.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-light">
        <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" />
        </svg>
    </div>
</section>
<section class="bg-light">
    <div class="pt-website-10 py-website-10">
        <div class="container-website" style="box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);">
            <div class="row">
                <h1 class="font-weight-bolder text-uppercase m-auto py-website-5">Our Top Reviewed Fixicians</h1>
            </div>
            @include('layouts.partials._team-members')
        </div>
    </div>
    <div class="svg-border-rounded text-dark">
        <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" />
        </svg>
    </div>
</section>
<section class="bg-dark py-website-10">
    <div class="container-website">
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Tiles Widget 25-->
                <div class="card-website card-website-custom bgi-no-repeat bgi-size-cover gutter-b" style="background-color:#663259; background-image: url({{asset('media/svg/patterns/taieri.svg')}})">
                    <div class="card-website-body d-flex-website">
                        <div class="d-flex-website flex-column-website align-items-start flex-grow-1">
                            <div class="flex-grow-1">
                                <a href="#" class="text-white font-weight-bolder font-size-h3">What is our hiring process?</a>
                                <p class="text-white opacity-75 font-weight-bold mt-3 custom-paragraph-width-60">
                                    FixitJA uses an extensive screening process to screen skilled workers. We perform screening when a skilled worker applies to join our network and, if they are accepted, whenever concerns are brought to our attention, we assure you it will be investigated and where necessary action taken to remedy your concerns.
                                </p>
                            </div>
                            <a href="#" class="btn btn-link btn-link-white font-weight-bold">Read More
                                <span class="svg-icon svg-icon-lg svg-icon-white">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span></a>
                        </div>
                    </div>
                </div>
                <!--end::Tiles Widget 25-->
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <a class="btn-website btn-website-teal font-weight-500 mb-3" href="/register">Become Our Fixician</a>
                <h2 class="text-white">Use your skills and earn money</h2>
                <p class="lead text-white-50 mb-5">
                    Enter information about you and your skills in very easily guided steps and start taking projects.
                </p>
            </div>
        </div>
        <div class="row my-10">
            <div class="col-lg-3 mb-5">
                <div class="text-center float-lg-left">
                    <div class="text-white mb-3">
                        <i class="flaticon2-user-1 icon-3x">
                        </i>
                    </div>
                    <div class="ml-4">
                        <h5 class="text-white">Create your account</h5>
                        <!-- <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
                    </div>
                </div>
                <span class="svg-icon svg-icon-xl float-right mt-5">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                            </path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </div>
            <div class="col-lg-3 mb-5">
                <div class="text-center float-lg-left">
                    <div class="text-white mb-3"><i class="flaticon-folder-1 icon-3x"></i></div>
                    <div class="ml-4">
                        <h5 class="text-white">Submit Your Application</h5>
                        <!-- <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> -->
                    </div>
                </div>
                <span class="svg-icon svg-icon-xl float-right mt-5">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                            </path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </div>
            <div class="col-lg-3 mb-5">
                <div class="text-center float-lg-left">
                    <div class="text-white mb-3"><i class="flaticon-list-1 icon-3x"></i></div>
                    <div class="ml-4">
                        <h5 class="text-white">Background Check</h5>
                        <!-- <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> -->
                    </div>
                </div>
                <span class="svg-icon svg-icon-xl float-right mt-5">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                            </path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </div>
            <div class="col-lg-3 mb-5">
                <div class="text-center float-lg-left">
                    <div class="text-white mb-3"><i class="flaticon-coins icon-3x"></i></div>
                    <div class="ml-4">
                        <h5 class="text-white">Start Earning</h5>
                        <!-- <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="svg-border-rounded text-white">
        <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" />
        </svg>
    </div>
</section>
<!-- testimonial -->
<section class="bg-white pt-website-10">
    <div class="container-website">
        <div class="row">
            <div class="col-lg-12 mb-lg-n10 mb-5 mb-lg-0 z-1">
                <a class="card-website text-decoration-none h-100 lift" href="https://cumbv.com" target="_blank">
                    <div class="card-website-body py-website-5">
                        <div class="testimonial p-lg-5">
                            <div class="testimonial-brand text-gray-400">
                                <img src="{{asset('images/cumbv-logo.png')}}" width="200px">
                            </div>
                            <p class="testimonial-quote text-primary">&quot;We are pleased to have a partnership with FixijJA and their dedication to create a new oppurtunity to skilled workers and also for the public to easily accomplish their work.&quot;</p>
                            <div class="testimonial-name">Claude Powell</div>
                            <div class="testimonial-position">Business Development Manager</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- <div class="col-lg-6 mb-lg-n10 z-1">
                <a class="card-website text-decoration-none h-100 lift" href="#!">
                    <div class="card-website-body py-website-5">
                        <div class="testimonial p-lg-5">
                            <div class="testimonial-brand text-gray-400">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2500 705.92">
                                    <title>instagram</title>
                                    <path d="M143.25,0c-22.87,0-52.51,24.24-70,40.38C34.82,74.55,0,137.29,0,187.65c0,71.56,60.86,98.57,76.25,98.57,5.08,0,9.4-2.62,9.4-9.51,0-5.39-3.42-9.89-6.83-14.5C64.73,240.66,60.2,220.1,60.2,192.37,60.2,134.54,86.87,81.54,109,57.28c4.08-4.39,13.3-13.87,16.06-13.87s3.41,2.23,3.41,9.12L125.89,431c0,59.17-17.07,82.67-17.07,96.61,0,6.12,2.65,7.71,7.71,7.71,24,0,47.84-29.21,54.6-39.86,21-36.23,26.12-64.51,26.12-146.09v-318c0-8.61-2.41-12.33-10.59-17.64C174.7,6.11,161,0,143.25,0Zm685,1.06C817,1.1,812.2,7,811.67,25.22l-2.5,75.47-66-2.29c-4-.1-5.81,1.17-7.56,4.69C730,113.6,727,121.83,727,135.55c0,11.16,5.06,12.35,9.58,12.35l68.68,2-.21,144.19c0,30.59-19.3,70.26-53.55,103.26a77.33,77.33,0,0,0,2.78-20.42c0-29.58-19-56.4-44.43-75.37l-62-46.61c13-15,35-44.83,35-70,0-19.51-12.27-27.7-35.14-27.7-32.27,0-69.7,29.55-69.7,73.4,0,16,7.11,30.36,17.91,41.36-14.92,28.32-36,65.57-51.71,92.1-11.84,20.31-31.87,51.43-43.73,51.43-8.74,0-12.77-13.75-12.77-66.57,0-43.89,3.11-91.6,4.68-137.4,0-10.5-1.72-20.19-15.35-29.68-12.54-8-28-19.25-44-19.25-35.46,0-59.61,32.62-76.18,64.53-17.15,33.06-26.42,60.92-39.5,101.35l1.44-139.13c.45-9.92-2.06-13.77-10-17.15-10.3-4.36-25.46-9.4-38.9-9.4-11.24,0-12.61,4.85-12.61,16.65L255.9,346.42l-.17,64.39c0,58.05,7.27,67.73,41.72,67.73,19.07,0,25.18-2.24,25.55-18.09.53-10.49,5.54-35.89,12.33-61.37,19.84-75.19,43.35-134.67,83.89-180,4.22-4.4,7.49-2.82,6.83,3.42,0,0-6.41,101.76-6.41,143.38,0,74,11.39,112.66,48.22,112.66,36.15,0,71.66-46.45,91-77.8l62.18-104c40.28,34.33,68.4,60.95,68.4,93.33,0,20.12-12.7,39.81-32,39.81-24.17,0-39.62-25.49-55.94-25.49-13.55,0-31,26.16-31,41,0,14,30.61,33.86,85.52,33.86,81.06,0,124.54-55.63,150.63-117.23,5,73.12,34.13,115.82,79.57,115.82,29.8,0,64.24-37.65,79.91-83.64,0,0,1.55,11.94,13.45,36.4,16.38,31.94,41.28,46.61,72.21,46.61,38.46,0,71.37-23.32,91.45-62.45,3,29.65,28,62.31,68,62.31,25.14,0,48-19.26,63.09-51,0,0,19.48,52.39,75.83,52.39,31.65,0,69.13-29.32,78.08-50.63l1,31L1345.65,536c-24.27,23.57-50.1,57.43-50.1,94.92,0,47.67,45,75.09,84.63,75.09,41.18,0,68.5-26.09,83.47-48,18.84-28.28,26.79-81.6,26.79-133.71l-1.86-78.36C1544.93,384,1589,298.39,1608.66,237.81l42.77-1.12c8.29-.56,7.88,2.7,6.73,7.53-7.52,31.77-14.08,67.75-14.08,103.57,0,59.2,13.63,84.95,33.23,106,17,17.64,34,23.59,51.82,23.59,34.88,0,56.77-28.8,63.72-47,16.38,31.94,40.51,46.82,71.43,46.82,38.47,0,71.37-23.32,91.46-62.45,3,29.65,27.94,62.31,68,62.31,29.91,0,47.26-17.26,60.91-49.78.27,10.46.67,21.61,1,32.06.36,5.41,4.69,8.84,8.56,10.25,12.71,4.81,23.87,7.22,33.9,7.22,26.15,0,31.82-5.37,31.82-22.46,0-28.2.83-72.74,8.84-108.5,8.5-35.61,21.34-75.91,39-104,1.6-2.9,5.51-2.14,5.68,1.37,2.54,60,6.55,161.59,22.32,187.89,7.77,12.54,19.8,21.68,37.8,21.68,8.44,0,18.79-3.59,21.44-5.84,2.68-2.09,4-4.42,3.87-8.73,0-76.71,23.92-151,47.88-200.91.66-1.48,2.53-1.6,2.46.35L2347.89,293c0,90.78,6.54,148.13,51.89,175.7a59.36,59.36,0,0,0,29.18,7.57,60.85,60.85,0,0,0,54.64-33.8c8.47-16.19,16.4-47.36,16.4-65,0-6.83.08-18-11.12-18-6.14,0-9.83,4.52-11.3,11.37-3.57,14.83-6.5,27.54-12,42.21-5.29,14-13.19,22.14-22.56,22.14-11,0-16.59-8.66-19.79-14-14-21.42-15.17-70.63-15.17-111.7l3.38-105.72c0-8.75-3.65-19.22-17.14-26.94-9.06-5.21-32-15-46-15-13,0-19.32,7.37-24,18.2-8.81,19.44-38.25,95.69-46.15,157.68-.28,1.63-2.32,2-2.46-.11-4.1-43.84-6.21-96.66-6.16-132.29,0-10.77-2.64-26.18-25.49-36.16-11.11-4.6-20.29-7.42-31.51-7.42-13.92,0-16.92,6.81-21.9,15.84-15.77,29.13-26.67,67.12-43,115l.25-109.66c0-5.13-3.14-11.85-12.15-13.66-22.32-5.13-32.66-7.46-41.46-7.46-6.41,0-9.93,5.1-9.93,10.63l-1.2,187c-4.32,22.89-21.82,77.52-46.65,77.52-20.38,0-29.89-20.65-29.89-107l3.7-140.25c0-8.86-5.81-12.58-14.29-16.34-12.12-4.81-21.76-6.72-34.08-6.72-15.46,0-20.76,7.4-17.64,25.17-17-23-34-35.7-64-35.7-60.26,0-105.68,72.49-105.68,177.82-.59,29.54,6.55,58.9,6.55,58.9-5.46,24.51-18.27,44.49-36,44.49-22.34,0-36.58-31.58-36.58-86.32,0-54.9,20.91-116.82,20.91-133.6,0-19.51-12.78-31.86-35.41-31.86-11.34,0-53.39,9.54-75,12.67,0,0,2.43-10.26,2.25-18.34,0-19.24-9-31.29-31.44-31.29-27.38,0-47.49,19.55-47.49,52.91,0,15,8.62,28.82,20,36.26-14.81,61.78-38.89,107.73-74.38,159.06L1491,189c0-6.76-1.8-11-15-16.09a83.33,83.33,0,0,0-32.77-6.52c-20.84,0-19.46,14.88-18.34,26-9.54-16.9-30.4-37-62.6-37-87.73,0-114.67,133.79-101.46,228.8,0,11.58-11.31,52.7-36.86,52.7-20.38,0-29.88-20.65-29.88-107l3.73-140.25c0-8.87-5.86-12.59-14.33-16.34-12.12-4.81-21.73-6.72-34-6.72-15.46,0-20.77,7.4-17.64,25.17-17-23-34-35.7-64-35.7-60.26,0-106.29,66.29-106.29,171.62,0,40.21-34.62,101.57-58.89,101.57-13.49,0-27.85-24.76-27.85-88,.07-43.11,5.95-189.89,5.95-189.89l84.74-1.37c4,0,6.38-4.46,7.88-7.18,3.89-7.9,5.77-13.15,5.77-22.6,0-8.53-1.7-11.64-12.63-12.25L882,103l3.59-78.68c.26-5-2.74-8.21-8.16-10.63C861,7.28,841,1.1,828.29,1.1Zm256.46,206.15c22.59,0,45.52,20.61,45.52,93.71,0,92.05-33.53,134.88-59.32,134.88-24.17,0-42.53-34.12-42.53-101.15,0-67.74,17.92-127.44,56.33-127.44Zm813.64,0c22.6,0,45.52,20.61,45.52,93.71,0,92.05-33.53,134.88-59.32,134.88-24.17,0-42.53-34.12-42.53-101.15,0-67.74,17.93-127.44,56.33-127.44Zm-516.06.43c29.49,0,42.53,30.39,42.53,89.31,0,88.83-26.4,139.4-58.47,139.4-20.48,0-44-33.61-42.78-99.73,0-42.27,13.79-129,58.72-129Zm49.92,297.16v35c0,116.1-30.94,135.92-55.8,135.92-9.42,0-32.49-7.11-32.49-35.84,0-40.15,42-85.83,55-99.94l33.26-35.13Z" transform="translate(0 -0.04)" />
                                </svg>
                            </div>
                            <p class="testimonial-quote text-primary">&quot;Adipisci mollitia nemo magnam iure, temporibus molestiae odit, sit harum dolores neque maiores quo eligendi nam corrupti.&quot;</p>
                            <div class="testimonial-name">Lia Peterson</div>
                            <div class="testimonial-position">Technical Project Manager</div>
                        </div>
                    </div>
                </a>
            </div> -->
        </div>
    </div>
    <div class="svg-border-rounded text-light">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" />
        </svg>
    </div>
</section>
<!-- contact us section -->
<section class="bg-light py-website-10">
    <div class="container-website mt-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h4>Ready to get started?</h4>
                <p class="lead mb-5 mb-lg-0 text-gray-500">Get in touch or create an account.</p>
            </div>
            <div class="col-lg-6 text-lg-right">
                <a class="btn-website btn-website-primary font-weight-500 mr-3 my-website-2" href="/contact">Contact Us</a>
                <a class="btn-website btn-website-white font-weight-500 my-website-2 shadow" href="/register">Create Account</a>
            </div>
        </div>
    </div>
</section>
<hr class="m-0" />
<!-- @include('layouts.partials._footer') -->


@endsection

{{-- Styles Section --}}
@section('styles')

@endsection
{{-- Scripts Section --}}
@section('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
