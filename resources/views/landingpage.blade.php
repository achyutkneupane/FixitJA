@extends('layouts.header')
@section('modern-css')
    <link href="css/modern-business.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
                        <div class="main-body">
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="

                                                " alt="Admin" class="rounded-circle object-fit-scale-down" width="150" height="150">
                                                <div class="mt-3">
                                                    <h4></h4>
                                                    <p class="text-secondary mb-1">Painter</p>
                                                    <p class="text-muted font-size-sm"></p>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                                                        Edit Profile
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
@endsection
