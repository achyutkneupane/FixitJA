{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">
                Tasks
                <div class="text-muted pt-2 font-size-sm">{{ $tasks->count() }} tasks</div>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
            </span>New Task</a>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-7">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query"/>
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
                                    <option value="1">Completed</option>
                                    <option value="2">New</option>
                                    <option value="3">Pending</option>
                                    <option value="4">Assigned</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                <select class="form-control" id="kt_datatable_search_type">
                                    <option value="">All</option>
                                    <option value="1">N/A</option>
                                    <option value="2">Ready To Hire</option>
                                    <option value="3">Planning</option>
                                    <option value="4">Budgeting</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                    <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                </div>
            </div>
        </div>
        <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
            <thead>
                <tr>
                    <th>Task ID</th>
                    <th>Created By</th>
                    <th>Created For</th>
                    <th>Assigned By</th>
                    <th>Assigned To</th>
                    <th>Statuss</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Types</th>
                    <th>Deadline</th>
                    <th>Working Location</th>
                    <th>Client</th>
                    <th>Repairs Parts</th>
                    <th>Related Task</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->created_by }}</td>
                    <td>{{ $task->created_for }}</td>
                    <td>{{ $task->assigned_by }}</td>
                    <td>{{ $task->assigned_to }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->sub_category->name }}</td>
                    <td>{{ $task->type }}</td>
                    <td>{{ $task->deadline }}</td>
                    <td>{{ $task->working_location }}</td>
                    <td>{{ $task->is_client_on_site }}</td>
                    <td>{{ $task->is_repair_parts_provided }}</td>
                    <td>{{ $task->related_task_id }}</td>
                    <td>{{ $task->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
@endsection

@section('scripts')
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
