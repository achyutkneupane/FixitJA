@php
$page_title = 'Register';
$page_description = 'This is registration page';
$show_sidebar = false;
@endphp
@extends('layouts.app')
@section('content')

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div>
    <!--begin::Login-->
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid" id="kt_login">
        <!--begin::Content-->
        <div
            class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
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
                    <form id="demoForm" method="POST" action="/profile/init">
                        @csrf
                        <!--begin: Wizard Step 1-->
                        <div class="" data-wizard-type="step-content" data-wizard-state="current">
                            <!--begin::Title-->
                            <div class="pb-10 pb-lg-12">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Add Your Education
                                    Background</h3>

                            </div>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form Group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Name of School, College or
                                University</label>
                            <input type="text"
                                class="form-control "
                                name="educationinstutional_name" placeholder="Name"
                                value="{{old('educationinstutional_name')}}" />
                            @if ($errors->has('educationinstutional_name'))
                            <span class="text-danger">{{ $errors->first('educationinstutional_name') }}</span>
                            @endif
                        </div>
                        <!--end::Form Group-->

                        <!--begin::Form Group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Degree</label>

                            <select class="form-control" id="user_type" name="degree" value="{{old('degree')}}">
                                <option value="">Select</option>
                                <option value="general_user" id="type1">Secondary level</option>
                                <option value="Business" id="type2">Higher Secondary level</option>
                                <option value="independent_contractor" id="type3">Bachalaor</option>
                                <option value="independent_contractor" id="type3">Master</option>
                            </select>
                            @if ($errors->has('degree'))
                            <span class="text-danger">{{ $errors->first('degree') }}</span>
                            @endif
                        </div>


                        <!--end::Form Group-->
                        <!--begin::Form Group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Start Date</label>
                            
                                <div class='input-group' id='kt_daterangepicker_5'>
                                    <input type='text' class="form-control" readonly="readonly"
                                        placeholder="Select date range" name="startdate" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    
                                </div>
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">End Date</label>
                                
                                    <div class='input-group' id='kt_daterangepicker_5'>
                                        <input type='text' class="form-control" readonly="readonly"
                                            placeholder="Select date range" name="enddate" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        
                                    </div>
                                </div>
                                <!--end::Form Group-->
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Total GPA</label>
                                    <input type="text"
                                        class="form-control "
                                        name="gpa" placeholder="Your gpa" value="{{old('gpa')}}" />
                                    @if ($errors->has('gpa'))
                                    <span class="text-danger">{{ $errors->first('gpa') }}</span>
                                    @endif
                                </div>
                                <!--end::Form Group-->




                                <!--begin::Action-->
                                <div class="pb-lg-0 pb-5">
                                    <button type="submit" id="Add"
                                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Add</button>
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
        <script src="{{asset('js/pages/crud/forms/widgets/bootstrap-daterangepicker.js')}}"></script>
        <!-- <script src="{{ asset('js/form-validation.js') }}" type="text/javascript"></script>git ss -->


        {{-- Scripts Section --}}
        <script>
            $(document).ready(function () {
                $('.select2').select2();
            });

        </script>



        @endsection
