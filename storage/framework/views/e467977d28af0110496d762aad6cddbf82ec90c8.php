
<?php if(config('layout.content.extended')): ?>
    <?php echo $__env->yieldContent('content'); ?>
<?php else: ?>
    <?php if (\Illuminate\Support\Facades\Blade::check('notVerified')): ?>
        <?php echo $__env->make('layouts.partials._custom_alert_heading',[
        'alert_type' => 'danger',
        'content' => 'Your account is not activated yet. Please verify your email to activate your account.',
        'has_button' => 'true',
        'button_text' => 'Resend verify link again',
        'button_link' =>''
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('formToBeFilled')): ?>
        <?php echo $__env->make('layouts.partials._custom_alert_heading',[
        'alert_type' => 'danger',
        'content' => 'Please complete your application to become our Fixician and to start earning.',
        'has_button' => 'true',
        'button_text' => 'Complete Application',
        'button_link' => route('profileWizard')
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('notApproved')): ?>
    <?php echo $__env->make('layouts.partials._custom_alert_heading',[
    'alert_type' => 'warning',
    'content' => 'Your application is submitted. You can still edit your application. Once we start reviewing your application you have to contact us to change application information.',
    'has_button' => 'true',
    'button_text' => 'Edit Application',
    'button_link' => '#'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- https://preview.keenthemes.com/metronic/demo1/features/bootstrap/alerts.html -->
    <div class="d-flex flex-column-fluid">
        <div class="<?php echo e(Metronic::printClasses('content-container', false)); ?>">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/layouts/base/_content.blade.php ENDPATH**/ ?>