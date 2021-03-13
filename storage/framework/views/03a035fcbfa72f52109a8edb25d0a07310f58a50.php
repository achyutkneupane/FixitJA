





<?php $__env->startSection('content'); ?>
    <?php
    $page_title = 'Proposed Categories';
    ?>
    <?php if($cats->count() == 0): ?>
        <?php
            $page_description = 'No categories';
        ?>
    <?php elseif($cats->count() == 1): ?>
        <?php
            $page_description = '1 category';
        ?>
    <?php else: ?>
        <?php
            $page_description = $cats->count() . ' categories';
        ?>
    <?php endif; ?>
    <div class="card card-custom">
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="datatable datatable-bordered datatable-head-custom text-center" id="kt_datatable">
                <thead>
                    <tr>
                        <th title="ID">ID</th>
                        <th title="Name">Name</th>
                        <th title="Description">Description</th>
                        <th title="Category">Category</th>
                        <th title="Date">Date</th>
                        <th title="Role">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($cat->id); ?>

                            </td>
                            <td>
                                <?php echo e($cat->name); ?>

                            </td>
                            <td>
                                <?php echo e($cat->description); ?>

                            </td>
                            <td><?php echo e($cat->category->name); ?></td>
                            <td><?php echo e($cat->created_at->diffForHumans()); ?></td>
                            <td>
                                <a href="#" class="btn btn-primary">Approve</a>
                                <a href="#" class="btn btn-danger">Delete</a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/proposed.blade.php ENDPATH**/ ?>