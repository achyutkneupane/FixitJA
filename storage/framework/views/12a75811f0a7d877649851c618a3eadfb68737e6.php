


<?php $__env->startSection('content'); ?>
    <?php
    $profileIsActive = 'true';
    ?>
    <?php if(Auth::user()->id == $user->id): ?>
        <?php
            $page_title = 'Profile';
        ?>
    <?php else: ?>
        <?php
            $page_title = 'User Overview';
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
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo !empty($user->gender) ? ucwords($user->gender) : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo !empty($user->getEmail($user->id)) ? $user->getEmail($user->id) : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Phone: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo !empty($user->getPhone($user->id)) ? $user->getPhone($user->id) : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo !empty($user->city->name) ? $user->city->name : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Street : </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo !empty($user->street_01) ? $user->street_01 : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                            <?php echo !empty($user->street_02) ? '<span class="form-control form-control-lg form-control-solid mt-3">' . $user->street_02 . '</span>' : ''; ?>

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
                    <?php if (\Illuminate\Support\Facades\Blade::check('userIsContractor', $user)): ?>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Police report</label>
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo $user->introduction ? $user->introduction : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Working hours per week</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo $user->hours ? $user->hours : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Working days:</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo $user->days ? $user->days : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Willing to travel long distace</label>
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
                    <?php if($user->is_travelling == 1): ?>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Distance willing to travel</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php echo $user->areas_covering ? $user->areas_covering : "<span class='text-muted'>N/A</span>"; ?>

                            </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/pages/widgets.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/pages/custom/profile/profile.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/pages/profile.blade.php ENDPATH**/ ?>