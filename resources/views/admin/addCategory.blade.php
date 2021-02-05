{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h1 class="card-header">
                        <div class="float-left col-2">
                            <a href="{{ route('listCategory') }}" class="btn btn-dark"><< Back</a>
                        </div>
                        Add Category
                    </h1>
                    <div class="card-body">
                        <form action="{{ url('/api/admin/add_category') }}" method="POST">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="name" class="form-control" id="category_name" placeholder="Category Name">
                            </div>
                            <div class="form-group">
                                <label for="category_desc">Category Description</label>
                                <input type="text" name="description" class="form-control" id="category_desc" placeholder="Category Description">
                            </div>
                            <button class="btn btn-dark">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
