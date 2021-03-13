


<?php $__env->startSection('content'); ?>

    <div class="row">

        <?php echo $__env->make('admin.task.taskSideBar', $task, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            Task Assigned To
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $task->assignedTo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->odd): ?>
                            <div class="form-group row">
                        <?php endif; ?>
                        <div class="col-lg-6 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid"><?php echo e($user->name); ?></span>
                        </div>
                        <?php if($loop->even || $loop->last): ?>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/pages/widgets.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/task/assignedTo.blade.php ENDPATH**/ ?>