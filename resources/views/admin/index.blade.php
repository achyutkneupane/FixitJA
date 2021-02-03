{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/api/admin/add_category') }}" method="POST">
                    <h1>Add Category</h1>
                    <input type="text" class="form-control" name="name" placeholder="Category Name"><br>
                    <input type="text" class="form-control" name="description" placeholder="Category Description"><br>
                    <button class="btn btn-dark">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
