@extends('layouts.app')
@section('content')
<div class="container py-10">
    <div class="row">
        <h1 class="font-weight-bolder text-uppercase m-auto py-5">All Our Categories</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Category 1
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                    <li>sub-category 2</li>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Category 2
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                    <li>sub-category 2</li>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Category 3
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Category 4
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                    <li>sub-category 2</li>
                    <li>sub-category 3</li>
                    <li>sub-category 4</li>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Category 5
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                    <li>sub-category 2</li>
                    <li>sub-category 3</li>
                    <li>sub-category 4</li>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Category 6
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                    <li>sub-category 2</li>
                    <li>sub-category 3</li>
                    <li>sub-category 4</li>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Category 7
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                    <li>sub-category 2</li>
                    <li>sub-category 3</li>
                    <li>sub-category 4</li>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Category 8
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                    <li>sub-category 2</li>
                    <li>sub-category 3</li>
                    <li>sub-category 4</li>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Category 9
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                    <li>sub-category 2</li>
                    <li>sub-category 3</li>
                    <li>sub-category 4</li>
                </div>
            </div>
        </div>
    </div>
</div>
@auth
@if (config('layout.extras.user.layout') == 'offcanvas')
@include('layouts.partials.extras.offcanvas._quick-user')
@endif
@endauth
@endsection
@section('scripts')
<script>
    var fixedNavbarWebsite = true;
    $(".navbar-marketing").addClass("navbar-scrolled");
    $(".navbar-marketing").removeClass("fixed-top");
</script>
@endsection
