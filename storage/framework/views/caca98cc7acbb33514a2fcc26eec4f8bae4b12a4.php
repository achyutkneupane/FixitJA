
<?php
$page_title = 'Resend Verification';
$page_description = 'This is login page';
$show_sidebar = false;
?>
<?php $__env->startSection('content'); ?>
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <div class="flash-message">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(Session::has('alert-' . $msg)): ?>
        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!--begin::Login-->
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Content-->
        <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
            <!--begin::Wrapper-->
            <div class="login-content d-flex flex-column pt-lg-0 pt-8">
                <!--begin::Logo-->
                <a href="/" class="login-logo pb-xl-15 pb-10">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" class="max-h-120px" alt="" />
                </a>
                <!--end::Logo-->
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form method="POST" action="<?php echo e(route('reverifyUser')); ?>">
                        <?php echo csrf_field(); ?>
                        <!--begin::Title-->
                        <div class="pb-5 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Resend Verification Email</h3>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="text" name="email" autocomplete="off" value="<?php echo e($user->email); ?>" />
                            <?php if($errors->has('email')): ?>
                             <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Resend</button>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>

                <?php echo $__env->make('layouts.partials._footer_simple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--end::Signin-->
            </div>
            <!--end::Wrapper-->

        </div>
        <!--begin::Content-->
        <!--begin::Aside-->
        <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
            <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(<?php echo e(asset('images/website/repair1.svg')); ?>);">
                <!--begin::Aside title-->
                <h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">We Got
                    <br />A Surprise
                    <br />For You
                </h3>
                <!--end::Aside title-->
            </div>
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/pages/login/login-4.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/pages/custom/login/login-4.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/auth/resendemail.blade.php ENDPATH**/ ?>