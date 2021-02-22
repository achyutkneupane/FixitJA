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
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                        id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">All</option>
                                        <option value="pending">Pending</option>
                                        <option value="active">Active</option>
                                        <option value="suspended">Suspended</option>
                                        <option value="blocked">Blocked</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Role:</label>
                                    <select class="form-control" id="kt_datatable_search_role">
                                        <option value="">All</option>
                                        <option value="admin">Admin</option>
                                        <option value="individual_contractor">Individual Contractor</option>
                                        <option value="business">Business</option>
                                        <option value="general_user">User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin: Datatable-->
            <table class="datatable datatable-bordered datatable-head-custom text-center" id="kt_datatable">
                <thead>
                    <tr>
                        <th title="ID">ID</th>
                        <th title="Name">Name</th>
                        <th title="Status">Status</th>
                        <th title="Role">Role</th>
                        <th title="Email">Email</th>
                        <th title="Phone">Phone</th>
                        <th title="Address">Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                <a href="{{ route('viewUser', $user->id) }}">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{!! !empty($user->city->name) ? $user->city->name : "<span class='text-muted'>N/A</span>"
                                !!}</td>
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
    <script src="{{ asset('js/custom/custom_user_datatable.js') }}" type="text/javascript"></script>
@endsection
