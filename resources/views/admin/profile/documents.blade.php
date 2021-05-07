{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
@php
$page_title = 'Documents';
$profileDocumentIsActive = 'true';
@endphp
<div class="row">
    @include('admin.profile.userSideBar', $user)
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
            <h3 class="card-label">Profile Image </h3>
            <div class="card-body row">

                @if(Auth::user()->documents)


                <div class="form-group row">
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
            <h3 class="card-label">Certificates</h3>
            @if ($user->documents->count() != 0)
            @foreach ($user->documents as $document)
             <a href="" class="dropzone-select btn btn-light-primary font-weight-bold btn-sm dz-clickable"><span>{{ Auth::user()->name}}_Certificate{{$loop->index}}
                                                                        </span>
                                                                        <button type="button" id="button" class="btn btn-warning"> <i class="far fa-eye-slash"></i>view</button> 
                                                                        <button type="button" href="{{route('getfile', basename($document['path']))}}" class="btn btn-success"><i
                                                                            class="fas fa-long-arrow-alt-down"></i>Download</button></a> <br/> <br/>

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
    @endsection

    {{-- Scripts Section --}}
    @section('scripts')
    <script type="text/javascript">

   $(function(){
    $('#button').click(function(){ 
        if(!$('#iframe').length) {
                $('#iframeHolder').html('<iframe id="iframe" src="//player.vimeo.com/video/90429499" width="700" height="450"></iframe>');
        }
    });   
});

    </script> 
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}" type="text/javascript"></script>
    @endsection
