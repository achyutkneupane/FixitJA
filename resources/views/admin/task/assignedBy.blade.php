{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'Task Assigned By';
    $taskAssignedByIsActive = 'true';
    @endphp
    <div class="row">

        @include('admin.task.taskSideBar', $task)

        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    @if($task->assignedBy->count() != 0)
                    @foreach ($task->assignedBy as $user)
                        @if ($loop->odd)
                            <div class="form-group row">
                        @endif
                        <div class="col-lg-6 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">{{ $user->name }}</span>
                        </div>
                        @if ($loop->even || $loop->last)
                </div>
                @endif
                @endforeach
                @else
                <h3 class="text-center">
                    Task has not been assigned to anyone.
                </h3>
                @endif
            </div>
        </div>
    </div>

    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
