{{-- Author: Achyut Neupane --}}
<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Body-->
        <div class="card-body pt-15">
            <!--begin::User-->
            <div class="mb-10">
                <h4 class="font-weight-bold my-2">{{ ucwords($task->name) }}</h4>
                <div class="text-muted mb-6">Task Id: {{ $task->id }}</div>
                @if ($task->related_tasks()->count() != 0)
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold">Related Tasks:</span>
                        <span class="text-muted text-right">
                            @foreach ($task->relatedTasks() as $relTask)
                            @if ($loop->last)
                                <a href="{{ route('viewTask', $relTask->id) }}">
                                    {{ $relTask->name }}
                                </a>({{ ucwords($relTask->category()->name) }})
                            @else
                                <a href="{{ route('viewTask', $relTask->id) }}">
                                    {{ $relTask->name }}
                                </a>({{ ucwords($relTask->category()->name) }})<br>
                            @endif
                            @endforeach
                        </span>
                    </div>
                @endif
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold">Status:</span>
                    <span class="text-muted">{{ ucwords($task->status) }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold">Type:</span>
                    <span class="text-muted">{{ ucwords($task->type) }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold">Category:</span>
                    <span class="text-muted">{{ ucwords($task->category()->name) }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold">Sub-Categories:</span>
                    <span class="text-muted">
                        @foreach ($task->subCategories()->get() as $subs)
                        @if($loop->last)
                            {{ ucwords($subs->name) }}
                        @else
                            {{ ucwords($subs->name) }},
                        @endif
                        @endforeach
                    </span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold">Created:</span>
                    <span class="text-muted">{{ $task->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <!--end::User-->
            <!--begin::Nav-->
            <a href="{{ route('viewTask', $task->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 btn-block {{ !empty($taskOverviewIsActive) ? 'active' : '' }}">
                Task Overview
            </a>
            <a href="{{ route('taskAssignedBy', $task->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 btn-block {{ !empty($taskAssignedByIsActive) ? 'active' : '' }}">
                Assigned By
            </a>
            <a href="{{ route('taskAssignedTo', $task->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 btn-block {{ !empty($taskAssignedToIsActive) ? 'active' : '' }}">
                Assigned To
            </a>
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
