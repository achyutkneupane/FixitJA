
<?php $__env->startSection('content'); ?>
<div class="bgimg-under-construction">
    <div class="middle-under-construction">
        <a href="/">
            <img class="under-construction-image-middle" src="/images/logo.png"></a>
        <div>
            <h1 class="mt-5">This page is under construction.</h1>
            <h2 class="mb-5">Please come back later.</h1>
        </div>
        <a class="p-2" type="button" href="/">Home</a>
        <a class="p-2" type="button" onclick="history.back()">Go Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/pages/underConstruction.blade.php ENDPATH**/ ?>