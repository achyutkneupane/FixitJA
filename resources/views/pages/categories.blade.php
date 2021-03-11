@extends('layouts.app')
@section('content')
<div class="container py-10">
    <div class="row">
        <h1 class="font-weight-bolder text-uppercase m-auto py-5 float-center">All Our Categories</h1>
    </div>
    <div class="row">
        <span class="float-right">{{ $categories->links() }}</span>
    </div>
    @foreach($categories as $category)
        @if($loop->index % 3 == 0)
        <div class="row">
        @endif
            <div class="col-md-4">
                <div class="card card-custom gutter-b custom-card-bg-color">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                {{ ucwords($category->name) }}
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($category->sub_categories->count() != 0)
                        @foreach($category->sub_categories as $subCategory)
                            <li>{{ $subCategory->name }}</li>
                        @endforeach
                        @else
                            No sub-categories inside <b>{{ ucwords($category->name) }}</b>
                        @endif
                    </div>
                </div>
            </div>
        @if($loop->index % 3 == 2 || $loop->last)
        </div>
        @endif
    @endforeach
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
