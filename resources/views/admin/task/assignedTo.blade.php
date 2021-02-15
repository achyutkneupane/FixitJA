{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')

    <div class="row">

        @include('admin.task.taskSideBar', $task)

        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            Task Assigned To
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($task->assignedTo as $user)
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
            </div>
        </div>
    </div>

    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
