<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" <?php echo e(Metronic::printAttrs('html')); ?> <?php echo e(Metronic::printClasses('html')); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo e(config('app.name')); ?> | <?php echo $__env->yieldContent('title', $page_title ?? ''); ?></title>

    
    <meta name="description" content="<?php echo $__env->yieldContent('page_description', $page_description ?? ''); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    
    <link rel="shortcut icon" href="<?php echo e(asset('media/logos/favicon.ico')); ?>" />
    
    <?php echo e(Metronic::getGoogleFontsInclude()); ?>

    
    <?php $__currentLoopData = config('layout.resources.css'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <link href="<?php echo e(config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style)); ?>" rel="stylesheet" type="text/css" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php $__currentLoopData = Metronic::initThemes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <link href="<?php echo e(config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme)); ?>" rel="stylesheet" type="text/css" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php echo $__env->yieldContent('styles'); ?>

    
    <?php if(isset($show_sidebar) && !$show_sidebar): ?>
    <link href="<?php echo e(asset('css/website/styles.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <?php endif; ?>
    
    <script src="<?php echo e(asset('js/custom/custom.js')); ?>" defer></script>
    <link href="<?php echo e(asset('css/custom/custom-css.css')); ?>" rel="stylesheet">
    <!-- <link href="<?php echo e(asset('css/modern-business.css')); ?>" rel="stylesheet"> -->
</head>

<body <?php echo e(Metronic::printAttrs('body')); ?> <?php echo e(Metronic::printClasses('body')); ?>>

    <?php if(isset($show_sidebar) && !$show_sidebar): ?>
    <?php if(isset($show_navbar) && $show_navbar): ?>
    <?php echo $__env->make('layouts.partials._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.partials.extras._scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php endif; ?>
    <?php else: ?>
    <?php if(auth()->guard()->guest()): ?>
    <?php if(isset($show_navbar) && $show_navbar): ?>
    <?php echo $__env->make('layouts.partials._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.partials.extras._scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->guard()->check()): ?>
    <?php if(config('layout.page-loader.type') != ''): ?>
    <?php echo $__env->make('layouts.partials._page-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('layouts.base._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>

    <script>
        var HOST_URL = "<?php echo e(route('quick-search')); ?>";
    </script>

    
    <script>
        var KTAppSettings = <?php echo json_encode(config('layout.js'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?>;
    </script>

    
    <?php $__currentLoopData = config('layout.resources.js'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script src="<?php echo e(asset($script)); ?>" type="text/javascript"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php echo $__env->yieldContent('scripts'); ?>
    
    <?php if(isset($show_sidebar) && !$show_sidebar): ?>
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/website/scripts.js')); ?>" type="text/javascript"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            disable: 'mobile',
            duration: 600,
            once: true,
        });
    </script>
    <?php endif; ?>

    
    

    <?php if(session()->has('toast')): ?>
    <script>
        toastr. {
            {
                session('toast')['class']
            }
        }("<?php echo e(session('toast')['message']); ?>");
    </script>
    <?php endif; ?>
    <script>
        var aside = document.getElementById('kt_aside');
        if (JSON.stringify(aside) != "null") {
            var el = document.getElementById('kt_profile_aside');
            var toggler = document.getElementById('kt_subheader_mobile_toggle');
            if (JSON.stringify(el) != "null") {
                toggler.innerHTML = "<span></span>";
            } else {
                toggler.innerHTML = "";
            }
        }
    </script>
</body>

</html>
<?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/layouts/app.blade.php ENDPATH**/ ?>