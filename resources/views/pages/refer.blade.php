{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
@php
    $page_title = "Referrals";
@endphp
<div class="container jumbotron">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->referral)
                        <div class="h3 text-center">
                            You were referred by <a href="{{ route('viewUser',auth()->user()->referral->id) }}">{{ auth()->user()->referral->name }}</a>.
                        </div>
                    @endif
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Refer Someone: </label>
                                    <div class="col-lg-8 col-xl-8">
                                        <input class="form-control form-control-lg form-control-solid" type="email" name="email" id="email" placeholder="Enter email address to refer">
                                    </div>
                                    <div class="col-lg-1 col-xl-1">
                                        <button class="btn btn-primary" type="button">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                @if (auth()->user()->refers->count() > 0)
                                <div class="h6 text-center col-12">
                                    Follow are your referrals.
                                </div>
                                @endif
                                <table class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Referred Name</th>
                                            <th scope="col">Referred Email</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (auth()->user()->refers->count() > 0)
                                        @foreach (auth()->user()->refers as $refer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $refer->name }}</td>
                                                <td>{{ $refer->email }}</td>
                                                <td>{{ $refer->created_at->isoFormat() }}</td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="3" class="text-center font-weight-bold">
                                                No referrals till now.
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection