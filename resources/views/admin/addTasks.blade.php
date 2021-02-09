{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">
                Add New Task
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route('addTask') }}" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
            </span>New Task</a>
        </div>
    </div>
    <form class="form">
        <div class="card-body">
            <div class="form-group">
                <label>Created For:</label>
                <input type="name" class="form-control form-control-solid" placeholder="Created For"/>
            </div>
            <div class="form-group">
                <label>Email address:</label>
                <input type="email" class="form-control form-control-solid" placeholder="Enter email"/>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control form-control-solid selectpicker" name="status">
                    <option value="completed">Completed</option>
                    <option value="new">New</option>
                    <option value="pending">Pending</option>
                    <option value="assigned">Assigned</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="reset" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </form>
</div>

@endsection
