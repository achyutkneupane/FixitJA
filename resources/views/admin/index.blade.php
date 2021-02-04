{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-12">
                <h1>Admin Panel</h1>
                <a href="{{ route('addCategory') }}">Add Category</a>
                <a href="{{ route('addSubCategory') }}">Add Sub-Category</a>
            </div>
        </div>
    </div>
@endsection
