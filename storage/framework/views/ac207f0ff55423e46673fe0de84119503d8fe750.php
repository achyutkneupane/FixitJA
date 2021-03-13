





<?php $__env->startSection('content'); ?>
    <?php
    $page_title = 'Error Log';
    ?>
    <?php if($errors->count() == 0): ?>
        <?php
            $page_description = 'No errors';
        ?>
    <?php elseif($errors->count() == 1): ?>
        <?php
            $page_description = '<span class="text-danger">1 error</span>';
        ?>
    <?php else: ?>
        <?php
            $page_description = '<span class="text-danger">' . $errors->count() . ' errors</span>';
        ?>
    <?php endif; ?>
    <div class="card card-custom">
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="datatable datatable-bordered datatable-head-custom text-center" id="kt_datatable">
                <thead>
                    <tr>
                        <th title="ID">ID</th>
                        <th title="Name">Title</th>
                        <th title="Role">Found By</th>
                        <th title="Email">Module</th>
                        <th title="Address">Solved By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="<?php echo e(!isset($error->solved_by) ? 'table-danger' : ''); ?>">
                            <td>
                                <?php echo e($error->id); ?>

                            </td>
                            <td>
                                <a href="<?php echo e(route('viewErrorDetail', $error->id)); ?>">
                                    <?php echo e($error->title); ?>

                                </a>
                            </td>
                            <td>
                                <?php echo e($error->foundBy->name); ?>

                            </td>
                            <td>
                                <?php echo e($error->module); ?>

                            </td>
                            <td>
                                <?php if(isset($error->solvedBy)): ?>
                                    <?php echo e($error->solvedBy->name); ?>

                                <?php else: ?>
                                    Not Solved
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/pages/crud/ktdatatable/base/html-table.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/errorLog.blade.php ENDPATH**/ ?>