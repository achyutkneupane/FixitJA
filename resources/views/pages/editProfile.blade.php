{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $profileIsActive = 'true';
    @endphp
    @if (Auth::user()->id == $user->id)
        @php
            $page_title = 'Edit Profile';
        @endphp
    @else
        @php
            $page_title = 'Edit User';
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
                            <input class="form-control form-control-lg form-control-solid" name="gender"
                                value="{{ $user->gender }}" placeholder="Gender">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control select2" id="kt_select2_1" name="address">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ ($city->id == $user->city->id) ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Street : </label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" name="street_01"
                                value="{{ $user->street_01 }}" placeholder="Street Address"><br>
                            <input class="form-control form-control-lg form-control-solid" name="street_02"
                                value="{{ $user->street_02 }}" placeholder="Street Address 2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Company Name: </label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" name="companyname"
                                value="{{ $user->companyname }}" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Experience: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->experience) ? $user->experience : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Website: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->website) ? '<a href="' . $user->website . '">' . $user->website . '</a>' : "<span class='text-muted'>N/A</span>" !!}
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
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

    </script>
@endsection
