



<?php
$page_title = 'Tasks';
?>

<?php $__env->startSection('content'); ?>
    <div class="card card-custom">
        <?php if($tasks->count() == 0): ?>
            <?php
                $page_description = 'No tasks';
            ?>
        <?php elseif($tasks->count() == 1): ?>
            <?php
                $page_description = '1 task';
            ?>
        <?php else: ?>
            <?php
                $page_description = $tasks->count() . ' tasks';
            ?>
        <?php endif; ?>
        </h3>

        <?php if (\Illuminate\Support\Facades\Blade::check('isAdmin')): ?>
        <?php
            $subhead_button = [['link' => route('createProject'), 'text' => 'New Task', 'class' => 'primary']];
        ?>
        <?php endif; ?>
        <div class="card-body">
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                        id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">All</option>
                                        <option value="completed">Completed</option>
                                        <option value="new">New</option>
                                        <option value="pending">Pending</option>
                                        <option value="assigned">Assigned</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="N/A">N/A</option>
                                        <option value="ready to hire">Ready To Hire</option>
                                        <option value="planning">Planning</option>
                                        <option value="budgeting">Budgeting</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin: Datatable-->
            <table class="datatable datatable-bordered table-striped table-hover datatable-head-custom text-center"
                id="kt_datatable">
                <thead>
                    <tr>
                        <th title="ID" style="width:5%;">ID</th>
                        <th title="Name" style="width:15%;">Name</th>
                        <th title="Status" style="width:10%;">Status</th>
                        <th title="Type" style="width:10%;">Type</th>
                        <th title="Created For" style="width:15%;">Created For</th>
                        <th title="Address" style="width:15%;">Address</th>
                        <th title="Category" style="width:15%;">Category</th>
                        <th title="Date" style="width:15%;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($task->id); ?></td>
                            <td>
                                <a href="<?php echo e(route('viewTask', $task->id)); ?>">
                                    <?php echo e(ucwords($task->name)); ?>

                                </a>
                            </td>
                            <td><?php echo e($task->status); ?></td>
                            <td><?php echo e($task->type); ?></td>
                            <td><?php echo isset($task->createdFor->name) ? $task->createdFor->name : '<span class="text-muted">N/A</span>'; ?></td>
                            <td><?php echo $task->creator->city->name; ?></td>
                            <td></td>
                            
                            <td><?php echo e($task->created_at->diffForHumans()); ?></td>
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
    <script src="<?php echo e(asset('js/custom/custom_task_datatable.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/task/tasks.blade.php ENDPATH**/ ?>