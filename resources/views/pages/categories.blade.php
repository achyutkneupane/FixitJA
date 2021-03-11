@extends('layouts.app')
@section('content')
<div class="container py-10">
    <div class="row">
        <h1 class="font-weight-bolder text-uppercase m-auto py-5">All Our Categories</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                @foreach($categories as $cat)
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{ $cat->name }}
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <li>sub-category 1</li>
                    <li>sub-category 2</li>
                </div>
                @endforeach
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
