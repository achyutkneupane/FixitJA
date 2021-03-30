{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')

    @php
    $page_title = 'Task Overview';
    $taskOverviewIsActive = 'true';
    if($task->user_equal_working)
        $location = $task->creator;
    else
        $location = $task->location;
    $subhead_button = [['link' => route('editTask',$task->id), 'text' => 'Edit Task', 'class' => 'primary']];
    @endphp
    <div class="row">

        @include('admin.task.taskSideBar', $task)

        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Creator Details
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Name: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ $task->creator->name }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid"><a href="mailto:{{ $task->creator->email }}">{{ $task->creator->email }}</a></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Contact: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid"><a href="tel:{{ $task->creator->phone }}">{{ $task->creator->phone }}</a></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ $task->creator->city->name }}, {{ $task->creator->city->parish->name }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Street Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ $task->creator->street_01 }}</span>
                            @isset($task->creator->street_02)
                            <span
                                class="form-control form-control-lg form-control-solid mt-4">{{ $task->creator->street_02 }}</span>
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Task Details
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Created For: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{!! isset($task->createdFor->name) ? $task->createdFor->name : '<span class="text-muted">Not Assigned Yet</span>' !!}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Working Location: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ $location->city->name }}, {{ $location->city->parish->name }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Street Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ $location->street_01 }}</span>
                            @isset($location->street_02)
                            <span
                                class="form-control form-control-lg form-control-solid mt-4">{{ $location->street_02 }}</span>
                            @endisset
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Payment Type: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ ucwords($task->payment_type) }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Project Deadline: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ ucwords($task->deadline) }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Client: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                @if ($task->is_client_on_site == 1)
                                    On Site
                                @elseif ($task->is_client_on_site == 0)
                                    Not On Site
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Repair Parts: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                @if ($task->is_repair_parts_provided == 1)
                                    Provided
                                @elseif ($task->is_client_on_site == 0)
                                    Not Provided
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}" type="text/javascript"></script>
@endsection
