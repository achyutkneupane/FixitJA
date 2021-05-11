@extends('layouts.app')
@section('content')
<div class="container py-10">
    <div class="row">
        <h1 class="font-weight-bolder text-uppercase m-auto py-5 float-center">All Categories</h1>
    </div>
    <div class="row">
    @foreach($categories as $category)
        <div class="col-md-4">
            <div class="card card-custom gutter-b custom-card-bg-color">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            <a href="{{ route('createProjectWithCat',$category->id) }}">{{ ucwords($category->name) }}</a>
                        </h3>
                    </div>
                </div>
                <div class="card-body" id="sublist">
                    @if($category->sub_categories->count() != 0)
                    <div class="SubCategory">
                        @foreach($category->sub_categories as $subCategory)
                            <li><a href="{{ route('createProjectWithSub',$subCategory->id) }}">{{ ucwords($subCategory->name) }}</a></li>
                        @endforeach
                    </div>
                    @else
                        No sub-categories inside <b>{{ ucwords($category->name) }}</b>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
@auth
@if (config('layout.extras.user.layout') == 'offcanvas')
@include('layouts.partials.extras.offcanvas._quick-user')
@endif
@endauth
@endsection
@section('styles')
<style>
    .card a {
        color: $link-color;
        text-decoration: none;
    }
    .card a:hover {
        color: blue;
        text-decoration: underline !important;
    }
</style>
@endsection
@section('scripts')
<script
    src="{{ asset('js/custom/custom_show_categories.js') }}" type="text/javascript">
</script>
<script>
    var fixedNavbarWebsite = true;
    $(".navbar-marketing").addClass("navbar-scrolled");
    $(".navbar-marketing").removeClass("fixed-top");
</script>
@endsection
