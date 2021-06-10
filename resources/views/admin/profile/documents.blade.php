{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
@php
$page_title = 'Documents';
$profileDocumentIsActive = 'true';
@endphp
<div class="row">
    @include('admin.profile.userSideBar', $user = auth()->user())
    <div class="col-lg-8">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        Documents
                    </h3>
                </div>
            </div>
            {{-- Show Skills --}}
            <div class="card-body row">
                <div class="col-12">
                    <h3 class="card-label">Profile Image</h3>
                </div>
                @if(Auth::user()->documents)
                <div class="form-group">
                    <div class="col-lg-9 col-xl-6">
                        <div class="editProfileImage mb-3">
                            <img src="{{ !empty(Auth::user()->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . Auth::user()->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png') }}"
                                id="profilePicture" style="height:200px; width:200px;">
                        </div>

                    </div>
                    @else
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">
                                    No Profile found
                                </h2>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
            <div class="card-body row">
                <div class="col-12">
                    <h3 class="card-label">Certificates</h3>
                    @if ($certs->count() != 0)
                    @foreach ($certs as $certificate)
                    <div class="col-lg-12">
                        <div class="d-flex flex-column my-2">
                            <div class="col-lg-8">
                                <a type="button" href="{{route('getfile', basename($certificate['path']))}}" class="btn btn-success">
                                    <i class="fas fa-long-arrow-alt-down"></i>Download Certificate for {{ ucwords($certificate['category_name']) }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">
                                    No Certificate found
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
