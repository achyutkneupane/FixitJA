
<div class="alert alert-custom alert-notice alert-light-<?php echo e($alert_type); ?> fade show" role="alert">
    <div class="alert-icon"><i class="<?php echo e($alert_type == 'danger' ? 'flaticon-warning' : 'flaticon-info'); ?>"></i></div>
    <div class="alert-text"><?php echo e($content); ?></div>
    <?php if($has_button): ?>
    <a href="<?php echo e($button_link); ?>" class="btn btn-primary font-weight-bold px-5 py-3"><?php echo e($button_text); ?></a>
    <?php endif; ?>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>

<?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/layouts/partials/_custom_alert_heading.blade.php ENDPATH**/ ?>