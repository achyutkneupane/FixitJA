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
                        Education
                        </h3>
                    </div>
                </div>
                {{-- Show Skills --}}

                <div class="card-body row">
                @if ($user->educations->count() != 0)
                    @foreach ($user->educations as $education)
                        @if ($loop->first)   
                        <div class="container">
                            <div class="row">
                        @endif
                                <div class="col-md-12 p-4 text-center">
                                    <img src="{{ asset('storage/'.$document->path) }}" width="100%" height="350px">
                                    <h4 class="font-weight-bold">
                                        {{ str_contains($document->type,'certificate') ? 'Certificate' : ucwords(str_replace('_',' ',$document->type)) }}
                                    </h4>
                                </div>
                        @if ($loop->last)
                            </div>
                        </div>
                        @endif
                    @endforeach
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
