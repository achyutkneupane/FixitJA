{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'Working Hours';
    $taskWorkingIsActive = 'true';
    @endphp
    <div class="row">
        @include('admin.task.taskSideBar', $task)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    <form method="POST" action="{{ route('postWorking',$task->id) }}" id="workingForm">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="start_time">Start Date & Time</label>
                                <div class="input-group timepicker">
                                    <input type="text" class="form-control" id="start_date" name="start_date" readonly placeholder="Start date"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <input class="form-control" id="start_time" name="start_time" readonly placeholder="Start time" type="text"/>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="start_time">End Date & Time</label>
                                <div class="input-group timepicker">
                                    <input type="text" class="form-control" id="end_date" name="end_date" readonly placeholder="End Date"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <input class="form-control" id="end_time" name="end_time" readonly placeholder="End time" type="text"/>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="workingText" name="discussion-text" style="height: 120px"></div>
                            <input type="hidden" name="workingText">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary mt-3 w-25" onclick="saveDescription()">Save</button>
                        </div>
                    </form>
                    @if ($hours->count() > 0)
                    <div class="container">
                        @foreach ($hours as $hour)
                        <div class="row p-3 my-3 border">
                            <div class="col-10 col-sm-11">
                                <span>
                                    <a class="h4 font-weight-bolder" href="{{ route('viewUser',$hour->user->id) }}">
                                        {{ $hour->user->name }}
                                    </a>
                                {{-- @isTaskCreator($task->id,$work->user->id)
                                    <span class="text-muted">(Creator)</span>
                                @endisTaskCreator --}}
                                </span>
                                <p class="text-muted">{{ \Carbon\Carbon::parse($hour->start_time)->isoFormat('YYYY/MM/DD hh:mm A') }} to {{ \Carbon\Carbon::parse($hour->end_time)->isoFormat('YYYY/MM/DD hh:mm A') }}</p>
                            </div>
                            <div class="col-12">
                                <p class="mx-5">
                                    {!! $hour->description !!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center h5 text-muted">
                        No works till now.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        var quill = new Quill('#workingText', {
            modules: {
                toolbar: [
                    [{ 'font': [] }],
                    [{
                        header: [1, 2, 3, 4, 5, false]
                    }],
                    [{ 'list': 'bullet' },{ 'list': 'ordered'},{ 'color': [] }],
                    ['bold', 'italic', 'underline'],
                    ['link','code-block']
                ]
            },
            placeholder: 'Enter your work description.............',
            theme: 'snow' // or 'bubble'
        });
        jQuery(document).ready(function() {
            $('#start_time, #end_time').timepicker({
                minuteStep: 1,
                defaultTime: 'NOW()',
                showSeconds: false,
                showMeridian: true,
                snapToStep: false
            }).init();
            var arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
                };
            $('#start_date, #end_date').datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows
            }).init();
            });
    </script>
    <script src="{{ asset('js/custom/create-working-hour-validation.js') }}" type="text/javascript"></script>
@endsection
