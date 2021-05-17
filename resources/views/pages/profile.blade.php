{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $profileIsActive = 'true';
    @endphp
    @onlyForRespectiveUser($user)
        @php
            $page_title = 'Profile';
        @endphp
    @else
        @php
            $page_title = 'User Overview';
        @endphp
    @endonlyForRespectiveUser
    @isAdminOrUser($user)
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
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! !empty($user->gender) ? ucwords($user->gender) : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email: </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! !empty($user->getEmail($user->id)) ? $user->getEmail($user->id) : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Phone: </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! !empty($user->getPhone($user->id)) ? $user->getPhone($user->id) : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Parish: </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! !empty($user->city->name) ? $user->city->parish->name : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">City: </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! !empty($user->city->name) ? $user->city->name : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Street : </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! !empty($user->street_01) ? $user->street_01 : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                            {!! !empty($user->street_02) ? '<div class="p-5 rounded mt-4" style="background-color: #f5f6fa;">' . $user->street_02 . '</div>' : '' !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Website: </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! !empty($user->website) ? '<a href="' . $user->website . '">' . $user->website . '</a>' : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                        </div>
                    </div>
                    @userIsContractor($user)
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Police report</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                @if ($user->is_police_record == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! $user->introduction ? $user->introduction : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Working hours per week</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! $user->hours ? $user->hours : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Working days:</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! $user->days ? $user->days : "<span class='text-muted'>N/A</span>" !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Willing to travel long distace</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                @if ($user->is_travelling == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($user->is_travelling == 1)
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Distance willing to travel</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="p-5 rounded" style="background-color: #f5f6fa;">
                                {!! $user->total_distance ? $user->total_distance : "<span class='text-muted'>N/A</span>" !!}
                            </div>
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
    <script src="{{ asset('js/custom/create-workingdays-tagify.js') }}" type="text/javascript"></script>
@endsection
