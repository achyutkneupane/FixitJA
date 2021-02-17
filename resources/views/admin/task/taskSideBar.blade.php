{{-- Author: Achyut Neupane --}}
<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Body-->
        <div class="card-body pt-15">
            <!--begin::User-->
            <div class="mb-10">
                <h4 class="font-weight-bold my-2">Task Detail</h4>
                <div class="text-muted mb-6">Task Id: {{ $task->id }}</div>
                @if (isset($task->related_task_id))
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold">Related Task:</span>
                        <span class="text-muted">
                            <a href="{{ route('viewTask', $task->related_task_id) }}">
                                {{ $task->related_task_id }}
                            </a>
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
                    <span
                        class="text-muted">{{ $task->sub_category->name }}({{ $task->sub_category->category->name }})</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold">Created:</span>
                    <span class="text-muted">{{ $task->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <!--end::User-->
            <!--begin::Nav-->
            <a href="{{ route('viewTask', $task->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 btn-block active">
                Task Overview
            </a>
            <a href="{{ route('taskAssignedBy', $task->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 btn-block active">
                Assigned By
            </a>
            <a href="{{ route('taskAssignedTo', $task->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 btn-block active">
                Assigned To
            </a>
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
