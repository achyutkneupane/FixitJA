


<?php $__env->startSection('content'); ?>
    <?php
    $page_title = 'Skills';
    $profileSkillIsActive = 'true';
    ?>
    <div class="row">
        <?php echo $__env->make('admin.profile.userSideBar', $user, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            User Skills
                        </h3>
                    </div>
                </div>
                

                <div class="card-body row">
                <?php if($subCats->count() > 0): ?>
                    <?php $__currentLoopData = $subCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        <?php echo e(ucwords($subCat['category']['category_name'])); ?>

                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <?php $__currentLoopData = $subCat['subcategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e(ucwords($subs->name)); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="col-sm-6 card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                User Skills
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo e($user->name); ?> has no skills.
                    </div>
                </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/profile/skills.blade.php ENDPATH**/ ?>