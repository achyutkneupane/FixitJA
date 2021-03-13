<?php
$page_title = 'Register';
$page_description = 'This is registration page';
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
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid" id="kt_login">
        <!--begin::Content-->
        <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
            <!--begin::Container-->
            <div class="login-content login-content-signup d-flex flex-column">
                <!--begin::Aside Top-->

                <!--begin::Aside header-->
                <a href="/" class="login-logo pb-lg-4 pb-10">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" class="max-h-120px" alt="" />
                </a>
                <!--end::Aside header-->
                <!--begin: Wizard Nav-->

                <!--end::Aside Top-->
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form id="demoForm" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
                        <!--begin: Wizard Step 1-->
                        <div class="" data-wizard-type="step-content" data-wizard-state="current">
                            <!--begin::Title-->
                            <div class="pb-10 pb-lg-12">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Create Account</h3>
                                <div class="text-muted font-weight-bold font-size-h4">Already have an Account ?
                                    <a href="/login" class="text-primary font-weight-bolder">Login</a>
                                </div>
                            </div>
                            <!--begin::Title-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Full Name (Required)</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>" />
                                <?php if($errors->has('name')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Email (Required)</label>
                                <input type="email" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" />
                                <?php if($errors->has('email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Phone (Required)</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="phone" placeholder="Phone" value="<?php echo e(old('phone')); ?>" />
                                <?php if($errors->has('phone')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                            <?php endif; ?>
                                 </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Type (Required)</label>

                                <select class="form-control" id="user_type" name="type" value="<?php echo e(old('type')); ?>" >
                                    <option value="">Select</option>
                                    <option value="general_user"   id="type1"  >General</option>
                                    <option value="Business" id="type2">Business</option>
                                    <option value="individual_contractor" id="type3">Skilled Worker</option>
                                </select>
                                <?php if($errors->has('type')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('type')); ?></span>
                            <?php endif; ?>
                            </div>


                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group" id="genders">
                                <label class="font-size-h6 font-weight-bolder text-dark">Gender</label>

                                <select class="form-control" name="gender" value="<?php echo e(old('gender')); ?>" >
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Custom">Other</option>
                                </select>
                                <?php if($errors->has('gender')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('gender')); ?></span>
                            <?php endif; ?>
                            </div>


                            <!--end::Form Group-->

                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group" id="webpersonal">
                                <label class="font-size-h6 font-weight-bolder text-dark">Website</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="websitepersonal" placeholder="Website (Optional)" value="<?php echo e(old('websitepersonal')); ?>" />
                                <?php if($errors->has('website')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('website')); ?></span>
                            <?php endif; ?>
                            </div>
                            <!--end::Form Group-->
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group" id="companyname">
                                <label class="font-size-h6 font-weight-bolder text-dark">Company Name</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="companyname" placeholder="Company Name" value="<?php echo e(old('companyname')); ?>" />
                                <?php if($errors->has('companyname')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('companyname')); ?></span>
                            <?php endif; ?>
                            </div>
                            <!--end::Form Group-->
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group" id="webcompany">
                                <label class="font-size-h6 font-weight-bolder text-dark">Website</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="websitecompany" placeholder="Website (Optional)" value="<?php echo e(old('websitecompany')); ?>" />
                                <?php if($errors->has('websitecompany')): ?>
                             <span class="text-danger"><?php echo e($errors->first('websitecompany')); ?></span>
                            <?php endif; ?>
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Password</label>
                                <input type="password" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password" id="psw" placeholder="Password" value="" />
                                <span class="passwordinfo"> Your password must be more than 8 characters long, should contain at least one uppercase and one numeric character.</span>
                                <?php if($errors->has('password')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark"> Confirm Password</label>
                                <input type="password" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="cpassword" placeholder=" Confirm Password" value="" />
                                <?php if($errors->has('password')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Action-->
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id="signup" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign Up</button>
                            </div>
                        </div>
                </div>
                <?php echo $__env->make('layouts.partials._footer_simple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--end::Signin-->
            </div>
            <!--end::Container-->

            <!--begin::Content-->

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
    <!-- <script src="<?php echo e(asset('js/form-validation.js')); ?>" type="text/javascript"></script>git ss -->


    
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>


    <script>
        document.getElementById("genders").style.display = "none";
        document.getElementById("webpersonal").style.display = "none";
        document.getElementById("webcompany").style.display = "none";
        document.getElementById("companyname").style.display = "none";

    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/auth/register.blade.php ENDPATH**/ ?>