{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin_panel') }}">Admin Panel</a>
                <form action="{{ url('/api/admin/add_sub_category') }}" method="POST">
                    <h1>Add Sub Category</h1>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control" name="name" placeholder="Sub-Category Name">
                    <input type="text" class="form-control" name="description" placeholder="Sub-Category Description">
                    <button class="btn btn-dark">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
