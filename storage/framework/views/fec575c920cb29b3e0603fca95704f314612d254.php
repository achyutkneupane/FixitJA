


<?php $__env->startSection('content'); ?>

    <?php
    $page_title = 'Task Overview';
    ?>

    <div class="row">

        <?php echo $__env->make('admin.task.taskSideBar', $task, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Created By: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid"><?php echo e($task->createdBy->name); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Created For: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid"><?php echo e($task->createdFor->name); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Working Location: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid"><?php echo e($task->working_location); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Client: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php if($task->is_client_on_site == 1): ?>
                                    On Site
                                <?php else: ?>
                                    Not On Site
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Repair Parts: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">
                                <?php if($task->is_repair_parts_provided == 1): ?>
                                    Provided
                                <?php else: ?>
                                    Not Provided
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/task/viewTask.blade.php ENDPATH**/ ?>