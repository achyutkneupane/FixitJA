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
                    <form action="{{ route('putEditProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Change Profile Picture:</label>
                        <div class="col-lg-9 col-xl-6">
                        <div class="editProfileImage mb-3">
                            <img src="{{ !empty($user->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . $user->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png') }}" id="profilePicture">
                        </div>
                            <input
                                id="profile_image"
                                type="file"
                                accept=".jpg,.gif,.png,.jpeg"
                                name="profile_image"
                                onchange="document.getElementById('profilePicture').src = window.URL.createObjectURL(this.files[0])"
                                />
                            @error('profile_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Gender: </label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control select2" name="gender" required>
                                <option value="male"{{ $user->gender == 'male' ? ' selected' : '' }}>Male</option>
                                <option value="female"{{ $user->gender == 'female' ? ' selected' : '' }}>Female</option>
                                <option value="other"{{ $user->gender == 'other' ? ' selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control select2" name="city_id" required>
                                <option label="Label"></option>
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
                                value="{{ $user->street_01 }}" placeholder="Street Address" required><br>
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
                        <label class="col-xl-3 col-lg-3 col-form-label">Website: </label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" name="website" value="{{ $user->website }}" placeholder="Website">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Is willing to travel to work?</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="hidden" name="is_travelling" value="0">
                            <input type="checkbox" name="is_travelling"{{ $user->is_travelling ? ' checked' : '' }} value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Has Police report?</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="hidden" name="is_police_record" value="0">
                            <input type="checkbox" name="is_police_record"{{ $user->is_police_record ? ' checked' : '' }} value="1">
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="submit" name="submit" value="Edit" class="btn btn-primary">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('styles')
<style>
.editProfileImage img {
    width: 150px;
    height: 150px;
}
</style>
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select an Option"
            });
        });

    </script>
@endsection
