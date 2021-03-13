
<?php $__env->startSection('content'); ?>
<main>
    <!-- Page Header-->
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content pt-website-10">
            <div class="container-website text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="page-header-title mb-3">Contact us</h1>
                        <p class="page-header-text">Have questions? We're here to help!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-light">
            <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </header>
    <section class="bg-white py-website-10">
        <div class="container-website">
            
            <div class="row align-items-center mb-10">
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <div class="section-preheading">WhatsApp Us</div>
                    <a>1-437-771-5337 </a>
                </div>
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <div class="section-preheading">Call Anytime</div>
                    <a>1-844-200-0161 | 1-876-527-0157</a>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="section-preheading">Email Us</div>
                    <a>support@fixitja.com</a>
                </div>
            </div>
            <form action="<?php echo e(route('submitContact')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="text-dark" for="inputName">Full name</label>
                        <input class="form-control-website py-website-4" id="inputName" type="text" name="name" placeholder="Full name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-dark" for="inputEmail">Email</label>
                        <input class="form-control-website py-website-4" id="inputEmail" type="email" name="email" placeholder="name@example.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-dark" for="inputMessage">Message</label>
                    <textarea class="form-control-website py-website-3" id="inputMessage" type="text" name="message" placeholder="Enter your message..." rows="5" required></textarea>
                </div>
                <div class="text-center"><button class="btn btn-primary mt-4" type="submit">Submit Request</button></div>
            </form>
        </div>
        <div class="svg-border-rounded text-light">
            <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/pages/contact.blade.php ENDPATH**/ ?>