{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')

    @php
    $page_title = 'Edit Task';
    $taskOverviewIsActive = 'true';
    if($task->user_equal_working)
        $location = $task->creator;
    else
        $location = $task->location;
    @endphp
    @if(!empty($task->creator->city->name))
    <script>
    var cityId = {{ $task->creator->city->id }};
    </script>
    @else
    <script>
        var cityId = '';
    </script>
    @endif
    @if(!empty($task->location->city->name))
    <script>
    var workingCityId = {{ $task->location->city->id }};
    </script>
    @else
    <script>
        var cityId = '';
    </script>
    @endif
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
                    <form method="post" action="{{ route('editTaskCreator',$task->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Name: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid" name="creator_name" value="{{ $task->creator->name }}" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid" name="creator_email" value="{{ $task->creator->email }}" placeholder="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Contact: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid" name="creator_phone" value="{{ $task->creator->phone }}" placeholder="Contact Number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Address: </label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control form-control-lg form-control-solid select2" id="userParishSelect" name="parish" required>
                                    <option label=""></option>
                                    @foreach($parishes as $parish)
                                    <option value="{{ $parish->id }}"{{ !empty($task->creator->city->parish) && $parish->id == $task->creator->city->parish->id ? ' selected' : '' }}>
                                        {{ $parish->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <br><br>
                                <select class="form-control form-control-lg form-control-solid select2" id="userCitySelect" name="city" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Street Address: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid" name="creator_street_01" value="{{ $task->creator->street_01 }}" placeholder="Street Address 1" required>
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid mt-5" name="creator_street_02" value="{{ $task->creator->street_02 }}" placeholder="Street Address 2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label"></label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Task Details
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('editTaskDetails',$task->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Project Type: </label>
                            <div class="col-lg-9 col-xl-6">
                                <select name="type" class="form-control form-control-solid form-control-lg">
                                    <option value=""{{ $task->type == NULL ? ' selected' : '' }}>Select Project Type</option>
                                    <option value="ready to hire"{{ $task->type == "ready to hire" ? ' selected' : '' }}>Ready To Hire</option>
                                    <option value="planning"{{ $task->type == "planning" ? ' selected' : '' }}>Required Planning and Budgeting</option>
                                    <option value="N/A"{{ $task->type == "N/A" ? ' selected' : '' }}>Not Sure Yet</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Working Location: </label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control form-control-lg form-control-solid select2" id="workingParishSelect" name="parish" required>
                                    <option label=""></option>
                                    @foreach($parishes as $parish)
                                    <option value="{{ $parish->id }}"{{ !empty($task->creator->city->parish) && $parish->id == $task->creator->city->parish->id ? ' selected' : '' }}>
                                        {{ $parish->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <br><br>
                                <select class="form-control form-control-lg form-control-solid select2" id="workingCitySelect" name="city" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Street Address: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid" name="street_01" value="{{ $task->location->street_01 }}" placeholder="Street Address 1" required>
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid mt-5" name="street_02" value="{{ $task->location->street_02 }}" placeholder="Street Address 2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Payment Type: </label>
                            <div class="col-lg-9 col-xl-6">
                                <select name="payment_type" class="form-control form-control-lg form-control-solid">
                                    <option value="" disabled{{ $task->payment_type == NULL ? ' selected' : '' }}>Select Payment Type</option>
                                    <option value="project basis"{{ $task->payment_type == "project basis" ? ' selected' : '' }}>Project Basis</option>
                                    <option value="hourly basis"{{ $task->payment_type == "hourly basis" ? ' selected' : '' }}>Hourly Basis</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Project Deadline: </label>
                            <div class="col-lg-9 col-xl-6">
                                <select name="deadline" class="form-control form-control-solid form-control-lg">
                                    <option value="" disabled{{ $task->deadline == NULL ? ' selected' : '' }}>Select Project Deadline</option>
                                    <option value="flexible"{{ $task->deadline == "flexible" ? ' selected' : '' }}>Flexible</option>
                                    <option value="asap"{{ $task->deadline == "asap" ? ' selected' : '' }}>ASAP</option>
                                    <option value="within a week"{{ $task->deadline == "within a week" ? ' selected' : '' }}>Within A Week</option>
                                    <option value="within 2 weeks"{{ $task->deadline == "within 2 weeks" ? ' selected' : '' }}>Within Two Weeks</option>
                                    <option value="within a month"{{ $task->deadline == "within a month" ? ' selected' : '' }}>Within A Month</option>
                                    <option value="more than a month"{{ $task->deadline == "more than a month" ? ' selected' : '' }}>More Than A Month</option>
                                    <option value="N/A"{{ $task->deadline == "N/A" ? ' selected' : '' }}>Not Sure Yet</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Are you on site while working? </label>
                            <div class="col-lg-9 col-xl-6">
                                <select name="is_client_on_site" class="form-control form-control-solid form-control-lg">
                                    <option value="1"{{ $task->is_client_on_site ? ' selected' : '' }}>Yes</option>
                                    <option value="0"{{ !$task->is_client_on_site ? ' selected' : '' }}>No</option>
                                    <option value="NULL"{{ $task->is_client_on_site == NULL ? ' selected' : '' }}>Not Sure Yet</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Are repair parts provided? </label>
                            <div class="col-lg-9 col-xl-6">
                                <select name="is_repair_parts_provided" class="form-control form-control-solid form-control-lg">
                                    <option value="1"{{ $task->is_repair_parts_provided ? ' selected' : '' }}>Yes</option>
                                    <option value="0"{{ !$task->is_repair_parts_provided ? ' selected' : '' }}>No</option>
                                    <option value="NULL"{{ $task->is_repair_parts_provided == NULL ? ' selected' : '' }}>Not Sure Yet</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label"></label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script
    src="{{ asset('js/custom/parish-city-select.js') }}" type="text/javascript">
</script>
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}" type="text/javascript"></script>
@endsection
