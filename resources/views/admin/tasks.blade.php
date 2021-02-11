{{-- Author: Achyut Neupane --}}

{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">
                Tasks
                <div class="text-muted pt-2 font-size-sm">
                    @if ($tasks->count() == 0)
                    No tasks
                    @elseif ($tasks->count() == 1)
                    1 task
                    @else
                    {{ $tasks->count() }} tasks
                    @endif
                </div>
            </h3>
        </div>
        @isAdmin
        <div class="card-toolbar">
            <a href="#" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
            </span>New Task</a>
        </div>
        @endisAdmin
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="datatable datatable-bordered datatable-head-custom text-center" id="kt_datatable">
            <thead>
                <tr>
                    <th title="ID">ID</th>
                    <th title="Created By">Created By</th>
                    <th title="Created For">Created For</th>
                    <th title="Description">Description</th>
                    <th title="Category">Category</th>
                    <th title="Date">Date</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($tasks as $task)
            	@php
            	if($task->status == 'completed'):
            		$tableColor = "table-success";
            	elseif ($task->status == 'new'):
            		$tableColor = "table-primary";
            	elseif ($task->status == 'pending'):
            		$tableColor = "table-danger";
            	elseif ($task->status == 'assigned'):
            		$tableColor = "table-warning";
            	else:
            		$tableColor = "";
            	endif;
            	@endphp
                <tr class="{{ $tableColor }}" style="transform: rotate(0);">
                    <td><a href="{{ route('viewTask', $task->id) }}" class="stretched-link" style="color: #000;">{{ $task->id }}</a></td>
                    <td>{{ $task->createdBy->name }}</td>
                    <td>{{ $task->createdFor->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->sub_category->name }}</td>
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
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
