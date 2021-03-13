Welcome to my <?php echo e(config('app.name', 'FixitJA')); ?> Website!
<br>
Please click the below link to verify your account
<br><br>


<?php if(session('resent')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

    </div>
<?php endif; ?>
<a href="<?php echo e(asset('/')); ?>verify/<?php echo e($verification_code); ?>">Click Here</a>.
</div>
<br><br>
Thank you!
<br>
<?php echo e(config('app.name', 'FixitJA')); ?>

<?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/auth/verifyuser.blade.php ENDPATH**/ ?>