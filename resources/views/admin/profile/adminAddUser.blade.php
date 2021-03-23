{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
@php
    $page_title = "Add User";
@endphp
<div class="container jumbotron">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('adminAddUserSubmit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group fv-plugins-icon-container">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control form-control-solid form-control-sm" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fv-plugins-icon-container">
                                    <label>Email</label>
                                    <input type="text" class="form-control form-control-solid form-control-sm" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group fv-plugins-icon-container">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control form-control-solid form-control-sm" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fv-plugins-icon-container">
                                    <label>Gender</label>
                                    <select class="form-control select2" name="gender" required>
                                        <option label="Label"></option>
                                        <option value="male"{{ old('gender') == "male" ? ' selected' : '' }}>Male</option>
                                        <option value="female"{{ old('gender') == "female" ? ' selected' : '' }}>Female</option>
                                        <option value="other"{{ old('gender') == "other" ? ' selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group fv-plugins-icon-container">
                                    <label>User Type</label>
                                    <select class="form-control select2" name="type" required>
                                        <option label="Label"></option>
                                        <option value="admin"{{ old('type') == "admin" ? ' selected' : '' }}>Admin</option>
                                        <option value="general_user"{{ old('type') == "general_user" ? ' selected' : '' }}>General User</option>
                                        <option value="business"{{ old('type') == "business" ? ' selected' : '' }}>Business</option>
                                        <option value="individual_contractor"{{ old('type') == "individual_contractor" ? ' selected' : '' }}>Individual Contractor</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fv-plugins-icon-container">
                                    <label>City</label>
                                    <select class="form-control select2" name="city_id" required>
                                        <option label="Label"></option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"{{ old('city_id') == $city->id ? ' selected' : '' }}>
                                                {!! $city->name !!}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group fv-plugins-icon-container">
                                    <label>Street Address 1</label>
                                    <input type="text" class="form-control form-control-solid form-control-sm" name="street_01" placeholder="Street Address 1" value="{{ old('street_01') }}" required>
                                    @error('street_01')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group fv-plugins-icon-container">
                                    <label>Street Address 2(Optional)</label>
                                    <input type="text" class="form-control form-control-solid form-control-sm" name="street_02" placeholder="Street Address 2(Optional)" value="{{ old('street_02') }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group fv-plugins-icon-container">
                                    <label>Website(Optional)</label>
                                    <input type="text" class="form-control form-control-solid form-control-sm" name="website" placeholder="Website(Optional)" value="{{ old('website') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button class="btn btn-primary">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select an Option"
            });
        });

    </script>
@endsection
