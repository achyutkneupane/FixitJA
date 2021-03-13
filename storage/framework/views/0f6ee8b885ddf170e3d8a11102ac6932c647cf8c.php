
<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Body-->
        <div class="card-body pt-15">
            <!--begin::User-->
            <div class="mb-10">
                <div class="row">
                    <div class="col-12">
                        <h4 class="float-left font-weight-bold my-2"><?php echo e(ucwords($user->name)); ?></h4>
                        <div class="float-right">
                            <img src="
                        <?php if(!is_null($user->documents->where('type',
                            'profile_picture')->first())): ?> <?php echo e(asset('storage/' . $user->documents->where('type', 'profile_picture')->first()->path)); ?>

                        <?php else: ?>
                            <?php echo e(asset('images/unknown-avatar.png')); ?> <?php endif; ?>
                            " class="rounded-circle object-fit-scale-down" width="100" height="100">
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold">Email:</span>
                    <span class="text-muted"><?php echo e($user->email); ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold">Phone:</span>
                    <span class="text-muted"><?php echo e($user->phone); ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold">Gender:</span>
                    <span class="text-muted"><?php echo e(ucwords($user->gender)); ?></span>
                </div>
            </div>
            <!--end::User-->
            <!--begin::Nav-->
            <a href="<?php echo e(Auth::user()->id === $user->id ? route('viewProfile') : route('viewUser', $user->id)); ?>"
                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 btn-block active">
                User Overview
            </a>
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
<?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/userSideBar.blade.php ENDPATH**/ ?>