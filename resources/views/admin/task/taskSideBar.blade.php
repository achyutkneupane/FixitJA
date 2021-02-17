<!-- <div class="col-lg-4">
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Task Detail
                    <div class="text-muted pt-2 font-size-sm">
                        Task Id: {{ $task->id }}
                    </div>
                </h3>
            </div>
        </div>
        <div class="card-body">
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

            <div class="navi navi-bold navi-hover navi-active navi-link-rounded mt-5">
                <div class="navi-item mb-2">
                    <a href="{{ route('viewTask', $task->id) }}" class="navi-link py-4">
                        <span class="navi-text font-size-lg">Task Overview</span>
                    </a>
                </div>
                <div class="navi-item mb-2">
                    <a href="{{ route('taskAssignedBy', $task->id) }}" class="navi-link py-4">
                        <span class="navi-text font-size-lg">Assigned By</span>
                    </a>
                </div>
                <div class="navi-item mb-2">
                    <a href="{{ route('taskAssignedTo', $task->id) }}" class="navi-link py-4">
                        <span class="navi-text font-size-lg">Assigned To</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Body-->
        <div class="card-body pt-15">
            <!--begin::User-->
            <div class="text-center mb-10">
                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                    <div class="symbol-label" style="background-image:url('/metronic/theme/html/demo1/dist/assets/media/users/300_21.jpg')"></div>
                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                </div>
                <h4 class="font-weight-bold my-2">James Jones</h4>
                <div class="text-muted mb-2">Application Developer</div>
                <span class="label label-light-warning label-inline font-weight-bold label-lg">Active</span>
            </div>
            <!--end::User-->
            <!--begin::Contact-->
            <div class="mb-10 text-center">
                <a href="#" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                    <i class="socicon-facebook"></i>
                </a>
                <a href="#" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                    <i class="socicon-twitter"></i>
                </a>
                <a href="#" class="btn btn-icon btn-circle btn-light-google">
                    <i class="socicon-google"></i>
                </a>
            </div>
            <!--end::Contact-->
            <!--begin::Nav-->
            <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block active">Profile Overview</a>
            <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Personal info</a>
            <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Account Info</a>
            <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Change Passwort</a>
            <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Email Settings</a>
            <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Saved Credit Cards</a>
            <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Tax information</a>
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
