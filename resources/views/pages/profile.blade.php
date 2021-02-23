{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $profileIsActive = 'true';
    @endphp
    @if (Auth::user()->id == $user->id)
        @php
            $page_title = 'Profile';
        @endphp
    @else
        @php
            $page_title = 'User Overview';
        @endphp
    @endif
    <div class="row">
        @include('admin.profile.userSideBar', $user)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Gender: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->gender) ? ucwords($user->gender) : "<span class='text-muted'>N/A</span>"
                                !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->getemail()) ? $user->getemail() : "<span class='text-muted'>N/A</span>"
                                !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Phone: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->phone) ? $user->phone : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->city->name) ? $user->city->name : "<span class='text-muted'>N/A</span>"
                                !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Street : </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->street_01) ? $user->street_01 : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                            {!! !empty($user->street_02)
                            ? '<span class="form-control form-control-lg form-control-solid mt-3">' .
                                $user->street_02 .
                                '</span>'
                            : '' !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Company Name: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->companyname) ? $user->companyname : "<span class='text-muted'>N/A</span>"
                                !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Experience: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->experience) ? $user->experience : "<span class='text-muted'>N/A</span>"
                                !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Website: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->website) ? '<a href="' . $user->website . '">' . $user->website . '</a>' :
                                "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Is willing to travel to work?</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                @if ($user->is_travelling == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Has Police report?</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                @if ($user->is_police_record == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}" type="text/javascript"></script>
@endsection
