@extends('layouts.app')
@php
$page_title = 'Resend Verification';
$page_description = 'This is login page';
$show_sidebar = false;
@endphp
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
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Content-->
        <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
            <!--begin::Wrapper-->
            <div class="login-content d-flex flex-column pt-lg-0 pt-8">
                <!--begin::Logo-->
                <a href="/" class="login-logo pb-xl-15 pb-10">
                    <img src="{{asset('images/logo.png')}}" class="max-h-120px" alt="" />
                </a>
                <!--end::Logo-->
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('reverifyUser') }}">
                        @csrf
                        <!--begin::Title-->
                        <div class="pb-5 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Resend Verification Email</h3>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="text" name="email" autocomplete="off" value="{{ $user->email }}" />
                            @if ($errors->has('email'))
                             <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Resend</button>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>

                @include('layouts.partials._footer_simple')
                <!--end::Signin-->
            </div>
            <!--end::Wrapper-->

        </div>
        <!--begin::Content-->
        <!--begin::Aside-->
        <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
            <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url({{asset('images/website/repair1.svg')}});">
                <!--begin::Aside title-->
                <h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">We Got
                    <br />A Surprise
                    <br />For You
                </h3>
                <!--end::Aside title-->
            </div>
        </div>
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
@endsection
