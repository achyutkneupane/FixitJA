


<?php $__env->startSection('content'); ?>
    <?php
    $profileIsActive = 'true';
    ?>
    <?php if(Auth::user()->id == $user->id): ?>
        <?php
            $page_title = 'Edit Profile';
        ?>
    <?php else: ?>
        <?php
            $page_title = 'Edit User';
        ?>
    <?php endif; ?>
    <div class="row">
        <?php echo $__env->make('admin.profile.userSideBar', $user, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Gender: </label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" name="gender"
                                value="<?php echo e($user->gender); ?>" placeholder="Gender">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control select2" id="kt_select2_1" name="address">
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city->id); ?>">
                                        <?php echo e($city->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Street : </label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" name="street_01"
                                value="<?php echo e($user->street_01); ?>" placeholder="Street Address"><br>
                            <input class="form-control form-control-lg form-control-solid" name="street_02"
                                value="<?php echo e($user->street_02); ?>" placeholder="Street Address 2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Company Name: </label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" name="companyname"
                                value="<?php echo e($user->companyname); ?>" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Experience: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo !empty($user->experience) ? $user->experience : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Website: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo !empty($user->website) ? '<a href="' . $user->website . '">' . $user->website . '</a>' : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Is willing to travel to work?</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php if($user->is_travelling == 1): ?>
                                    Yes
                                <?php else: ?>
                                    No
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Has Police report?</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php if($user->is_police_record == 1): ?>
                                    Yes
                                <?php else: ?>
                                    No
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/pages/widgets.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/pages/custom/profile/profile.js')); ?>" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/pages/editProfile.blade.php ENDPATH**/ ?>