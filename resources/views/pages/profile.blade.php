{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
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

        @include('admin.userSideBar', $user)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">{{ $user->city->name }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Experience: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">{{ $user->experience }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Website: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid"><a
                                    href="{{ $user->website }}">{{ $user->website }}</a></span>
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
@endsection
