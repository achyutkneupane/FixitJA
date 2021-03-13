
<div class="subheader py-2 <?php echo e(Metronic::printClasses('subheader', false)); ?>" id="kt_subheader">
    <div
        class="<?php echo e(Metronic::printClasses('subheader-container', false)); ?> d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

        
        <?php
            $currentuser = Auth::user();
        ?>
        <div class="d-flex align-items-center flex-wrap mr-1">
            <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                <span></span>
            </button>
            
            <h5 class="text-dark font-weight-bold my-2 mr-5">
                <?php echo e(@$page_title); ?>

                <?php if(isset($page_description) && config('layout.subheader.displayDesc')): ?>
                    <br>
                    <small class="text-muted"><?php echo @$page_description; ?></small>
                <?php endif; ?>
            </h5>

            <?php if($currentuser->status == 'pending'): ?>
                <span class="font-weight-bold text-danger">
                    Your account is not activated yet.
                    <a href="">Resend Verification</a>
                </span>
            <?php elseif($currentuser->status == "suspended"): ?>
                <span class="font-weight-bold text-warning">
                    Your account has been suspended.
                </span>
            <?php elseif($currentuser->status == "blocked"): ?>
                <span class="font-weight-bold text-danger">
                    Your account has been blocked.
                </span>
            <?php endif; ?>
            <?php if(!empty($page_breadcrumbs)): ?>
                
                <div class="subheader-separator subheader-separator-ver my-2 mr-4 d-none"></div>

                
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2">
                    <li class="breadcrumb-item"><a href="#"><i class="flaticon2-shelter text-muted icon-1x"></i></a>
                    </li>
                    <?php $__currentLoopData = $page_breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(url($item['page'])); ?>" class="text-muted">
                                <?php echo e($item['title']); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>

        
        <div class="d-flex align-items-center">

            <?php if (! empty(trim($__env->yieldContent('page_toolbar')))): ?>
                <?php $__env->startSection('page_toolbar'); ?>
                    <?php endif; ?>
                </div>

                
                
                <?php if(isset($subhead_button)): ?>
                    <div title="Buttons">
                        <?php $__currentLoopData = $subhead_button; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($button['action'])): ?>
                                <form action="<?php echo e($button['action']); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="_method" value="<?php echo e($button['method']); ?>">
                                    <button class="btn btn-<?php echo e($button['class']); ?> font-weight-bolder">
                                        <?php echo e($button['text']); ?>

                                    </button>
                                </form>
                            <?php else: ?>
                                <a class="btn btn-<?php echo e($button['class']); ?> font-weight-bolder" <?php echo isset($button['target']) ? 'data-target="' . $button['target'] . '" data-toggle="modal" ' : ''; ?>

                                    <?php echo e(isset($button['link']) ? 'href=' . $button['link'] : ''); ?>>
                                    <?php echo e($button['text']); ?>

                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
<?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/layouts/partials/subheader/_subheader-v1.blade.php ENDPATH**/ ?>