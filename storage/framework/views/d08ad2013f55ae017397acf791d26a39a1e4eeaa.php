<?php $__env->startSection('content'); ?>

<?php
$page_title = 'Dashboard';
?>
<div class="col-xl-12">
    <div class="card card-custom bgi-no-repeat gutter-b card-stretch" style="background-color: #1B283F; background-position: 0 calc(100% + 0.5rem); background-size: 100% auto;">
        <!--begin::Body-->
        <div class="card-body">
            <div class="p-4">
                <h3 class="text-white font-weight-bolder my-7">Create your home project now</h3>
                <p class="text-muted font-size-lg mb-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa accusamus error tempore facere, officiis numquam voluptatum. Beatae similique ea, sed nam consectetur esse quia totam error ab? Accusantium, eaque ea?
                </p>
                <a href="<?php echo e(route('createProject')); ?>" class="btn btn-primary font-weight-bold px-6 py-3">Create Project</a>
            </div>
        </div>
        <!--end::Body-->
    </div>
</div>
<div class="col-xl-12">
    <!--begin::Engage Widget 6-->
    <div class="card card-custom card-stretch gutter-b">
        <div class="card-body d-flex p-0">
            <div class="flex-grow-1 bg-danger p-12 pb-20 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0rem) top; background-image: url(<?php echo e(asset('media/svg/humans/custom-7.svg')); ?>)">
                <p class="text-inverse-danger pt-10 pb-5 font-size-h3 font-weight-bolder line-height-lg">Register your skills and start earning.
                </p>
                <p class="text-white font-size-lg mb-7" style="width: 80%;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa accusamus error tempore facere, officiis numquam voluptatum. Beatae similique ea, sed nam consectetur esse quia totam error ab? Accusantium, eaque ea?
                </p>
                <a href="<?php echo e(route('profileWizard')); ?>" class="btn btn-warning font-weight-bold py-2 px-6">Join Now</a>
            </div>
        </div>
    </div>
    <!--end::Engage Widget 6-->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/pages/home.blade.php ENDPATH**/ ?>