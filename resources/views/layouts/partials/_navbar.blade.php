<!-- Navbar-->
<nav class="navbar navbar-marketing navbar-expand-lg bg-transparent navbar-dark fixed-top">
    <div class="container-website">
        <a class="navbar-brand text-white" href="/">
            <img src="{{ asset('images/logo.png') }}" class="img-logo d-inline-block align-top logo-fixitja" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-lg-5">
                <!-- <li class="nav-item"><a class="nav-link" href="/project/create">Build your project</a></li> -->
                <li class="nav-item dropdown dropdown-xl no-caret mt-5">
                    <a class="btn text-white font-weight-bold dropdown-toggle h6" id="navbarDropdownDemos" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories<i class="fas fa-chevron-right dropdown-arrow"></i></a>
                    <div class="dropdown-menu @auth dropdown-menu-right @endauth @guest dropdown-menu-left @endguest animated--fade-in-up mr-lg-n25 mr-xl-n15" aria-labelledby="navbarDropdownDemos">
                        <div class="row no-gutters">
                            <div class="col-lg-5 p-lg-3 bg-img-cover overlay overlay-primary overlay-70 d-none d-lg-block" style="background-image: url({{ asset('images/website/mainbg.jpg') }})">
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
                                    @if($categories->count() != 0)
                                    @foreach($categories as $cat)


                                    <div class="col-lg-6">

                                        <h6 class="dropdown-header text-primary"><a href="{{ route('createProjectWithCat',$cat->id) }}">{{ $cat->name}}</a></h6>
                                        @if($cat->sub_categories->count() != 0)
                                          @foreach($cat->sub_categories as $subCategory)
                                            <a class="dropdown-item" href="{{ route('createProjectWithSub',$subCategory->id) }}">{{ $subCategory->name }}</a>
                                          @endforeach
                                         @else
                                        No sub-categories inside <b>{{ ucwords($cat->name) }}</b>
                                        @endif
                                        <div class="dropdown-divider border-0"></div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                @guest
                @if (Route::has('register'))
                <li class="nav-item dropdown dropdown-inline mt-5">
                    <a href="#" class="btn text-white font-weight-bold h6" data-toggle="dropdown" aria-expanded="false">
                        <i class="flaticon-buildings"></i> Business
                    </a>
                    <div class="dropdown-menu dropdown-menu-md py-5">
                        <ul class="navi navi-hover">
                            <li class="navi-item">
                                <a class="navi-link" href="/register">
                                    <span class="navi-icon"><i class="flaticon2-user-1 text-danger"></i></span>
                                    <span class="navi-text">Sign Up</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link" href="/project/create">
                                    <span class="navi-icon"><i class="flaticon2-add  text-warning"></i></span>
                                    <span class="navi-text">Create New Project</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-inline mt-5">
                    <a href="#" class="btn text-white font-weight-bold h6" data-toggle="dropdown" aria-expanded="false">
                        <i class="flaticon-user"></i> General User
                    </a>
                    <div class="dropdown-menu dropdown-menu-md py-5">
                        <ul class="navi navi-hover">
                            <li class="navi-item">
                                <a class="navi-link" href="/register">
                                    <span class="navi-icon"><i class="flaticon2-user-1 text-danger"></i></span>
                                    <span class="navi-text">Sign Up</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link" href="/project/create">
                                    <span class="navi-icon"><i class="flaticon2-add  text-warning"></i></span>
                                    <span class="navi-text">Create New Project</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="/register">Sign Up</a>
                    <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="/register">Business</i></a> -->
                <li class="nav-item no-caret mt-5">
                    <a class="btn-website font-weight-500 btn-website-teal" style="display: block;" href="/register">Become Our Fixician</a>
                </li>
                <li class="nav-item no-caret mt-5">
                    @if (Route::has('login'))
                    <a class="btn-website font-weight-500 btn-website-teal" style="display: block;" href="/login">Login</a>
                    @endif
                </li>
                @endif
                @endguest
                @auth
                <!-- <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="/home">Account</a>
                                    <a class="btn-website font-weight-500 ml-lg-4 btn-website-teal" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> -->
                <li class="nav-item no-caret mt-5 topbar-item">
                    <div class="btn btn-icon w-auto d-flex-website align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                        <span class="font-weight-bold font-size-base d-none d-md-inline mr-1 h6" style="color: #fff;">Hi,</span>
                        <span class="font-weight-bolder font-size-base d-none d-md-inline mr-3 h6" style="color: #fff;">{{ Auth::user()->first_name() }}</span>
                        <span class="symbol symbol-35 symbol-light-success">
                            <span class="symbol-label font-size-h4 font-weight-bold">{{ substr(Auth::user()->first_name(), 0, 1) }}{{ substr(Auth::user()->last_name(), 0, 1) }}</span>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        @if (config('layout.extras.user.layout') == 'offcanvas')
        @include('layouts.partials.extras.offcanvas._quick-user')
        @endif
        @endauth
    </div>
    </div>
</nav>
