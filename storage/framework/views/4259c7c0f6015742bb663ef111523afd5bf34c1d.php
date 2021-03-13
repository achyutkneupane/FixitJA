
<?php $__env->startSection('content'); ?>
<div class="container py-10">
    <div class="row">
        <h1 class="font-weight-bolder text-uppercase m-auto py-5 float-center">All Our Categories</h1>
    </div>
    <div class="row">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            <a href="<?php echo e(route('createProjectWithCat',$category->id)); ?>"><?php echo e(ucwords($category->name)); ?></a>
                        </h3>
                    </div>
                </div>
                <div class="card-body" id="sublist">
                    <?php if($category->sub_categories->count() != 0): ?>
                    <div class="SubCategory">
                        <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('createProjectWithSub',$subCategory->id)); ?>"><?php echo e(ucwords($subCategory->name)); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                        No sub-categories inside <b><?php echo e(ucwords($category->name)); ?></b>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<?php if(auth()->guard()->check()): ?>
<?php if(config('layout.extras.user.layout') == 'offcanvas'): ?>
<?php echo $__env->make('layouts.partials.extras.offcanvas._quick-user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<style>
    .card a {
        color: $link-color;
        text-decoration: none;
    }
    .card a:hover {
        color: blue;
        text-decoration: underline !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script
    src="<?php echo e(asset('js/custom/custom_show_categories.js')); ?>" type="text/javascript">
</script>
<script>
    var fixedNavbarWebsite = true;
    $(".navbar-marketing").addClass("navbar-scrolled");
    $(".navbar-marketing").removeClass("fixed-top");
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/pages/categories.blade.php ENDPATH**/ ?>