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
                    @isset($referral)
                        <div class="h3 text-center">
                            You were referred by <a href="{{ route('viewUser',$referral->id) }}">{{ $referral->name }}</a>.
                        </div>
                    @endisset
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <form method="POST" action="{{ route('referPost') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Refer Someone: </label>
                                        <div class="col-lg-8 col-xl-8">
                                            <input class="form-control form-control-lg form-control-solid" type="email" name="email" id="email" placeholder="Enter email address to refer">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-1 col-xl-1">
                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                @if ($refers->count() > 0)
                                <div class="h6 text-center col-12">
                                    Follow are your referrals.
                                </div>
                                @endif
                                <table class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Referred Email</th>
                                            <th scope="col">Referral Date</th>
                                            <th scope="col">Registered Name</th>
                                            <th scope="col">Registration Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($refers->count() > 0)
                                        @foreach ($refers as $refer)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>{{ $refer->email }}</td>
                                                <td>{{ $refer->created_at->isoFormat('YYYY/MM/DD') }}</td>
                                                @if($refer->registered)
                                                    <td>{{ $refer->user->name }}</td>
                                                    <td>{{ $refer->user->created_at->isoFormat('YYYY/MM/DD') }}</td>
                                                @else
                                                <td colspan="2" class="bg-light-warning text-center">Not Registered Yet</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center font-weight-bold">
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