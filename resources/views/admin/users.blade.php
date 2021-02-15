{{-- Author: Achyut Neupane --}}

{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">
                Users
                <div class="text-muted pt-2 font-size-sm">
                    @if ($users->count() == 0)
                    No users
                    @elseif ($users->count() == 1)
                    1 user
                    @else
                    {{ $users->count() }} users
                    @endif
                </div>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
            </span>New User</a>
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="datatable datatable-bordered datatable-head-custom text-center" id="kt_datatable">
            <thead>
                <tr>
                    <th title="ID">ID</th>
                    <th title="Name">Name</th>
                    <th title="Role">Role</th>
                    <th title="Email">Email</th>
                    <th title="Address">Address</th>
                    <th title="Verified">Verified</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($users as $user)
            	@php
            	if ($user->status == 'pending'):
            		$tableColor = "table-primary";
            	elseif ($user->status == 'blocked'):
            		$tableColor = "table-danger";
            	elseif ($user->status == 'suspended'):
            		$tableColor = "table-warning";
            	else:
            		$tableColor = "";
            	endif;
            	@endphp
                <tr class="{{ $tableColor }}" style="transform: rotate(0);">
                    <td><a href="{{ route('viewUser', $user->id) }}" class="stretched-link" style="color: #000;">{{ $user->id }}</a></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role() }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->city->name }}</td>
                    <td>{{ $user->isVerified() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
