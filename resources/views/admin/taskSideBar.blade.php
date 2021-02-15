<div class="col-lg-4">
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
                <span class="text-muted">{{ $task->sub_category->name }}({{ $task->sub_category->category->name }})</span>
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
            </div>
        </div>
    </div>
</div>
