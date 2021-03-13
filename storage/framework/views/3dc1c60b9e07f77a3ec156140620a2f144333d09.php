<!-- Navbar-->
<nav class="navbar navbar-marketing navbar-expand-lg bg-transparent navbar-dark fixed-top">
    <div class="container-website">
        <a class="navbar-brand text-white" href="/">
            <img src="<?php echo e(asset('images/logo.png')); ?>" class="img-logo d-inline-block align-top logo-fixitja" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-lg-5">
                <li class="nav-item"><a class="nav-link" href="/project/create">Build your project</a></li>
                <li class="nav-item dropdown dropdown-xl no-caret">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownDemos" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories<i class="fas fa-chevron-right dropdown-arrow"></i></a>
                    <div class="dropdown-menu dropdown-menu-right animated--fade-in-up mr-lg-n25 mr-xl-n15" aria-labelledby="navbarDropdownDemos">
                        <div class="row no-gutters">
                            <div class="col-lg-5 p-lg-3 bg-img-cover overlay overlay-primary overlay-70 d-none d-lg-block" style="background-image: url(<?php echo e(asset('images/website/mainbg.jpg')); ?>)">
                                <div class="d-flex-website h-100 w-100 align-items-center justify-content-center">
                                    <div class="text-white text-center z-1">
                                        <div class="mb-3">There are more categories for you.</div>
                                        <a class="btn-website btn-website-white btn-website-sm text-primary font-weight-500" href="/categories/all">View All Categories</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 p-lg-5 p-5">
                                <h2>Popular Categories</h2>
                                <div class="row">
                                 <?php if($navbarCategories->count() != 0): ?>
                                    <?php $__currentLoopData = $navbarCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <div class="col-lg-6">

                                        <h6 class="dropdown-header text-primary"><a href="<?php echo e(route('createProjectWithCat',$cat->id)); ?>"><?php echo e($cat->name); ?></a></h6>
                                        <?php if($cat->sub_categories->count() != 0): ?>
                                        <?php $__currentLoopData = $cat->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <a class="dropdown-item" href="<?php echo e(route('createProjectWithSub',$subCategory->id)); ?>"><?php echo e($subCategory->name); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        No sub-categories inside <b><?php echo e(ucwords($cat->name)); ?></b>
                                        <?php endif; ?>
                                        <div class="dropdown-divider border-0"></div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                <!-- <li class="nav-item dropdown dropdown-xl no-caret">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownPages" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages<i class="fas fa-chevron-right dropdown-arrow"></i></a>
                    <div class="dropdown-menu dropdown-menu-right mr-lg-n20 mr-xl-n15 animated--fade-in-up" aria-labelledby="navbarDropdownPages">
                        <div class="row no-gutters">
                            <div class="col-lg-4 p-lg-5">
                                <h6 class="dropdown-header text-primary">Company</h6>
                                <a class="dropdown-item" href="page-basic.html">Basic Page</a><a class="dropdown-item" href="page-company-about.html">About</a><a class="dropdown-item" href="page-company-pricing.html">Pricing</a><a class="dropdown-item" href="page-company-contact.html">Contact</a><a class="dropdown-item" href="page-company-team.html">Team</a><a class="dropdown-item" href="page-company-terms.html">Terms</a>
                                <div class="dropdown-divider border-0"></div>
                                <h6 class="dropdown-header text-primary">Support</h6>
                                <a class="dropdown-item" href="page-help-center.html">Help Center</a><a class="dropdown-item" href="page-help-knowledgebase.html">Knowledgebase</a><a class="dropdown-item" href="page-help-message-center.html">Message Center</a><a class="dropdown-item" href="page-help-support-ticket.html">Support Ticket</a>
                                <div class="dropdown-divider border-0 d-lg-none"></div>
                            </div>
                            <div class="col-lg-4 p-lg-5">
                                <h6 class="dropdown-header text-primary">Careers</h6>
                                <a class="dropdown-item" href="page-careers-overview.html">Careers List</a><a class="dropdown-item" href="page-careers-listing.html">Position Details</a>
                                <div class="dropdown-divider border-0"></div>
                                <h6 class="dropdown-header text-primary">Blog</h6>
                                <a class="dropdown-item" href="page-blog-overview.html">Overview</a><a class="dropdown-item" href="page-blog-post.html">Post</a><a class="dropdown-item" href="page-blog-archive.html">Archive</a>
                                <div class="dropdown-divider border-0"></div>
                                <h6 class="dropdown-header text-primary">Portfolio</h6>
                                <a class="dropdown-item" href="page-portfolio-grid.html">Grid</a><a class="dropdown-item" href="page-portfolio-large-grid.html">Large Grid</a><a class="dropdown-item" href="page-portfolio-masonry.html">Masonry</a><a class="dropdown-item" href="page-portfolio-case-study.html">Case Study</a><a class="dropdown-item" href="page-portfolio-project.html">Project</a>
                                <div class="dropdown-divider border-0 d-lg-none"></div>
                            </div>
                            <div class="col-lg-4 p-lg-5">
                                <h6 class="dropdown-header text-primary">Error</h6>
                                <a class="dropdown-item" href="page-error-400.html">400 Error</a><a class="dropdown-item" href="page-error-401.html">401 Error</a><a class="dropdown-item" href="page-error-404-1.html">404 Error (Option 1)</a><a class="dropdown-item" href="page-error-404-2.html">404 Error (Option 2)</a><a class="dropdown-item" href="page-error-500.html">500 Error</a><a class="dropdown-item" href="page-error-503.html">503 Error</a><a class="dropdown-item" href="page-error-504.html">504 Error</a>
                            </div>
                        </div>
                    </div>
                </li> -->
                <!-- <li class="nav-item dropdown no-caret">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Documentation<i class="fas fa-chevron-right dropdown-arrow"></i></a>
                    <div class="dropdown-menu dropdown-menu-right animated--fade-in-up" aria-labelledby="navbarDropdownDocs">
                        <a class="dropdown-item py-website-3" href="https://docs.startbootstrap.com/sb-ui-kit-pro/quickstart" target="_blank"
                            ><div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="book-open"></i></div>
                            <div>
                                <div class="small text-gray-500">Documentation</div>
                                Usage instructions and reference
                            </div></a
                        >
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item py-website-3" href="https://docs.startbootstrap.com/sb-ui-kit-pro/components" target="_blank"
                            ><div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="code"></i></div>
                            <div>
                                <div class="small text-gray-500">Components</div>
                                Code snippets and reference
                            </div></a
                        >
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item py-website-3" href="https://docs.startbootstrap.com/sb-ui-kit-pro/changelog" target="_blank"
                            ><div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="file-text"></i></div>
                            <div>
                                <div class="small text-gray-500">Changelog</div>
                                Updates and changes
                            </div></a
                        >
                    </div>
                </li> -->
                <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item dropdown no-caret">
                    <?php if(Route::has('login')): ?>
                    <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="/login">Login</a>
                    <?php endif; ?>

                    <?php if(Route::has('register')): ?>
                    <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="/register">Sign Up</a>
                    <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="/register">Business</i></a>
                    <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="/register">Become Our Fixician<i class="ml-2" data-feather="arrow-right"></i></a>
                    <?php endif; ?>
                    <?php endif; ?>
                </li>
            </ul>

            <?php if(auth()->guard()->check()): ?>
            <!-- <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="/home">Account</a>
                                    <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form> -->
            <div class="topbar-item">
                <div class="btn btn-icon w-auto d-flex-website align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="font-weight-bold font-size-base d-none d-md-inline mr-1" style="color: #fff;">Hi,</span>
                    <span class="font-weight-bolder font-size-base d-none d-md-inline mr-3" style="color: #fff;"><?php echo e(Auth::user()->first_name()); ?></span>
                    <span class="symbol symbol-35 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold"><?php echo e(substr(Auth::user()->first_name(), 0, 1)); ?><?php echo e(substr(Auth::user()->last_name(), 0, 1)); ?></span>
                    </span>
                </div>
            </div>

        </div>
        <?php if(config('layout.extras.user.layout') == 'offcanvas'): ?>
        <?php echo $__env->make('layouts.partials.extras.offcanvas._quick-user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php endif; ?>
    </div>
    </div>
</nav>
<?php /**PATH C:\Apache24\htdocs\FixitJA\FixitJA-CBV-New\FixitJA\resources\views/layouts/partials/_navbar.blade.php ENDPATH**/ ?>