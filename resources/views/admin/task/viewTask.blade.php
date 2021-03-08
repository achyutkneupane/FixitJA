{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')

    @php
    $page_title = 'Task Overview';
    @endphp

    <div class="row">

        @include('admin.task.taskSideBar', $task)

        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Created By: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ $task->createdBy->name }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Created For: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{!! isset($task->createdFor->name) ? $task->createdFor->name : '<span class="text-muted">N/A</span>' !!}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Working Location: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ $task->creator->city->name }}</span>
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
