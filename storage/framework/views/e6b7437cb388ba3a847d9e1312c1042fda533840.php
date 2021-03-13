
<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Body-->
        <div class="card-body pt-15">
            <!--begin::User-->
            <div class="text-center mb-10">
                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                    <div class="symbol-label"
                        style="background-image:url('<?php echo e(!empty($user->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . $user->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png')); ?>')">
                    </div>
                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                </div>
                <h4 class="font-weight-bold my-2"><?php echo e(ucwords($user->name)); ?></h4>
                <div class="text-muted mb-2"><?php echo e($user->userType()); ?></div>
                <span
                    class="label label-light-<?php echo e($user->userStatus()['class']); ?> label-inline font-weight-bold label-lg"><?php echo e($user->userStatus()['name']); ?></span>
                <br>
                <?php if (\Illuminate\Support\Facades\Blade::check('isAdmin')): ?>
                <a href="#" class="font-weight-bold" data-toggle="modal" data-target="#changeUserStatus">
                    Change Status
                </a>
                <?php endif; ?>
            </div>
            <!--end::User-->
            <!--begin::Contact-->
            
            <!--end::Contact-->
            <!--begin::Nav-->
            <a href="<?php echo e(Auth::user()->id === $user->id ? route('viewProfile') : route('viewUser', $user->id)); ?>"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block <?php echo e(!empty($profileIsActive) ? 'active' : ''); ?>">User
                Information</a>
            <?php if (\Illuminate\Support\Facades\Blade::check('userIsContractor', $user)): ?>
                <a href="<?php echo e(Auth::user()->id === $user->id ? route('viewDocuments') : route('viewUserDocuments', $user->id)); ?>"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block <?php echo e(!empty($profileDocumentIsActive) ? 'active' : ''); ?>">User
                    Documents</a>
                <a href="<?php echo e(Auth::user()->id === $user->id ? route('profileSkills') : route('userSkills', $user->id)); ?>"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block <?php echo e(!empty($profileSkillIsActive) ? 'active' : ''); ?>">Skills</a>
                <a href="<?php echo e(Auth::user()->id === $user->id ? route('viewEducations') : route('viewUserEducations', $user->id)); ?>"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block <?php echo e(!empty($profileEducationIsActive) ? 'active' : ''); ?>">Education</a>
                <a href="<?php echo e(Auth::user()->id === $user->id ? route('viewReferences') : route('viewUserReferences', $user->id)); ?>"
                    class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block <?php echo e(!empty($profileReferenceIsActive) ? 'active' : ''); ?>">References</a>
                
            <?php endif; ?>
            <a href="<?php echo e(Auth::user()->id === $user->id ? route('accountSecurity') : route('viewAccountSecurity', $user->id)); ?>"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block <?php echo e(!empty($profileAccountIsActive) ? 'active' : ''); ?>">Account
                Settings</a>

            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
<?php if (\Illuminate\Support\Facades\Blade::check('isAdmin')): ?>
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
            <form action="<?php echo e(route('changeStatus')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Status: </label>
                        <div class="col-lg-9 col-xl-9">
                            <input type="hidden" name="user" value="<?php echo e($user->id); ?>">
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
<?php endif; ?>
<?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/profile/userSideBar.blade.php ENDPATH**/ ?>