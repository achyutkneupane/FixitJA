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
                <br>
                @isAdmin
                <a href="#" class="font-weight-bold" data-toggle="modal" data-target="#changeUserStatus">
                    Change Status
                </a>
                @endisAdmin
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
            @if ($user->type == 'admin' || $user->type == 'individual_contractor')
                <a href="#"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileDocumentIsActive) ? 'active' : '' }}">User
                    Documents</a>
            @endif
            <a href="{{ Auth::user()->id === $user->id ? route('accountSecurity') : route('viewAccountSecurity', $user->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileAccountIsActive) ? 'active' : '' }}">Account
                Settings</a>
            @if ($user->type == 'admin' || $user->type == 'individual_contractor')
                <a href="#"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profilePaymentIsActive) ? 'active' : '' }}">Payment
                    Details</a>
                <a href="#"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileReferenceIsActive) ? 'active' : '' }}">References</a>

            @endif
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
@isAdmin
<div class="modal fade" id="changeUserStatus" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeUserStatus">Change User Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('changeStatus') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Status: </label>
                        <div class="col-lg-9 col-xl-9">
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <select class="form-control selectpicker" name="status">
                                <option value="active">Active</option>
                                <option value="suspended">Suspend</option>
                                <option value="blocked">Block</option>
                                <option value="deactivated">Deactivate</option>
                                <option value="deleted">Delete</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-light-primary font-weight-bold" value="Change">
                </div>
            </form>
        </div>
    </div>
</div>
@endisAdmin
