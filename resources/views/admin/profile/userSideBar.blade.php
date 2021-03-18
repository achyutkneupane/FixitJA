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
                @isAdminOrUser($user->id)
                <a href="#" class="font-weight-bold" data-toggle="modal" data-target="#changeUserStatus">
                    Change Status
                </a>
                @endisAdminOrUser
            </div>
            <!--end::User-->
            <!--begin::Contact-->
            <div class="mb-5 text-center">
                @if(!empty($user->facebook))
                <a href="{{ $user->facebook }}" class="btn btn-icon btn-circle btn-light-facebook mr-2" target="_blank">
                    <i class="socicon-facebook"></i>
                </a>
                @endif
                @if(!empty($user->twitter))
                <a href="{{ $user->twitter }}" class="btn btn-icon btn-circle btn-light-twitter mr-2" target="_blank">
                    <i class="socicon-twitter"></i>
                </a>
                @endif
                @if(!empty($user->instagram))
                <a href="{{ $user->instagram }}" class="btn btn-icon btn-circle btn-light-instagram" target="_blank">
                    <i class="socicon-instagram"></i>
                </a>
                @endif
            </div>
            @onlyForRespectiveUser($user->id)
            <div class="mb-5 text-center">
                <a href="#" class="font-weight-bold" data-toggle="modal" data-target="#changeSocialLinks">
                    Change Links
                </a>
            </div>
            @endonlyForRespectiveUser
            <!--end::Contact-->
            <!--begin::Nav-->
            <a href="{{ Auth::user()->id === $user->id ? route('viewProfile') : route('viewUser', $user->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileIsActive) ? 'active' : '' }}">User
                Information</a>
            @userIsContractor($user)
                <a href="{{ Auth::user()->id === $user->id ? route('viewDocuments') : route('viewUserDocuments', $user->id) }}"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileDocumentIsActive) ? 'active' : '' }}">User
                    Documents</a>
                <a href="{{ Auth::user()->id === $user->id ? route('profileSkills') : route('userSkills', $user->id) }}"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileSkillIsActive) ? 'active' : '' }}">Skills</a>
                <a href="{{ Auth::user()->id === $user->id ? route('viewEducations') : route('viewUserEducations', $user->id) }}"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileEducationIsActive) ? 'active' : '' }}">Education</a>
                <a href="{{ Auth::user()->id === $user->id ? route('viewReferences') : route('viewUserReferences', $user->id) }}"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileReferenceIsActive) ? 'active' : '' }}">References</a>
                {{-- <a href="#"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profilePaymentIsActive) ? 'active' : '' }}">Payment
                    Details</a> --}}
            @enduserIsContractor
            <a href="{{ Auth::user()->id === $user->id ? route('accountSecurity') : route('viewAccountSecurity', $user->id) }}"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block {{ !empty($profileAccountIsActive) ? 'active' : '' }}">Account
                Settings</a>

            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
@isAdminOrUser($user->id)
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
                                @isAdmin
                                <option value="active">Active</option>
                                <option value="suspended">Suspend</option>
                                <option value="blocked">Block</option>
                                @endisAdmin
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
@endisAdminOrUser

@onlyForRespectiveUser($user->id)
<div class="modal fade" id="changeSocialLinks" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeSocialLinks">Change Social Links</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('putEditSocial') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Facebook: </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="facebook" value="{{ $user->facebook }}" placeholder="Facebook Link">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Twitter: </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="twitter" value="{{ $user->twitter }}" placeholder="Twitter Link">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Instagram: </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="instagram" value="{{ $user->instagram }}" placeholder="Instagram Link">
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
@endonlyForRespectiveUser