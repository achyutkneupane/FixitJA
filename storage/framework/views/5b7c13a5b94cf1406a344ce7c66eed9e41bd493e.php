


<?php $__env->startSection('content'); ?>
    <?php
    $page_title = 'Error Overview';
    ?>
    <div class="row">

        <div class="col-lg-12">
            <div class="card card-custom">

                <?php if(!isset($error->solved_at)): ?>
                    <?php
                        $subhead_button = [['class' => 'primary', 'text' => 'Solved', 'method' => 'PUT', 'action' => route('errorSolved', $error->id)]];
                    ?>
                <?php endif; ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">In Module: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid"><?php echo e($error->module); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Found By: </label>
                        <div class="col-lg-9 col-xl-6">
                            <a href="<?php echo e(route('viewUser', $error->foundBy->id)); ?>"><span
                                    class="form-control form-control-lg form-control-solid"><?php echo e($error->foundBy->name); ?></span></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Title: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid"><?php echo e($error->title); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Description: </label>
                        <div class="col-lg-9 col-xl-6">
                            <textarea class="form-control form-control-lg form-control-solid"
                                rows="5"><?php echo e($error->description); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">In URL: </label>
                        <div class="col-lg-9 col-xl-6">
                            <a href="<?php echo e($error->url); ?>"><span
                                    class="form-control form-control-lg form-control-solid"><?php echo e($error->url); ?></span></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">IP Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid"><?php echo e($error->ip); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">User Agent: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid"><?php echo e($error->user_agent); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Found: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid"><?php echo e($error->created_at->diffForHumans()); ?>(<?php echo e($error->created_at); ?>)</span>
                        </div>
                    </div>
                    <?php if(isset($error->solved_at)): ?>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Solved By: </label>
                            <div class="col-lg-9 col-xl-6">
                                <span
                                    class="form-control form-control-lg form-control-solid"><?php echo e($error->solvedBy->name); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Solved: </label>
                            <div class="col-lg-9 col-xl-6">
                                <span
                                    class="form-control form-control-lg form-control-solid"><?php echo e(\Carbon\Carbon::parse($error->solved_at)->diffForHumans()); ?></span>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/viewError.blade.php ENDPATH**/ ?>