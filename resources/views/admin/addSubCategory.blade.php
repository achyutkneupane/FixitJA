{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h1 class="card-header">
                        <div class="float-left col-2">
                            <a href="{{ route('listSubCategory') }}" class="btn btn-dark"><< Back</a>
                        </div>
                        Add Sub-Category
                    </h1>
                    <div class="card-body">
                        <form action="{{ url('/api/admin/add_sub_category') }}" method="POST">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control" id="category_id">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Sub-Category Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Sub-Category Name">
                            </div>
                            <div class="form-group">
                                <label for="description">Sub-Category Description</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Sub-Category Description">
                            </div>
                            <button class="btn btn-dark">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
