<div class="col-lg-4">
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    {{ ucwords($user->name) }}
                    <div class="text-muted pt-2 font-size-sm">
                    </div>
                </h3>
            </div>
            <div class="card-toolbar">
                <img src="
                    @if(!is_null($user->documents->where('type', 'profile_picture')->first()))
                    {{ asset('storage/'. $user->documents->where('type', 'profile_picture')->first()->path) }}
                    @else
                    {{ asset('images/unknown-avatar.png') }}
                    @endif
                " class="rounded-circle object-fit-scale-down" width="100" height="100">
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="font-weight-bold">Email:</span>
                <span class="text-muted">{{ $user->email }}</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="font-weight-bold">Phone:</span>
                <span class="text-muted">{{ $user->phone }}</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="font-weight-bold">Gender:</span>
                <span class="text-muted">{{ $user->gender }}</span>
            </div>

            <div class="navi navi-bold navi-hover navi-active navi-link-rounded mt-5">
                <div class="navi-item mb-2">
                    <a href="{{ route('viewUser', $user->id) }}" class="navi-link py-4">
                        <span class="navi-text font-size-lg">User Overview</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
