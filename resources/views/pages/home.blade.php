@extends('layouts.app')
@section('content')

    @php
        $page_title = 'Dashboard';
        $subhead_button = [['class'=>'primary','text'=>'Edit Profile','target'=>'#editProfileModal']];
    @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Welcome ') }}<strong>{{$loggedUser->name}}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if($loggedUser->status == 'pending')
                    <div class="application-status text-danger pb-4 font-weight-bold text-center">
                        <div>
                            Your application is pending.
                        </div>
                        <div>
                            Please complete your application.
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Complete Application Now
                        </button>
                    </div>
                    @endif

                    <div class="container">
                        <div class="main-body">
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="
                                                    @if(!is_null($documents->where('type','profile_picture')->first()))
                                                    {{ asset('storage/'.$documents->where('type','profile_picture')->first()->path)}}
                                                    @else
                                                    {{asset('images/unknown-avatar.png') }}
                                                    @endif
                                                " alt="Admin" class="rounded-circle object-fit-scale-down" width="150" height="150">
                                                <div class="mt-3">
                                                    <h4>{{ucwords($loggedUser->name)}}</h4>
                                                    <p class="text-secondary mb-1">{{ $loggedUser->userType() }}</p>
                                                    <p class="text-muted font-size-sm"></p>
                                                    <!-- <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> -->
                                                    <!-- Button trigger modal -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Full Name</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    {{ucwords($loggedUser->name)}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    {{$loggedUser->email}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Phone</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    {{$loggedUser->phone}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Street Address</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    {{$loggedUser->street}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">City</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    {{$loggedUser->city->name}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Country</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    JA
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Skills</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    Painter
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Experience</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    3
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Website</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    {{$loggedUser->website}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Is willing to travel to work?</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    Yes
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Is willing to submit police record if necessary?</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    No
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Status</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    {{ucfirst($loggedUser->status)}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Trade Certificate</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    file
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Reference 1</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    file
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Reference 2</h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    file
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Trigger the modal with a button -->


                                <!-- Modal Edit Profile -->
                                <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form id="form_edit_profile" method="POST" action="/user/edit" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($errors->any())
                                                    <input id="hidden_show_modal" type="hidden" value="1" />
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <div class="form-group row">
                                                        <label for="profile_image" class="col-md-4 text-md-right">{{ __('Change Profile Picture') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="profile_image" type="file" accept=".jpg,.gif,.png" class="@error('profile_image') is-invalid @enderror" name="profile_image" value="@if($errors->any()){{{old('profile_image')}}} @endif">

                                                            @error('profile_image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if($errors->any()){{{old('name')}}} @else{{{$loggedUser->name}}} @endif" required autocomplete="name" autofocus>

                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if($errors->any()){{{old('email')}}} @else{{{$loggedUser->email}}} @endif" required autocomplete="email">

                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="@if($errors->any()){{{old('phone')}}} @else{{{$loggedUser->phone}}} @endif" required autocomplete="phone">

                                                            @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="old-password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="old-password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="old-password">
                                                            @error('old_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
