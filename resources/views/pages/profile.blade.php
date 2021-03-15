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
    @isAdminOrUser($user->id)
    @php
    $subhead_button = [['class' => 'primary', 'text' => 'Edit', 'link' => $user->id == auth()->id() ? route('editProfile') : route('editUserProfile', $user->id)]];
    @endphp
    @endisAdminOrUser
    <div class="row">
        @include('admin.profile.userSideBar', $user)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Gender: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->gender) ? ucwords($user->gender) : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->getEmail($user->id)) ? $user->getEmail($user->id) : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Phone: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->getPhone($user->id)) ? $user->getPhone($user->id) : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->city->name) ? $user->city->name : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Street : </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! !empty($user->street_01) ? $user->street_01 : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                            {!! !empty($user->street_02) ? '<span class="form-control form-control-lg form-control-solid mt-3">' . $user->street_02 . '</span>' : '' !!}
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
                    @userIsContractor($user)
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Police report</label>
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! $user->introduction ? $user->introduction : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Working hours per week</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! $user->hours ? $user->hours : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Working days:</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! $user->days ? $user->days : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Willing to travel long distace</label>
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
                    @if ($user->is_travelling == 1)
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Distance willing to travel</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                {!! $user->areas_covering ? $user->areas_covering : "<span class='text-muted'>N/A</span>" !!}
                            </span>
                        </div>
                    </div>
                    @endif
                    @enduserIsContractor
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
