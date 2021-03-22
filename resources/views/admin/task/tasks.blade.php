{{-- Author: Achyut Neupane --}}

{{-- Extends layout --}}
@extends('layouts.app')
@php
$page_title = 'Tasks';
@endphp
{{-- Content --}}
@section('content')
    <div class="card card-custom">
        @if ($tasks->count() == 0)
            @php
                $page_description = 'No tasks';
            @endphp
        @elseif ($tasks->count() == 1)
            @php
                $page_description = '1 task';
            @endphp
        @else
            @php
                $page_description = $tasks->count() . ' tasks';
            @endphp
        @endif
        </h3>

        @isAdmin
        @php
            $subhead_button = [['link' => route('createProject'), 'text' => 'New Task', 'class' => 'primary']];
        @endphp
        @endisAdmin
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
                                        <option value="completed">Completed</option>
                                        <option value="new">New</option>
                                        <option value="pending">Pending</option>
                                        <option value="assigned">Assigned</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="N/A">N/A</option>
                                        <option value="ready to hire">Ready To Hire</option>
                                        <option value="planning">Planning</option>
                                        <option value="budgeting">Budgeting</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin: Datatable-->
            <table class="datatable datatable-bordered table-striped table-hover datatable-head-custom text-center"
                id="kt_datatable">
                <thead>
                    <tr>
                        <th title="ID" style="width:5%;">ID</th>
                        <th title="Name" style="width:15%;">Name</th>
                        <th title="Status" style="width:10%;">Status</th>
                        <th title="Type" style="width:10%;">Type</th>
                        <th title="Created For" style="width:15%;">Created For</th>
                        <th title="Address" style="width:15%;">Address</th>
                        <th title="Category" style="width:15%;">Category</th>
                        <th title="Date" style="width:15%;">Date</th>
                        <th title="Date" style="width:15%;">Date</th>
                        <th title="Role" style="width:5%;">Role</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>
                                <a href="{{ route('viewTask', $task->id) }}">
                                    {{ ucwords($task->name) }}
                                </a>
                            </td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->type }}</td>
                            <td>{!! isset($task->createdFor->name) ? $task->createdFor->name : '<span class="text-muted">N/A</span>' !!}</td>
                            <td>{!! $task->creator->city->name !!}</td>
                            <td></td>
                            {{-- <td>{{ ucwords($task->sub_category->name) }}</td> --}}
                            <td>{{ $task->created_at->diffForHumans() }}</td>
                            

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
    <script src="{{ asset('js/custom/custom_task_datatable.js') }}" type="text/javascript"></script>
@endsection
