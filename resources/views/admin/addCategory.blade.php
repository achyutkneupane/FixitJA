{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin_panel') }}">Admin Panel</a>
                <form action="{{ url('/api/admin/add_category') }}" method="POST">
                    <h1>Add Category</h1>
                    <input type="text" class="form-control" name="name" placeholder="Category Name">
                    <input type="text" class="form-control" name="description" placeholder="Category Description">
                    <button class="btn btn-dark">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
