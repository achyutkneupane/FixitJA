@php
$page_title = 'Register';
$page_description = 'This is registration page';
$show_sidebar = false;
@endphp

@if (session()->has('referral'))
@php
    $referral = App\Models\User::find(session()->get('referral')->referred_by)->email();
    $toRegister = session()->get('referral')->email;
@endphp
@endif
@extends('layouts.app')
@section('content')

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div>
    <!--begin::Login-->
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid" id="kt_login">
        <!--begin::Content-->
        <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
            <!--begin::Container-->
            <div class="login-content login-content-signup d-flex flex-column">
                <!--begin::Aside Top-->

                <!--begin::Aside header-->
                <a href="/" class="login-logo pb-lg-4 pb-10">
                    <img src="{{asset('images/logo.png')}}" class="max-h-120px" alt="" />
                </a>
                <!--end::Aside header-->
                <!--begin: Wizard Nav-->

                <!--end::Aside Top-->
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form id="demoForm" method="POST" action="{{ route('signup') }}">
                        @csrf
                        <!--begin: Wizard Step 1-->
                        <div class="" data-wizard-type="step-content" data-wizard-state="current">
                            <!--begin::Title-->
                            <div class="pb-10 pb-lg-12">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Create Account</h3>
                                <div class="text-muted font-weight-bold font-size-h4">Already have an Account ?
                                    <a href="/login" class="text-primary font-weight-bolder">Login</a>
                                </div>
                            </div>
                            <!--begin::Title-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Full Name (Required)</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="name" placeholder="Name" value="{{old('name')}}" />
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Email (Required)</label>
                                <input type="email" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="email" placeholder="info@fixitja.com" value="{{ session()->has('referral') ? $toRegister : old('email')}}" />
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Phone (Required)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="form-control form-control-solid h-auto py-7 px-6 border-0 font-size-h6" id="phone_number">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Flag_of_Jamaica.svg/255px-Flag_of_Jamaica.svg.png" height="25" width="30">
                                        +1
                                    </span>
                                    </div>
                                    <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 font-size-h6" name="phone" placeholder="8442000161" value="{{old('phone')}}"  id="basic-url" aria-describedby="phone_number"/>
                                </div>
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Referred By(Optional)</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="referralemail" placeholder="Referred By (Optional)" value="{{ session()->has('referral') ? $referral : old('referralemail') }}" />
                                @if ($errors->has('referralemail'))
                                <span class="text-danger">{{ $errors->first('referralemail') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Type (Required)</label>

                                <select class="form-control" id="user_type" name="type">
                                    <option value="" disabled>Select</option>
                                    <option value="general_user" @if (old('type') == "general_user" || $sessionType == "general_user") {{ 'selected' }} @endif>General User</option>
                                    <option value="business" @if (old('type') == "business" || $sessionType == "business") {{ 'selected' }} @endif>Business</option>
                                    <option value="independent_contractor" @if (old('type') == "independent_contractor" || $sessionType == "independent_contractor") {{ 'selected' }} @endif>Skilled Worker</option>
                                </select>
                                @if ($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                                @endif
                            </div>


                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group" id="genders">
                                <label class="font-size-h6 font-weight-bolder text-dark">Gender</label>

                                <select class="form-control" name="gender" value="{{ old('gender') }}">
                                    <option value="">Select</option>
                                    <option value="Male" @if (old('gender')=="Male" ) {{ 'selected' }} @endif>Male</option>
                                    <option value="Female" @if (old('gender')=="Female" ) {{ 'selected' }} @endif>Female</option>
                                    <option value="Custom" @if (old('gender')=="Custom" ) {{ 'selected' }} @endif>Other</option>
                                </select>
                                @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>


                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group" id="webpersonal">
                                <label class="font-size-h6 font-weight-bolder text-dark">Website</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="websitepersonal" placeholder="Website (Optional)" value="{{old('websitepersonal')}}" />
                                @if ($errors->has('website'))
                                <span class="text-danger">{{ $errors->first('website') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group" id="companyname">
                                <label class="font-size-h6 font-weight-bolder text-dark">Company Name</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="companyname" placeholder="Company Name" value="{{old('companyname')}}" />
                                @if ($errors->has('companyname'))
                                <span class="text-danger">{{ $errors->first('companyname') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group" id="webcompany">
                                <label class="font-size-h6 font-weight-bolder text-dark">Website</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="websitecompany" placeholder="Website (Optional)" value="{{old('websitecompany')}}" />
                                @if ($errors->has('websitecompany'))
                                <span class="text-danger">{{ $errors->first('websitecompany') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Password</label>
                                <input type="password" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password" id="psw" placeholder="Password" value="" />

                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span> <br>
                                @endif
                                <span class="passwordinfo"> Your password must be more than 6 characters long, should contain at least one uppercase and one numeric character.</span>
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark"> Confirm Password</label>
                                <input type="password" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password_confirmation" placeholder=" Confirm Password" value="" />
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <label class="text-danger">
                                By signing up, you automatically agree to our&nbsp;
                                <a href="/termsandconditions" target="_blank">Terms & Conditions</a>
                                .
                            </label>
                            <!--begin::Action-->
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id="signup" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign Up</button>
                            </div>
                        </div>
                </div>
                @include('layouts.partials._footer_simple')
                <!--end::Signin-->
            </div>
            <!--end::Container-->

            <!--begin::Content-->

            <!--end::Aside-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->


    @endsection

    {{-- Styles Section --}}
    @section('styles')
    <link href="{{ asset('css/pages/login/login-4.css') }}" rel="stylesheet" type="text/css" />

    @endsection
    {{-- Scripts Section --}}
    @section('scripts')
    <script src="{{ asset('js/pages/custom/login/login-4.js') }}" type="text/javascript"></script>
    <!-- <script src="{{ asset('js/form-validation.js') }}" type="text/javascript"></script>git ss -->


    {{-- Scripts Section --}}
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        function changeType()
        {
            var type = $('#user_type').val();
            if (type == "general_user" || type == "independent_contractor") 
            {
                document.getElementById("genders").style.display = "block";
                document.getElementById("webpersonal").style.display = "block";
            }
            else
            {
                document.getElementById("genders").style.display = "none";
                document.getElementById("webpersonal").style.display = "none";
            }

            if(type == "business")
            {
                document.getElementById("webcompany").style.display = "block";
                document.getElementById("companyname").style.display = "block";
            }
            else
            {
            document.getElementById("webcompany").style.display = "none";
            document.getElementById("companyname").style.display = "none";
            }
        }
        changeType();
        $("#user_type").change(function() {
            changeType();
        });
    </script>
    @endsection
