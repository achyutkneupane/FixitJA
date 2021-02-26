{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'Skills';
    $profileSkillIsActive = 'true';
    @endphp
    <div class="row">
        @include('admin.profile.userSideBar', $user)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Change Password
                        </h3>
                    </div>
                </div>
                {{-- Change Password --}}

                <div class="card-body">
                    <form action="{{ route('changePassword') }}" method="POST" id="changePassword">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Old Password: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid"
                                    placeholder="Old Password" name="old_password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">New Password: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid"
                                    placeholder="New Password" name="new_password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Confirm New Password: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid"
                                    placeholder="Confirm New Password" name="cnew_password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12 col-xl-9 text-center">
                                <button class="btn btn-primary" onclick="validatePasswordAndGo()">Change</button>
                            </div>
                        </div>
                    </form>
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
