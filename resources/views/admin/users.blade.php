{{-- Author: Achyut Neupane --}}

{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')
    @php
    $page_title = 'User List';
    $subhead_button = [['class' => 'primary', 'text' => 'New User', 'link' => '#']];

    @endphp
    @if ($users->count() == 0)
        @php
            $page_description = 'No users';
        @endphp
    @elseif ($users->count() == 1)
        @php
            $page_description = '1 user';
        @endphp
    @else
        @php
            $page_description = $users->count() . ' users';
        @endphp
    @endif
    <div class="card card-custom">
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
                                $tableColor = 'table-primary';
                            elseif ($user->status == 'blocked'):
                                $tableColor = 'table-danger';
                            elseif ($user->status == 'suspended'):
                                $tableColor = 'table-warning';
                            else:
                                $tableColor = '';
                            endif;
                        @endphp
                        <tr class="{{ $tableColor }}" style="transform: rotate(0);">
                            <td><a href="{{ route('viewUser', $user->id) }}" class="stretched-link"
                                    style="color: #000;">{{ $user->id }}</a></td>
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
