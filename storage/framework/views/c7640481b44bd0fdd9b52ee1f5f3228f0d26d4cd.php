


<?php $__env->startSection('content'); ?>
    <?php
    $page_title = 'Account Setting';
    $profileAccountIsActive = 'true';
    ?>
    <div class="row">
        <?php echo $__env->make('admin.profile.userSideBar', $user, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-8">
            <div class="card card-custom">

                <?php if (\Illuminate\Support\Facades\Blade::check('onlyForRespectiveUser', $user->id)): ?>
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Change Password
                        </h3>
                    </div>
                </div>
                

                <div class="card-body">
                    <form action="<?php echo e(route('changePassword')); ?>" method="POST" id="changePassword">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Old Password: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid"
                                    placeholder="Old Password" name="old_password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">New Password: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid"
                                    placeholder="New Password" name="new_password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Confirm New Password: </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid"
                                    placeholder="Confirm New Password" name="cnew_password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12 col-xl-9 text-center">
                                <button class="btn btn-primary" onclick="validatePasswordAndGo()">Change</button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php endif; ?>
                

                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Change or Add Email
                        </h3>
                    </div>
                    <?php if (\Illuminate\Support\Facades\Blade::check('isVerified')): ?>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-sm btn-primary font-weight-bold" data-toggle="modal"
                            data-target="#addEmailModal">
                            Add Email
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">

                    <?php $__currentLoopData = $user->emails()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                <?php if($loop->first): ?>
                                    Email:
                                <?php endif; ?>
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <span class="form-control form-control-lg form-control-solid">
                                    <?php echo e($email->email); ?>

                                    <?php if($email->primary == true): ?>
                                        <?php echo $user->status == 'pending'
    ? '
                                        <span class="label label-warning label-pill label-inline mr-2 float-right">Not
                                            Verified</span>'
    : '
                                        <span
                                            class="label label-success label-pill label-inline mr-2 float-right">Verified</span>'; ?>

                                    <?php endif; ?>
                                </span>
                                <?php echo $user->status == 'pending'
    ? '<span class="form-text text-center"><a href="' .
        route('resendEmail') .
        '" class="text-muted">Resend
                                        Activation
                                        Email.</a></span>'
    : ''; ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <?php if (\Illuminate\Support\Facades\Blade::check('onlyForRespectiveUser', $user->id)): ?>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <a href="<?php echo e(route('deactivateUser')); ?>">
                                Deactivate your account
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="<?php echo e(route('deleteUser')); ?>">
                                Delete your account
                            </a>
                        </div>

                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (\Illuminate\Support\Facades\Blade::check('isVerified')): ?>
    <div class="modal fade" id="addEmailModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmail">Add Email Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="<?php echo e(route('addEmail')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email Address: </label>
                            <div class="col-lg-9 col-xl-9">
                                <input type="hidden" name="user" value="<?php echo e($user->id); ?>">
                                <input type="email" class="form-control form-control-lg form-control-solid"
                                    placeholder="Email Address" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-light-primary font-weight-bold" value="Add Email">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/pages/widgets.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/pages/custom/profile/profile.js')); ?>" type="text/javascript"></script>
    <script>
        function validatePasswordAndGo() {
            event.preventDefault();
            var oldPassword = document.getElementsByName('old_password')[0].value;
            var newPassword = document.getElementsByName('new_password')[0].value;
            var cnewPassword = document.getElementsByName('cnew_password')[0].value;
            if (!oldPassword) {
                toastr.error("Enter Old Password");
            } else if (!newPassword) {
                toastr.error("Enter New Password");
            } else if (!cnewPassword) {
                toastr.error("Enter Confirm Password");
            } else if (cnewPassword !== newPassword) {
                toastr.error("New and confirm password doesn't match.");
            } else {
                document.getElementById("changePassword").submit();
            }
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/profile/security.blade.php ENDPATH**/ ?>