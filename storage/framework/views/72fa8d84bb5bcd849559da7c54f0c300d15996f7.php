<?php
$direction = config('layout.extras.user.offcanvas.direction', 'right');
?>

<div id="kt_quick_user" class="offcanvas offcanvas-<?php echo e($direction); ?> p-10" style="z-index:9999;">
    
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">
            User Profile
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>

    
    <div class="offcanvas-content pr-5 mr-n5">
        
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-85 mr-5">
                <?php if(auth()->guard()->check()): ?>
                <?php if(!is_null(Auth::user()
                ->documents->where('type', 'profile_picture')
                ->first()
                )): ?>
                <div class="symbol-label" style="background-image:url('<?php echo e(asset('storage/'.
                    Auth::user()->documents->where('type', 'profile_picture')->first()->path,
                    )); ?>')">
                </div>
                <?php else: ?>
                <div class="symbol-label" style="background-image:url('<?php echo e(asset('images/unknown-avatar.png')); ?>')"></div>
                <?php endif; ?>
                <?php endif; ?>
                <!--i class="symbol-badge bg-success"></i-->
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('viewProfile')); ?>">
                        <span class="text-dark font-weight-bold">
                            <?php echo e(Auth::user()->name); ?>

                        </span>
                    </a>
                    <?php endif; ?>
                </a>
                <div class="text-muted mt-1">
                    <?php echo e(Auth::user()->userType()); ?>

                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <?php echo e(Metronic::getSVG('media/svg/icons/Communication/Mail-notification.svg', 'svg-icon-lg svg-icon-primary')); ?>

                            </span>
                            <span class="navi-text text-muted text-hover-primary">
                                <?php if(auth()->guard()->check()): ?>
                                <?php echo e(Auth::user()->email()); ?>

                                <?php endif; ?>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        
        <div class="separator separator-dashed mt-8 mb-5"></div>

        
        <div class="navi navi-spacer-x-0 p-0">
            
            <a href="/home" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <?php echo e(Metronic::getSVG('media/svg/icons/Home/Home.svg', 'svg-icon-md svg-icon-success')); ?>

                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Dashboard
                        </div>
                        <!-- <div class="text-muted">
  View your profile
  <span class="label label-light-danger label-inline font-weight-bold">update</span>
  </div>
 -->
                    </div>
                </div>
            </a>
            <a href="<?php echo e(route('viewProfile')); ?>" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <?php echo e(Metronic::getSVG('media/svg/icons/General/User.svg', 'svg-icon-md svg-icon-success')); ?>

                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Profile
                        </div>
                        <!-- <div class="text-muted">
  View your profile
  <span class="label label-light-danger label-inline font-weight-bold">update</span>
  </div>
 -->
                    </div>
                </div>
            </a>

            <a href="<?php echo e(route('listTask')); ?>" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <?php echo e(Metronic::getSVG('media/svg/icons/Text/Bullet-list.svg', 'svg-icon-md svg-icon-success')); ?>

                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Tasks
                        </div>
                        <!-- <div class="text-muted">
  View your profile
  <span class="label label-light-danger label-inline font-weight-bold">update</span>
  </div>
 -->
                    </div>
                </div>
            </a>

            <a href="<?php echo e(route('accountSecurity')); ?>" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <?php echo e(Metronic::getSVG('media/svg/icons/General/Lock.svg', 'svg-icon-md svg-icon-success')); ?>

                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Account Setting
                        </div>
                        <!-- <div class="text-muted">
  View your profile
  <span class="label label-light-danger label-inline font-weight-bold">update</span>
  </div>
 -->
                    </div>
                </div>
            </a>

            
            <a href="<?php echo e(route('logout')); ?>" class="navi-item" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <?php echo e(Metronic::getSVG('media/svg/icons/Navigation/Sign-out.svg', 'svg-icon-md svg-icon-primary')); ?>

                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Logout
                        </div>
                    </div>
                </div>
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/layouts/partials/extras/offcanvas/_quick-user.blade.php ENDPATH**/ ?>