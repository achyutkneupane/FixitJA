{{-- Author: Achyut Neupane --}}
<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Body-->
        <div class="card-body pt-15">
            <!--begin::User-->
            <div class="mb-10">
                <div class="row">
                    <div class="col-12">
                        <h4 class="float-left font-weight-bold my-2">{{ ucwords($user->name) }}</h4>
                        <div class="float-right">
                            <img src="
                        @if (!is_null($user->documents->where('type',
                            'profile_picture')->first())) {{ asset('storage/' . $user->documents->where('type', 'profile_picture')->first()->path) }}
                        @else
                            {{ asset('images/unknown-avatar.png') }} @endif
                            " class="rounded-circle object-fit-scale-down" width="100" height="100">
                        </div>
                    </div>
                </div>
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
                    <span class="text-muted">{{ ucwords($user->gender) }}</span>
                </div>
            </div>
            <!--end::User-->
            <!--begin::Nav-->
            <a href="{{ Auth::user()->id === $user->id ? route('viewProfile') : route('viewUser', $user->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 btn-block active">
                User Overview
            </a>
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
