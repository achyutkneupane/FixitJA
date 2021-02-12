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
                        <p class="page-header-text mb-5">We are commited to provide you our best service and best Fixicians to help with your projects.</p>
                    </div>
                    <div class="row">
                        <div class="col-9" style="padding: 0;">
                            <select class="form-control-website kt-select2 select2" id="kt_select2_1" name="param">
                                <option value="plu">Plumbing</option>
                                <option value="ele">Electrician</option>
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                                <option value="AZ">Arizona</option>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="AR">Arkansas</option>
                                <option value="IL">Illinois</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="OK">Oklahoma</option>
                                <option value="SD">South Dakota</option>
                                <option value="TX">Texas</option>
                                <option value="TN">Tennessee</option>
                                <option value="WI">Wisconsin</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="IN">Indiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="OH">Ohio</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WV">West Virginia</option>
                            </select>
                        </div>

                        <div class="col-3 text-right">
                            <a class="btn-website btn-website-teal font-weight-500 mr-2" href="index.html">Go</a>
                        </div>
                    </div>
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
                                <p class="text-white opacity-75 font-weight-bold mt-3" style="width: 60%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
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
                <a class="btn-website btn-website-teal font-weight-500 mb-3" href="#!">Get Started Now!</a>
                <h2 class="text-black">No need to create an account to place your project</h2>
                <p class="lead text-black-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <div class="row justify-content-center text-center py-website-5">
            <div class="badge badge-transparent-dark badge-pill badge-marketing text-white">OR</div>
        </div>
        <div class="p-5" style="box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);">
            <div class="row justify-content-center text-center mb-2">
                <div class="col-lg-8 mb-3">
                    <a class="btn-website btn-website-teal font-weight-500 mb-3" href="#!">Create An Account</a>
                    <h2 class="text-black">For more convinience in your project</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="file-plus"></i></div>
                    <h3>Place a project</h3>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="list"></i></div>
                    <h3>Track your project</h3>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-lg-4">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="edit"></i></div>
                    <h3>Review our services</h3>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                                <p class="text-white opacity-75 font-weight-bold mt-3" style="width: 60%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
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
                <a class="btn-website btn-website-teal font-weight-500 mb-3" href="#!">Become Our Fixician</a>
                <h2 class="text-white">Use your skills and earn money</h2>
                <p class="lead text-white-50 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua!</p>
            </div>
        </div>
        <div class="row my-10">
            <div class="col-lg-3 mb-5">
                <div class="text-center">
                    <div class="text-white mb-3"><i class="flaticon2-user-1 icon-3x"></i></i></div>
                    <div class="ml-4">
                        <h5 class="text-white">Create your account</h5>
                        <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-5">
                <div class="text-center">
                    <div class="text-white mb-3"><i class="flaticon-folder-1 icon-3x"></i></div>
                    <div class="ml-4">
                        <h5 class="text-white">Submit Your Application</h5>
                        <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-5">
                <div class="text-center">
                    <div class="text-white mb-3"><i class="flaticon-list-1 icon-3x"></i></div>
                    <div class="ml-4">
                        <h5 class="text-white">Background Check</h5>
                        <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-5">
                <div class="text-center">
                    <div class="text-white mb-3"><i class="flaticon-coins icon-3x"></i></div>
                    <div class="ml-4">
                        <h5 class="text-white">Start Earning</h5>
                        <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
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
            <div class="col-lg-6 mb-lg-n10 mb-5 mb-lg-0 z-1">
                <a class="card-website text-decoration-none h-100 lift" href="#!">
                    <div class="card-website-body py-website-5">
                        <div class="testimonial p-lg-5">
                            <div class="testimonial-brand text-gray-400">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2500.01 816.05">
                                    <title>google</title>
                                    <path d="M307.89.07h22.23c77.18,1.68,153.1,32.72,207.63,87.67-20.13,20.55-40.69,40.27-60.4,60.82-30.62-27.68-67.53-49.08-107.8-56.63C310,79.35,245.81,90.68,195.89,124.65c-54.53,35.66-91.44,96.06-99.41,160.66-8.81,63.76,9.22,130.87,50.75,180.37,39.85,48.23,100.67,78.44,163.59,80.53,58.73,3.36,120-14.68,162.75-55.79,33.56-28.94,49.08-73,54.11-115.77-69.63,0-139.26.42-208.89,0V288.24H612c15.1,92.7-6.71,197.15-77.18,263.43-47,47-112,74.66-178.28,80.11-64.17,6.3-130.45-5.87-187.5-36.91C100.67,558.38,46.14,496.72,19.3,424.15-5.87,357.45-6.29,282,17.2,214.84,38.59,153.6,79.7,99.48,132.55,61.73,183.31,24.4,245,3.85,307.89.07Z" transform="translate(0.01 -0.07)" />
                                    <path d="M1989.93,21.88h89.77v599c-29.78,0-60,.42-89.77-.42.42-199.25,0-398.91,0-598.58Z" transform="translate(0.01 -0.07)" />
                                    <path d="M811.66,229.52C867,219,927,230.78,972.73,263.91c41.53,29.37,70.47,75.51,79.28,125.84,11.33,58.31-2.93,122.07-40.68,168.21-40.69,51.59-107.39,79.28-172.4,75.08-59.57-3.35-117.45-33.14-152.69-81.79-39.85-53.69-49.5-127.52-27.68-190.44,21.81-67.53,83.47-119.13,153.1-131.29m12.58,79.7a112.72,112.72,0,0,0-58.72,37.33c-40.69,48.66-38.17,127.93,6.71,173.24,25.59,26,64.18,38.17,99.83,31,33.14-5.88,62.08-28.11,78-57.47,27.69-49.92,19.72-118.71-22.65-157.72-27.26-25.17-67.11-35.65-103.19-26.42Z" transform="translate(0.01 -0.07)" />
                                    <path d="M1256.29,229.52c63.34-12.17,132.55,5.45,180,49.91,77.18,69.22,85.57,198.83,19.72,278.53-39.85,50.33-104.45,78-168.21,75.08-60.82-1.68-120.8-31.88-156.88-81.79-40.69-54.95-49.49-130.46-26.42-194.63,23.07-65.44,83.47-115.36,151.84-127.1m12.59,79.7a114.63,114.63,0,0,0-58.73,36.91c-40.27,47.82-38.59,125.84,4.62,171.56,25.58,27.26,65.43,40.69,102.34,33.14,32.72-6.29,62.08-28.11,78-57.47,27.27-50.33,19.3-119.13-23.49-158.14-27.26-25.16-67.11-35.23-102.76-26Z" transform="translate(0.01 -0.07)" />
                                    <path d="M1633.39,253.85c48.24-30.2,112.42-38.59,164.43-12.59,16.36,7.13,29.78,19.3,42.78,31.46.42-11.32,0-23.07.42-34.81,28.11.42,56.21,0,84.74.42v370c-.42,55.79-14.69,114.94-55,155.62-44,44.89-111.58,58.73-172.4,49.5-65-9.65-121.65-57-146.82-117,25.17-12.16,51.6-21.81,77.6-33.14,14.69,34.4,44.47,63.76,81.8,70.47s80.54-2.51,104.87-33.55c26-31.88,26-75.51,24.74-114.52-19.29,18.88-41.52,35.66-68.37,42-58.3,16.36-122.48-3.78-167.36-43.21-45.31-39.43-72.15-100.25-69.64-160.65,1.26-68.37,39.85-134.23,98.16-169.88m86.83,53.69c-25.59,4.19-49.5,18.46-65.86,38.17-39.43,47-39.43,122.06.42,168.2,22.65,27.27,59.15,42.37,94.38,38.6,33.14-3.36,63.76-24.33,80.12-53.28,27.68-49.07,23.07-115.77-14.26-158.55-23.07-26.43-60-39.43-94.8-33.14Z" transform="translate(0.01 -0.07)" />
                                    <path d="M2187.5,275.24c50.34-47,127.94-62.92,192.53-38.17,61.25,23.07,100.26,81.37,120,141.36-91,37.75-181.63,75.08-272.65,112.83,12.58,23.91,31.88,45.72,57.88,54.53,36.5,13,80.12,8.39,110.74-15.94,12.17-9.22,21.82-21.39,31-33.13,23.07,15.52,46.14,30.62,69.21,46.14-32.71,49.07-87.66,83.47-146.81,88.92-65.43,8-135.06-17.19-177.43-68.37-69.63-80.54-62.92-215.6,15.52-288.17m44.88,77.6c-14.26,20.55-20.13,45.72-19.71,70.47q91.23-37.76,182.46-75.92c-10.06-23.49-34.39-37.75-59.14-41.53C2296.14,298.73,2254.61,320.12,2232.38,352.84Z" transform="translate(0.01 -0.07)" />
                                </svg>
                            </div>
                            <p class="testimonial-quote text-primary">&quot;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut error vel omnis adipisci. Ad nam officiis sapiente dicta incidunt harum.&quot;</p>
                            <div class="testimonial-name">Adam Hall</div>
                            <div class="testimonial-position">Head of Engineering</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 mb-lg-n10 z-1">
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
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-light">
        <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
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
            <div class="col-lg-6 text-lg-right"><a class="btn-website btn-website-primary font-weight-500 mr-3 my-website-2" href="#!">Contact Us</a><a class="btn-website btn-website-white font-weight-500 my-website-2 shadow" href="#!">Create Account</a></div>
        </div>
    </div>
</section>
<hr class="m-0" />
@auth
@if (config('layout.extras.user.layout') == 'offcanvas')
@include('layouts.partials.extras.offcanvas._quick-user')
@endif
@endauth


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
