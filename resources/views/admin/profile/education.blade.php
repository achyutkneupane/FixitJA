{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'Education';
    $profileEducationIsActive = 'true';
    @endphp
    <div class="row">
        @include('admin.profile.userSideBar', $user)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                        Education Information
                        </h3>
                    </div>
                </div>
                {{-- Show Skills --}}

                <div class="card-body row">
                @if ($user->educations->count() != 0)
                    <div class="container">
                    @foreach ($user->educations as $education)
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Institution Name:</label>
                            <div class="col-lg-9 col-xl-6">
                                <span class="form-control form-control-lg form-control-solid">
                                    {!! $education->education_institution_name ? $education->education_institution_name : "<span class='text-muted'>N/A</span>" !!}
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Degree:</label>
                            <div class="col-lg-9 col-xl-6">
                                <span class="form-control form-control-lg form-control-solid">
                                    {!! $education->degree ? $education->degree : "<span class='text-muted'>N/A</span>" !!}
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Start Date:</label>
                            <div class="col-lg-9 col-xl-6">
                                <span class="form-control form-control-lg form-control-solid">
                                    {!! $education->start_date ? $education->start_date : "<span class='text-muted'>N/A</span>" !!}
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">End Date:</label>
                            <div class="col-lg-9 col-xl-6">
                                <span class="form-control form-control-lg form-control-solid">
                                    {!! $education->end_date ? $education->end_date : "<span class='text-muted'>N/A</span>" !!}
                                </span>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">
                                    Education record not found
                                </h2>
                            </div>
                        </div>
                    </div>
                @endif
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
