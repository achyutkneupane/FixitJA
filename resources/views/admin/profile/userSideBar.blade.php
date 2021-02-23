{{-- Author: Achyut Neupane --}}
<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Body-->
        <div class="card-body pt-15">
            <!--begin::User-->
            <div class="text-center mb-10">
                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                    <div class="symbol-label"
                        style="background-image:url('{{ !empty($user->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . $user->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png') }}')">
                    </div>
                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                </div>
                <h4 class="font-weight-bold my-2">{{ ucwords($user->name) }}</h4>
                <div class="text-muted mb-2">{{ $user->userType() }}</div>
                <span
                    class="label label-light-{{ $user->userStatus()['class'] }} label-inline font-weight-bold label-lg">{{ $user->userStatus()['name'] }}</span>
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
            <a href="{{ Auth::user()->id === $user->id ? route('viewProfile') : route('viewUser', $user->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileIsActive) ? 'active' : '' }}">User
                Information</a>
            @isAdminOrContractor
            <a href="#"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileDocumentIsActive) ? 'active' : '' }}">User
                Documents</a>
            @endisAdminOrContractor
            <a href="{{ route('accountSecurity') }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileAccountIsActive) ? 'active' : '' }}">Account
                Settings</a>
            @isAdminOrContractor
            <a href="#"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profilePaymentIsActive) ? 'active' : '' }}">Payment
                Details</a>
            <a href="#"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileReferenceIsActive) ? 'active' : '' }}">References</a>
            @endisAdminOrContractor
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
