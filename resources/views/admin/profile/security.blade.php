{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'Account Setting';
    $profileAccountIsActive = 'true';
    @endphp
    <div class="row">
        @include('admin.profile.userSideBar', $user)
        <div class="col-lg-8">
            <div class="card card-custom">

                @onlyForRespectiveUser($user->id)
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

                @endonlyForRespectiveUser
                {{-- Change or add email --}}

                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Change or Add Email
                        </h3>
                    </div>
                    @isVerified
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-sm btn-primary font-weight-bold" data-toggle="modal"
                            data-target="#addEmailModal">
                            Add Email
                        </a>
                    </div>
                    @endisVerified
                </div>
                <div class="card-body">

                    @foreach ($user->emails()->get() as $email)
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @if ($loop->first)
                                    Email:
                                @endif
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <span class="form-control form-control-lg form-control-solid">
                                    {{ $email->email }}
                                    @if ($email->primary == true)
                                        {!! $user->status == 'pending'
    ? '
                                        <span class="label label-warning label-pill label-inline mr-2 float-right">Not
                                            Verified</span>'
    : '
                                        <span
                                            class="label label-success label-pill label-inline mr-2 float-right">Verified</span>' !!}
                                    @endif
                                </span>
                                {!! $user->status == 'pending'
    ? '<span class="form-text text-center"><a href="' .
        route('resendEmail') .
        '" class="text-muted">Resend
                                        Activation
                                        Email.</a></span>'
    : '' !!}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Account Setting --}}
                @onlyForRespectiveUser($user->id)
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <a href="{{ route('deactivateUser') }}">
                                Deactivate your account
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="{{ route('deleteUser') }}">
                                Delete your account
                            </a>
                        </div>

                    </div>
                </div>
                @endonlyForRespectiveUser
            </div>
        </div>
    </div>

    @isVerified
    <div class="modal fade" id="addEmailModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmail">Add Email Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{{ route('addEmail') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email Address: </label>
                            <div class="col-lg-9 col-xl-9">
                                <input type="hidden" name="user" value="{{ $user->id }}">
                                <input type="email" class="form-control form-control-lg form-control-solid"
                                    placeholder="Email Address" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-light-primary font-weight-bold" value="Add Email">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endisVerified
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}" type="text/javascript"></script>
    <script>
        function validatePasswordAndGo() {
            event.preventDefault();
            var oldPassword = document.getElementsByName('old_password')[0].value;
            var newPassword = document.getElementsByName('new_password')[0].value;
            var cnewPassword = document.getElementsByName('cnew_password')[0].value;
            if (!oldPassword) {
                toastr.error("Enter Old Password");
            } else if (!newPassword) {
                toastr.error("Enter New Password");
            } else if (!cnewPassword) {
                toastr.error("Enter Confirm Password");
            } else if (cnewPassword !== newPassword) {
                toastr.error("New and confirm password doesn't match.");
            } else {
                document.getElementById("changePassword").submit();
            }
        }

    </script>
@endsection
