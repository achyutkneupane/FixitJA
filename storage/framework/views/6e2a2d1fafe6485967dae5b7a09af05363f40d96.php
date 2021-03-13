

<?php $__env->startSection('content'); ?>
    <?php
    $page_title = 'Category';
    $subhead_button = [['class' => 'primary', 'target' => '#addCategoryModal', 'text' => 'New Category']];
    ?>

    <?php if($categories->count() == 0): ?>
        <?php
            $page_description = 'No categories';
        ?>
    <?php elseif($categories->count() == 1): ?>
        <?php
            $page_description = '1 category';
        ?>
    <?php else: ?>
        <?php
            $page_description = $categories->count() . ' categories';
        ?>

    <?php endif; ?>
    <div class="card card-custom">
        <div class="card-body">
            <div class="list-group">
                <?php if($categories->count() == 0): ?>
                    <h3 class="text-center list-group-item">
                        No Categories
                    </h3>
                <?php else: ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="list-group-item">
                            <div class="mb-4 float-right">
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                    data-target="#addSubModal<?php echo e($cat->id); ?>">
                                    Add
                                </button>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#editModal<?php echo e($cat->id); ?>">
                                    Edit
                                </button>
                                <a href="<?php echo e(url('/category/delete', $cat->id)); ?>" type="button" class="btn btn-danger">
                                    Delete
                                </a>
                            </div>
                            <a data-toggle="collapse" href="#collapse<?php echo e($cat->id); ?>">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="text-dark">Name: <?php echo e($cat->name); ?></h5>
                                </div>
                                <small class="text-dark-50 lead">Description: <?php echo e($cat->description); ?></small>
                            </a>
                            <div id="collapse<?php echo e($cat->id); ?>" class="collapse">
                                <ul class="list-group list-group-flush">
                                    <div class="container">
                                        <h5>Sub-categories:</h5>
                                        <?php if($cat->sub_categories->count() == 0): ?>
                                            <li class="list-group-item">No sub-categories under <?php echo e($cat->name); ?></li>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $cat->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <li class="list-group-item">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <b class="lead text-dark">Name: <?php echo e($sub->name); ?></b>
                                                            </div>
                                                            <small class="text-dark-75">Description:
                                                                <?php echo e($sub->description); ?></small>
                                                        </li>
                                                    </div>
                                                    <div class="col-md-3 py-5">
                                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                            data-target="#editSubCat<?php echo e($sub->id); ?>">
                                                            Edit
                                                        </button>
                                                        <a href="<?php echo e(url('/sub_category/delete', $sub->id)); ?>"
                                                            type="button" class="btn btn-danger">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="editSubCat<?php echo e($sub->id); ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category
                                                                    <?php echo e($cat->name); ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="height: 300px;">
                                                                <form action="<?php echo e(url('/sub_category/edit', $sub->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    <div class="form-group">
                                                                        <label for="name">Sub-Category Name</label>
                                                                        <input type="text" name="name" class="form-control"
                                                                            id="name" placeholder="Sub-Category Name"
                                                                            value="<?php echo e($sub->name); ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="description">Sub-Category
                                                                            Description</label>
                                                                        <input type="text" name="description"
                                                                            class="form-control" id="description"
                                                                            placeholder="Sub-Category Description"
                                                                            value="<?php echo e($sub->description); ?>">
                                                                    </div>
                                                                    <button class="btn btn-dark">Add</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </ul>
                            </div>
                        </div>

                        <div class="modal fade" id="addSubModal<?php echo e($cat->id); ?>" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add sub-category to
                                            <?php echo e($cat->name); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="height: 300px;">
                                        <form action="<?php echo e(url('/sub_category/add')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="category_id" value="<?php echo e($cat->id); ?>">
                                            <div class="form-group">
                                                <label for="name">Sub-Category Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Sub-Category Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Sub-Category Description</label>
                                                <input type="text" name="description" class="form-control" id="description"
                                                    placeholder="Sub-Category Description">
                                            </div>
                                            <button class="btn btn-dark">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editModal<?php echo e($cat->id); ?>" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category <?php echo e($cat->name); ?>

                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="height: 300px;">
                                        <form action="<?php echo e(url('/category/edit', $cat->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Category Name" value="<?php echo e($cat->name); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Category Description</label>
                                                <input type="text" name="description" class="form-control" id="description"
                                                    placeholder="Category Description" value="<?php echo e($cat->description); ?>">
                                            </div>
                                            <button class="btn btn-dark">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body" style="height: 300px;">
                                <form action="<?php echo e(url('/category/add')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Category Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Category Description</label>
                                        <input type="text" name="description" class="form-control" id="description"
                                            placeholder="Category Description">
                                    </div>
                                    <button class="btn btn-dark">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/admin/category.blade.php ENDPATH**/ ?>